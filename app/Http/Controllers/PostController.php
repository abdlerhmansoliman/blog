<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index (){
        $postsFromDB=Post::all();
        

        return view('index',['posts'=>$postsFromDB] );
        
    }

    public function show(Post $post){
        // $singlePostFromDB=Post::findOrFail($postId);
 

        return view('show',['post'=>$post]);
    }

    public function create(){
        $users= User::all(); 
        
        return view('create',['users'=>$users]);
    }
    public function store(){
        request()->validate([
            'title'=>['required','min:4'],
            'desc'=>['required','min:10'],
            'creator'=>['required','exists:users,id']
        ]);
        $title=request('title');
        $desc=request('desc');
        $creator=request('creator');
        Post::create([
            'title'=>$title,
            'desc'=>$desc,
            'user_id'=>$creator
        ]);
     

        return to_route(route:'index');
    }
    public function edit(Post $post){
        $users=User::all();

        return view('edit',['users'=>$users,'post'=>$post]);
    }
    public function update($postId){
        request()->validate([
            'title'=>['required','min:4'],
            'desc'=>['required','min:10'],
            'creator'=>['required','exists:users,id']

        ]);
        $title=request()->title;
        $desc=request()->desc;
        $creator=request()->creator;
        $singlePostFromDB=Post::find($postId);
        $singlePostFromDB->update([
            'title'=>$title,
            'desc'=>$desc,
            'user_id'=>$creator
        ]);
        return to_route('show',$postId);
        
    }
    public function destroy($postId){
        $post=Post::find($postId);
        $post->delete();
        return to_route('index');
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        ]);
        $title=request('title');
        $desc=request('desc');
        Post::create([
            'title'=>$title,
            'desc'=>$desc,
            'user_id'=>Auth::id(),
        ]);
     

        return to_route(route:'index');
    }
    public function edit($id){
        $post=Post::findOrfail($id);

        if($post->user_id != Auth::id()){
            return redirect()->rounte('index')->with('error','Unauthorized Access!');

        }
        return view('edit',['post'=>$post]);
    }


    public function update(Request $request, $id){
        $post = Post::findOrFail($id);

        
        if ($post->user_id != Auth::id()) {
            return redirect()->route('index')->with('error', 'Unauthorized Access!');
        }
        request()->validate([
            'title'=>['required','min:4'],
            'desc'=>['required','min:10'],
            'creator'=>['required','exists:users,id']

        ]); 
        $post->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        return to_route('show',$post->id)->with('success', 'Post updated successfully!');
        
    }
    public function destroy($id){
        $post=Post::findOrFail($id);
        if($post->user_id!=Auth::id()){
            return redirect()->route('index')->with('error', 'Unauthorized Access!');

        }
        $post->delete();
        return redirect()->route('index')->with('success', 'Post deleted successfully!');
    }

}

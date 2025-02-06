@extends('layouts.app')
@section('title')Edit @endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('update',$post->id)}}" >
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label  class="form-lable">Title</label>
        <input name="title" type="text" value="{{$post->title}}" class="form-control">
     </div>
     <div  class="mb-3">
        <label class="form-lable">Description</label>
        <br>
        <textarea name="desc" class="form-control"  >{{$post->desc}}
        </textarea>
     </div>  
       <div class="mb-3">
        <label class="form-lable">Post Creator</label>
        <select name="creator" id="" class="form-control">
         
         @foreach ($users as $user)
         <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
            
         @endforeach
        </select>
      </div>
     <button class="btn btn-primary">Edit</button>
</form>
@endsection
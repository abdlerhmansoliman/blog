@section('title')Edit @endsection
<x-app>
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

     <button class="btn btn-primary">Edit</button>
</form>
</x-app>
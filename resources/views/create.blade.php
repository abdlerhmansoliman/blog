
@section('title')create @endsection
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

<form method="POST" action="{{route('store')}}" >
    @csrf
    <div class="mb-3">
        <label  class="form-lable">Title</label>
        <input name="title" type="text" class="form-control" value="{{old('title')}}">
     </div>
     <div  class="mb-3">
        <label class="form-lable">Description</label>
        <br>
        <textarea name="desc" class="form-control" >{{old('desc')}}</textarea>
     </div>  

     <button class="btn btn-success">Submit</button>
</form>
</x-app>

@section('title')Log In @endsection
<x-app>
    
   <div class="col-md-6">
      <div class="card-body">
<form method="POST" action="" >
    @csrf

 
     <div class="mb-3">
        <label  class="form-lable">Email</label>
        <input name="email" type="email" class="form-control" value="{{old('email')}}" required >
     </div>
     <div class="mb-3">
        <label  class="form-lable">Password</label>
        <input name="password" type="password" class="form-control" required >
     </div>
     @if ($errors->any())
     <div class="">
         <ul class="mb-0">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif


     <button  class="btn btn-success">Sign</button >
</form>
      </div>
   </div>
</x-app>
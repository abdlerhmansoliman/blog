
@section('title')Register @endsection
<x-app>
   <div class="col-md-6">
      <div class="card-body">
<form method="POST" action="register" >
    @csrf
    <div class="mb-3">
        <label  class="form-lable">Name</label>
        <input name="name" type="text" class="form-control" required >
     </div>
 
     <div class="mb-3">
        <label  class="form-lable">Email</label>
        <input name="email" type="email" class="form-control" required >
     </div>
     <div class="mb-3">
        <label  class="form-lable">Password</label>
        <input name="password" type="password" class="form-control" required >
     </div>
     <div class="mb-3">
        <label  class="form-lable">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control"required >
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

     <button  class="btn btn-success">Resigter</button >
</form>
      </div>
   </div>
</x-app>
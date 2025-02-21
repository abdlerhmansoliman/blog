      @section('title') Post @endsection
      <x-app>

        
        <div class="card mt-4">
            <div class="card-header">
              Post info
            </div>
            <div class="card-body">
              <h5 class="card-title">Title:{{$post->title}}</h5>
              <p class="card-text">Description: {{$post->desc}} </p>
            
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-header">
              Post Creator Info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found'}} </h5>
              <p class="card-text">Email:{{$post->user? $post->user->email : 'not found'}}</p>
              <p class="card-text">Created At: {{$post->created_at}} </p>
             
            </div>
          </div>
      </x-app>
     

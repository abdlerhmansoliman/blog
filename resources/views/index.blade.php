
      @section('title') Posts @endsection
      <x-app>

      <div class="text-center">
        <a  class="btn btn-success"  href="{{route('create')}}">Creat Post</a>
      </div>
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Post By</th>
            <th scope="col">Creat At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $posts as $post)
        <tr>
          <th scope="row"> {{$post->id}} </th>
          <td>{{$post->title}}</td>
          <td>{{$post->user ? $post->user->name: 'not found'}}</td>
          <td>{{$post->created_at->format('y-m-d')}}</td>
          <td>
            <a href="{{route("show",$post->id)}}" class="btn btn-info">View</a>
            <a href="{{route('edit',$post->id)}}" class="btn btn-primary">Edit</a>
            <form style="display:inline" method="POST" action="{{route('destroy',$post->id)}}">
              @csrf
              @method('DELETE')
              
              <button  class="btn btn-danger">Delete</button>

            </form>
           </td>
        </tr>
        @endforeach

        </tbody>
      </table>
    </x-app>
    
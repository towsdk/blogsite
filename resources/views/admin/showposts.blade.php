<!DOCTYPE html>
<html>
  <head> 

  @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.nav')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      @if (Session::has('message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
        {{ Session::get('message') }}
      </div>
      @endif
        <div class="container">
          <h3 class="m-auto w-50 h3 text-white">All Posts</h3>
          <table class="table mt-5 text-white table-bordered border-primary">
            <thead>
              <tr>
                <th class="text-white">Title</th>
                <th class="text-white">Description</th>
                <th class="text-white">Name</th>
                <th class="text-white">Post status</th>
                <th class="text-white">User Type</th>
                <th class="text-white">Image</th>
                <th class="text-white">User Id</th>
                <th class="text-white">Update</th>
                <th class="text-white">Delete</th>
                <th class="text-white">Active</th>
                <th class="text-white">Reject</th>
                
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $data)
             <tr>
              <th >{{ $data->title }}</th>
              <td>{{ $data->description }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->post_status }}</td>
              <td>{{ $data->usertype }}</td>
              <td>
                <img height="100" width="150" src="storage/imagefolder/{{ $data->image }}" alt="food_image">
              </td>
              <td>{{ $data->user_id }}</td>
              <td><a href="{{ url('/editpost',$data->id) }}">Edit</a></td>
              <td><a href="{{ route('deletepost',[$data->id]) }}" class="btn btn-danger"
                onclick="confirmation(event)">Delete</a></td>
                <td><a class="btn btn-success" onclick="return confirm('are you sure to active?')" href="{{ route('active',[$data->id]) }}">active</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('are you sure to reject?')" href="{{ route('reject', [$data->id]) }}">reject</a></td>
            </tr>

             @endforeach
            </tbody>
          </table>
        
        </div>
      </div>
      
        @include('admin.footer')


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <script>
          function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');  
            console.log(urlToRedirect); 
            swal({
                title: "Are you sure to Delete this post",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
    
    
                     
                    window.location.href = urlToRedirect;
                   
                }  
    
    
            });
    
            
        }
    </script>
  </body>
</html>
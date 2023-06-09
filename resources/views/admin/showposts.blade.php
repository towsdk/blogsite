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
        <div class=".justify-content-center
        ">All Posts</div>
        <div class="container">
          <table class="table mt-5 text-white table-bordered border-primary">
            <thead>
              <tr>
                <th class="text-white">Title</th>
                <th class="text-white">Description</th>
                <th class="text-white">Name</th>
                <th class="text-white">User Type</th>
                <th class="text-white">Image</th>
                <th class="text-white">User Id</th>
                <th class="text-white">Update</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $data)
             <tr>
              <th >{{ $data->title }}</th>
              <td>{{ $data->description }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->usertype }}</td>
              <td>
                <img height="100" width="150" src="storage/imagefolder/{{ $data->image }}" alt="food_image">
              </td>
              <td>{{ $data->user_id }}</td>
              <td><a href="{{ url('/updateMenu',$data->id) }}">Update</a></td>
            </tr>
             @endforeach
            </tbody>
          </table>
        
        </div>
      </div>
      
        @include('admin.footer')
  </body>
</html>
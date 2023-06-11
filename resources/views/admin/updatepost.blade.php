<!DOCTYPE html>
<html>
    <base href="/public">
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
        <div style="text-align: center; font-size: 30px; color:white; padding:30px">Posts</div>

        <div class="container" style="width: 800px">
            <form action="{{ route('updatepost', [$data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Old Image</label>
                    <img src="{{ '/storage/imagefolder/'.$data->image }}" width="150px" height="100px" >
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
       </div>
       </div>
      
        @include('admin.footer')
  </body>
</html>
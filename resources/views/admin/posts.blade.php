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

        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div style="text-align: center; font-size: 30px; color:white; padding:30px">Posts</div>

        <div class="container" style="width: 800px">
            <form action="{{ route('add-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                {{-- <input type="submit" value="submit" class="btn btn-success"> --}}
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>


      </div>
      
        @include('admin.footer')
  </body>
</html>
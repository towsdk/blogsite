<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.homecss')
   </head>
   <body>

    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <div class="row mb-3 p-4">
        {{-- @if (Session::has('message'))
        
            <div class="alert alert-danger" style="height: 40px">
                <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
                {{ Session::get('message') }}</div>
        @endif --}}
        <div class="row m-auto" style="padding: 30px; background-color:black;">
            <form action="{{ route('updateUserPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label class="form-label" >Email address</label>
                  <input type="email" class="form-control" name="title">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Description</label>
                  <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                  <label  class="form-label">Image</label>
                  <input type="file" name="image">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>
      </div>
    </div>
     @include('home.footer')
      <!-- copyright section end -->
      @include('home.homejs')   
   </body>
</html>
<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <div class="row">
        <div class="m-auto w-50"><img style="height: 350px; padding: 50px; margin-right: 50px" class="w-50" src="{{ '/storage/imagefolder/'.$data->image }}" class="services_img" >
        <h4>{{ $data->title }}</h4>
        <p>Posted by <b>{{ $data->name }}</b></p>
        <div class="btn_main"><a href="{{ route('details',[$data->id]) }}">Read more</a></div>
     </div>
    </div>
     @include('home.footer')
      <!-- copyright section end -->
      @include('home.homejs')   
   </body>
</html>
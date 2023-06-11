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

         <div class="container">
           @foreach ($post as $post)
           <div class="row">
                <div>{{ $post->title }}</div>
                <div>{{ $post->description }}</div>
                <div><img src="{{ '/storage/imagefolder/'. $post->image }}" alt=""></div>
           </div>
           @endforeach
         </div>
      </div>

    </div>
     @include('home.footer')
      <!-- copyright section end -->
      @include('home.homejs')   
   </body>
</html>
<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital"> Blogs </h1>
       <p class="services_text">Lorem ipsum dolor,ipsum deleniti, aspernatur error nisi eum, eaque optio possimus ipsam illo quas? Rem amet ut doloribus repudiandae, cum sapiente!In velit assumenda labore beatae, corrupti adipisci officiis ipsum alias nobis ullam pariatur repellendus consequuntur numquam quasi nihil reprehenderit blanditiis fugiat magni magnam accusantium? Ullam reiciendis voluptatibus numquam corrupti asperiores! </p>
       <div class="services_section_2">
          <div class="row">
             @foreach ($posts as $data)
             <div class="col-md-4">
               <div><img style="margin-bottom: 20px;
                height: 200px; width= 200px" src="{{ '/storage/imagefolder/'.$data->image }}" class="services_img" style=""></div>
               <h4>{{ $data->title }}</h4>
               <p>Posted by <b>{{ $data->name }}</b></p>
               <div class="btn_main"><a href="{{ route('details',[$data->id]) }}">Read more</a></div>
            </div>
             @endforeach
          </div>
       </div>
    </div>
 </div>
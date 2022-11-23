@php
    $blogCaption = getContent('blog.content',true);
    $blogs = getContent('blog.element',false,3);
@endphp
@if($blogCaption)
<!-- ========Blog-Section Starts Here ========-->
<section class="blog-section padding pos-rel darkmode">
    <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
         data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="{{asset($activeTemplateTrue.'images/animation/05.png')}}" alt="shape">
    </div>
    <div class="circle-2 four" data-paroller-factor="-0.1" data-paroller-factor-lg="0.30"
         data-paroller-type="foreground" data-paroller-direction="horizontal">
        <img src="{{asset($activeTemplateTrue.'images/animation/11.png')}}" alt="shape">
    </div>
    <div class="circle-1 three">
        <img src="{{asset($activeTemplateTrue.'images/animation/12.png')}}" alt="animation">
    </div>
    <div class="trop-3">
        <img src="{{asset($activeTemplateTrue.'images/animation/13.png')}}" alt="animation">
    </div>
    <div class="trop-4">
        <img src="{{asset($activeTemplateTrue.'images/animation/14.png')}}" alt="animation">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header">

                    <h2 class="title">{{@$blogCaption->data_values->heading}}</h2>
                    <p>{{@$blogCaption->data_values->sub_heading}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @foreach($blogs as $k=> $data)
                <div class="col-md-6 col-xl-4 col-sm-10">
                    <div class="post-item">
                        <div class="post-thumb c-thumb">
                            <a href="{{route('home.blog.details',[str_slug($data->data_values->title),$data->id])}}">
                                <img src="{{asset('assets/images/frontend/blog/'.$data->data_values->image)}}" alt="{{$data->data_values->title}}">
                            </a>
                        </div>
                        <div class="post-content">
                            <h5 class="title">
                                <a href="{{route('home.blog.details',[str_slug($data->data_values->title),$data->id])}}"> {{__(str_limit($data->data_values->title,30))}}</a>
                            </h5>
                            <ul class="meta-post">
                                <li>
                                    <a href="javascript:void(0)" class="cursor-text">
                                        <i class="fas fa-calendar-day"></i><span>{{date('d-M-Y', strtotime($data->created_at))}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="entry-content">
                                <p>{{str_limit(strip_tags($data->data_values->description),100)}}</p>

                            </div>
                        </div>
                    </div>
                </div>
                
    @if ($k >= 2)
        @break
    @endif
            @endforeach
        </div>
    </div>
</section>
<!-- ========Blog-Section Ends Here ========-->
@endif

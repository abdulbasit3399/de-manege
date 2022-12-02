@extends($activeTemplate .'layouts.master')

@section('content')
    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title"><span>{{__($page_title)}}</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container py-5 ">
            <div class="row">
                <div class="col-lg-8">
<div class="row justify-content-center mb_max_lg_50">
                    @foreach($blogs as $k=> $data)
                       <div class="col-md-6">
                    <div class="blog-post ">
                        <div class="item-thumbs">
                            <img src="{{asset('assets/images/frontend/blog/'.$data->data_values->image)}}" alt="{{$data->data_values->title}}">
                        </div>
                        <div class="blog-outer">
                            <div class="meta ">
                                <span class="date text-white pt-0">  {{date('d-M-Y', strtotime($data->created_at))}}</span>
                            </div>
                            <a href="{{route('huis.blog.details',[str_slug($data->data_values->title),$data->id])}}">
                            <h2 class="blog-title text-white">{{__($data->data_values->title)}} </h2>
                            </a>
                        </div>

                    </div>
                    </div>
                    @endforeach
                <div class="col-12">
                    {{$blogs->links()}}
                </div>
                </div>
                </div>
                @include($activeTemplate.'partials.recent-blog')
            </div>
        </div>
    </div>






@endsection

@extends($activeTemplate .'layouts.master')

@section('content')
    @include($activeTemplate.'partials.frontend-breadcrumb')

    <!-- ========blog-Section Starte Here ========-->
    <section class="blog-section padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-lg-7 col-xl-8 mb-5 mb-lg-0">
                    <div class="row mb-60-none">
                        @foreach($blogs as $k=> $data)
                        <div class="col-12">
                            <div class="post-item">
                                <div class="post-thumb c-thumb">
                                    <a href="{{route('home.blog.details',[str_slug($data->data_values->title),$data->id])}}">
                                        <img src="{{asset('assets/images/frontend/blog/'.$data->data_values->image)}}" alt="{{$data->data_values->title}}">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h5 class="title">
                                        <a href="{{route('home.blog.details',[str_slug($data->data_values->title),$data->id])}}">
                                            {{__($data->data_values->title)}}
                                        </a>
                                    </h5>
                                    <ul class="meta-post justify-content-start">
                                        <li>
                                            <a href="javascript:void(0)" class="cursor-text">
                                                <i class="fas fa-calendar-day"></i><span>{{date('d-M-Y', strtotime($data->created_at))}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>{{str_limit(strip_tags($data->data_values->description),300)}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="blog-pagination">

                        {{$blogs->links()}}

                    </div>
                </div>
                @include($activeTemplate.'partials.recent-blog')
            </div>
        </div>
    </section>
    <!-- ========blog-Section Ends Here ========-->
@endsection


@section('load-js')
@stop
@section('script')


@stop

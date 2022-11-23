<style>
.total .col-md-6:nth-child(odd){
    padding-right:0px;
}
</style>

@extends($activeTemplate .'layouts.master')
@section('style')

@stop

@section('content')

    @php
        $bannerCaption = getContent('banner.content',true);
    @endphp
    @if($bannerCaption)
    <!-- ========Banner-Section Starts Here ========-->
    <section class="banner-section">
        <div class="banner-shape02"></div>
        <div class="banner-shape03"></div>
        <div class="banner-shape01">
             <img src="{{asset($activeTemplateTrue.'images/animation/banner-shape.png')}}" alt="banner" style="display:none;">
        </div>
        <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/05.png')}}" alt="shape">
        </div>
        <div class="circle-2 three" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/11.png')}}" alt="shape">
        </div>

        <div class="circle-2 five" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/15.png')}}" alt="shape">
        </div>

        <div class="container">
            <div class="banner-area align-items-center">
                <div class="banner-content">
                    <h1 class="title">{{__(@$bannerCaption->data_values->heading)}}</h1>
                    <p class="text-white">{{__(@$bannerCaption->data_values->sub_heading)}}</p>
                    <a href="{{@$bannerCaption->data_values->button_link}}" class="custom-button">{{__($bannerCaption->data_values->button_name)}}</a>
                </div>
                <div class="banner-thumb d-none d-md-block">
                    <div class="thumb">
                        <img src="{{asset('assets/images/frontend/banner/'.@$bannerCaption->data_values->image)}}" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========Banner-Section Ends Here ========-->
    @endif


    @if($sections->secs != null)
    @foreach(json_decode($sections->secs) as $sec)
        @include($activeTemplate.'sections.'.$sec)
    @endforeach
    @endif


@endsection

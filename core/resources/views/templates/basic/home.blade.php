@extends($activeTemplate .'layouts.master')

@push('style')
    <style>
        .plan-item {
            padding-top: 10px;
            width: 406px;
        }
    </style>
@endpush



@php
    $bannerCaption = getContent('banner.content',true);
@endphp
@push('home-breadcrumb')
    <div class="banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="title py-5">{{__(@$bannerCaption->data_values->heading)}}</h1>
                    <p class="pb-5">
                        {{__(@$bannerCaption->data_values->sub_heading)}}
                    </p>
                    <a href="{{@$bannerCaption->data_values->button_link}}" class="btn btn-default website-color mt-1 mb-1">{{__($bannerCaption->data_values->button_name)}}</a>
                </div>
                <div class="col-lg-6">
                    <div class="coin_main"><img src="{{asset('assets/images/frontend/banner/'.@$bannerCaption->data_values->image)}}" alt="..."></div>
                </div>
            </div>
        </div>
    </div>
@endpush

@section('content')

    <div class="sec-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec"></div>
                </div>
            </div>
        </div>
    </div>


    @if($sections->secs != null)
    @foreach(json_decode($sections->secs) as $sec)
        @include($activeTemplate.'sections.'.$sec)
    @endforeach
    @endif


@endsection



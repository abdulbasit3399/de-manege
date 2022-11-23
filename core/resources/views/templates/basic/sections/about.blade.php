@php
    $aboutCaption = getContent('about.content',true);
@endphp
@if($aboutCaption)
<section class="about-section padding-bottom padding-top">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hyip-about-thumb">
                    <img src="{{asset('assets/images/frontend/about/'.@$aboutCaption->data_values->image)}}"
                         alt="{{$general->sitename}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hyip-about-content pt-80">
                    <div class="section-header left-style">
                        <h2 class="title">{{__(@$aboutCaption->data_values->heading)}}</h2>
                        <h4 class="my-2">{{__(strip_tags(@$aboutCaption->data_values->sub_heading))}}</h4>
                        <p>{{__(strip_tags(@$aboutCaption->data_values->description))}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<div class="sec-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec"></div>
            </div>
        </div>
    </div>
</div>
@endif

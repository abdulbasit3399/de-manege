@php
    $aboutCaption = getContent('about.content',true);
@endphp
@if($aboutCaption)
<!-- ========Hyip-About-Section Starts Here ========-->
<section class="about-section padding">
    <div class="container mw-lg-100">
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="hyip-about-thumb">
                    <img src="{{asset('assets/images/frontend/about/'.@$aboutCaption->data_values->image)}}"
                         alt="{{$general->sitename}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hyip-about-content pt-80">
                    <div class="section-header left-style">
                        <h2 class="title">{{__(@$aboutCaption->data_values->heading)}}</h2>
                        <h4 class="my-3">{{__(strip_tags(@$aboutCaption->data_values->sub_heading))}}</h4>
                        <p >{{__(@$aboutCaption->data_values->description)}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========Hyip-About-Section Ends Here ========-->
@endif

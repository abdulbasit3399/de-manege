@php
    $testimonialCaption = getContent('testimonial.content',true);
    $testimonial = getContent('testimonial.element');
@endphp
@if($testimonialCaption)
    <section class="client-section padding-top">
        <div class="container mw-lg-100">
            <div class="client-area">
                <div class="owl-thumbs" data-slider-id="1">

                    @foreach($testimonial as $data)
                        <div class="owl-thumb-item">
                            <div class="thumb wow zoomIn" data-wow-duration="1s">
                                <img
                                    src="{{asset('assets/images/frontend/testimonial/'.$data->data_values->image)}}"
                                    alt="client">
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="client-slider-section">
                    <h2 class="title">{{$testimonialCaption->data_values->heading}}</h2>
                    <div class="client-slider owl-carousel owl-theme" data-slider-id="1">

                        @foreach($testimonial as $data)
                            <div class="client-slide-item">
                                <blockquote>
                                    {{__($data->data_values->quote)}}
                                </blockquote>
                                <div class="author">
                                    <div class="author-thumb">
                                        <img
                                            src="{{asset('assets/images/frontend/testimonial/'.$data->data_values->image)}}"
                                            alt="client">
                                    </div>
                                    <div class="author-content">
                                        <h6 class="sub-title"><a
                                                href="javascript:void(0)">{{__($data->data_values->author)}}</a></h6>
                                        <span>{{__($data->data_values->designation)}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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

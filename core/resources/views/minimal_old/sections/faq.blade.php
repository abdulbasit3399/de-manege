@php
    $faqCaption = getContent('faq.content',true);
    $faqs = getContent('faq.element');
@endphp
@if($faqCaption)

    <!-- ========Faq-Section Starte Here ========-->
    <section class="faq-section padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="title">{{__(@$faqCaption->data_values->heading)}}</h2>
                        <p>{{__(@$faqCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center justify-content-lg-between">

                <div class="col-lg-12 col-xl-12">
                    <div class="faq-wrapper style-two">


                        @foreach($faqs as $k=>$data)
                            <div class="faq-item @if($k==0)  open active @endif">
                                <h6 class="faq-title">{{__($data->data_values->question)}}</h6>
                                <div class="faq-content">
                                    <p>@php echo $data->data_values->answer @endphp</p>
                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========Faq-Section Ends Here ========-->

@endif


@php
    $faqCaption = getContent('faq.content',true);
    $faqs = getContent('faq.element');
@endphp
@if($faqCaption)



    <div class="faq-area padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="team-header">
                        <h2 class="title">{{__(@$faqCaption->data_values->heading)}}</h2>
                        <p class="section-para mt-2">{{__(@$faqCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="main-page">
                        <div class="accordion" id="accordionExample">
                            @foreach($faqs as $k=>$data)
                                <div class="card">
                                    <div class="card-header" id="heading{{$data->id}}">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse{{$data->id}}" aria-expanded="true"
                                                aria-controls="collapse{{$data->id}}"> {{__($data->data_values->question)}}</button>
                                    </div>
                                    <div id="collapse{{$data->id}}" class="collapse @if($k==0) show @endif"
                                         aria-labelledby="heading{{$data->id}}" data-parent="#accordionExample">
                                        <div class="card-body">@php echo $data->data_values->answer @endphp</div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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


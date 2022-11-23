@php
    $counterCaption = getContent('counter.content',true);
    $counter = getContent('counter.element');
@endphp
@if($counterCaption)


<!-- ========Investment-Section Starts Here ========-->
<section class="investment-section padding  pos-rel darkmode">
    <div class="star-4">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 three">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 four">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 five">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 six">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 seven">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>
    <div class="star-4 eight">
        <img src="{{asset($activeTemplateTrue.'images/animation/07.png')}}" alt="shape">
    </div>



    <div class="container ">
        <div class="d-flex flex-wrap align-items-center">
            <div class="invest--area">
                <div class="row">
                    <div class="col-12 pr-lg-5">
                        <div class="section-header">
                            <h3 class="title">{{__(@$counterCaption->data_values->heading)}} </h3>
                            <p class="ml-0">{{__(@$counterCaption->data_values->sub_heading)}}</p>
                        </div>
                    </div>
                    @foreach($counter->chunk(3) as $counterV2)
                    <div class="col-12">
                        <div class="investment-area mb-4">

                            @php
                                $i = 0;
                            @endphp
                            @foreach($counterV2 as  $k =>$data)
                            <div class="investment-item counter-item2 @if($i == 0)two  @elseif($i == 2) one  @else  @endif">
                                <div class="investment-thumb">
                                   <?php echo  $data->data_values->icon; ?>
                                </div>
                                <div class="investment-content">
                                    <h4 class="odo-title"></h4>
                                    <h4 class="odometer"
                                        data-odometer-final="{{@$data->data_values->counter_digit}}">{{__($data->data_values->title)}}</h4>
                                    <p>{{__($data->data_values->sub_title)}}</p>
                                </div>
                            </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ========Investment-Section Ends Here ========-->

@endif

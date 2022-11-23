@php
    $counterCaption = getContent('counter.content',true);
    $counter = getContent('counter.element');
@endphp
@if($counterCaption)
<div class="counter-section">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-10 text-center">
                <div class="section-header mb-5">
                    <h2 class="title">{{__(@$counterCaption->data_values->heading)}} </h2>
                    <p class="section-para">{{__(@$counterCaption->data_values->sub_heading)}}</p>
                </div>
            </div>
        </div>

        @foreach($counter->chunk(3) as $counterV2)

        <div class="counter-area ">
            <div class="counter-wrapper ">
                @foreach($counterV2 as  $k =>$data)
                <div class="counter-item">
                    <div class="counter-thumb bg-4">
                        <?php echo  @$data->data_values->icon; ?>
                    </div>
                    <div class="counter-content">
                        <div class="odo-area">
                            <h3 class="odo-title odometer"
                                data-odometer-final="{{@$data->data_values->counter_digit}}">{{__(@$data->data_values->title)}}</h3>
                        </div>
                        <p>{{__(@$data->data_values->sub_title)}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
            <br>
        @endforeach


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

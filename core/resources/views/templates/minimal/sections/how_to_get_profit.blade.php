@php
    $profitCaption = getContent('how_to_get_profit.content',true);
    $profits = getContent('how_to_get_profit.element');
@endphp
@if($profitCaption)

    <section class="get-profit-section padding pos-rel">
        <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/05.png')}}" alt="shape">
        </div>
        <div class="left-shape01 right">
            <img src="{{asset($activeTemplateTrue.'images/animation/right-shape-1.png')}}" alt="shape"
                 class="wow slideInRight">
        </div>
        <div class="circle-2 four" data-paroller-factor="-0.1" data-paroller-factor-lg="0.30"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/11.png')}}" alt="shape">
        </div>
        <div class="circle-1 three">
            <img src="{{asset($activeTemplateTrue.'images/animation/12.png')}}" alt="animation">
        </div>
        <div class="trop-3">
            <img src="{{asset($activeTemplateTrue.'images/animation/13.png')}}" alt="animation">
        </div>
        <div class="trop-4">
            <img src="{{asset($activeTemplateTrue.'images/animation/14.png')}}" alt="animation">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="title">{{__(@$profitCaption->data_values->heading)}}</h2>
                        <p>{{__(@$profitCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>
            <div class="get-profit">
                @foreach($profits as $k=>$data)
                <div class="item">
                <div class="item-thumb">
                    <?php echo  @$data->data_values->icon?>
                </div>
                <h5 class="subtitle">{{__($data->data_values->title)}}</h5>
                </div>
                @endforeach
                <div class="thumb d-none d-lg-block">
                    <img src="{{asset($activeTemplateTrue.'images/how_to_get_profit.png')}}"
                         alt="profit">
                </div>
            </div>
        </div>
    </section>
@endif

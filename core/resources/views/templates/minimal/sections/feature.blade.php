@php
    $featureCaption = getContent('feature.content',true);
    $features = getContent('feature.element');
@endphp
@if($featureCaption)

    <!-- ========Feature-Section Starts Here ========-->
    <section class="feature-section padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="title">{{__(@$featureCaption->data_values->heading)}}</h2>
                        <p>{{__(@$featureCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>
            <div class="feature-wrapper">
                <div class="feature-area two">
                    @foreach($features as $k => $data)
                    @if($k%2 == 0)
                    <div class="feature-item">
                    <h5 class="subtitle">{{__(@$data->data_values->title)}}</h5>
                    <p>{{__(@$data->data_values->description)}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="feature-thumb pos-rel">
                    <img src="{{asset($activeTemplateTrue.'images/feature.png')}}" alt="feature">


                    <div class="coin-3">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-3 two">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-3 three">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 two">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 three">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 four">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>

                    <div class="coin-3 bela two">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-3 bela three">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 bela">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 bela two">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 bela three">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                    <div class="coin-4 bela four">
                        <img src="{{asset($activeTemplateTrue.'images/feature-coin.png')}}" alt="footer">
                    </div>
                </div>
                <div class="feature-area">
                    @foreach($features as $k => $data)
                    @if($k%2 != 0)
                    <div class="feature-item">
                    <h5 class="subtitle">{{__(@$data->data_values->title)}}</h5>
                    <p>{{__(@$data->data_values->description)}}</p>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ========Feature-Section Ends Here ========-->

@endif

@php
    $serviceCaption = getContent('service.content',true);
    $services = getContent('service.element');
@endphp
@if($serviceCaption)


    <section class="padding feature-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-header">
                        <h2 class="title">{{__(@$serviceCaption->data_values->heading)}}</h2>
                        <p>{{__(@$serviceCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
               @foreach($services as $k => $data)
                <div class="col-md-6 col-sm-10 col-xl-4">
                    <div class="section-feature-item">
                        <div class="feature-thumb">
                            <?php echo @$data->data_values->icon ?>
                        </div>
                        <div class="feature-content">
                            <h5 class="title">{{__(@$data->data_values->title)}}</h5>
                            <p>
                                {{__(@$data->data_values->description)}}
                            </p>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>

@endif


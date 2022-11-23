@php
    $teamCaption = getContent('team.content',true);
    $team = getContent('team.element');
@endphp
@if($teamCaption)



    <div class="team-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="team-header">
                        <h2 class="title">{{__(@$teamCaption->data_values->heading)}}</h2>
                        <p class="section-para mt-2">{{__(@$teamCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-30-none">

                @foreach($team as $data)
                <div class="col-lg-4 col-md-6 col-sm-8 text-center mb-30">
                    <div class="team-item">
                        <div class="team-thumb">
                            <img src="{{asset('assets/images/frontend/team/'.$data->data_values->image)}}" alt="team">
                            <div class="team-thumb-overlay">
                                <ul class="team-social">

                                    <li>
                                        <a href="{{@$data->data_values->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{@$data->data_values->twitter}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{@$data->data_values->pinterest}}"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{__(@$data->data_values->name)}}</h3>
                            <span class="sub-title">{{__(@$data->data_values->designation)}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
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

@php
    $teamCaption = getContent('team.content',true);
    $team = getContent('team.element');
@endphp
@if($teamCaption)

<section class="team-section padding">
    <div class="container">
        <div class="section-header">
            <h2 class="title">{{__(@$teamCaption->data_values->heading)}}</h2>
            <p>{{__(@$teamCaption->data_values->sub_heading)}}</p>
        </div>
        <div class="row justify-content-center mb-30-none">

            @foreach($team as $data)
            <div class="col-sm-10 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="team-item">
                    <div class="team-thumb">
                        <a href="javascript:void(0)">
                            <img src="{{asset('assets/images/frontend/team/'.$data->data_values->image)}}" alt="team">
                        </a>
                    </div>
                    <div class="team-content">
                        <h4 class="title mt-0">
                            <a href="javascript:void(0)">{{__(@$data->data_values->name)}}</a>
                        </h4>
                        <span>{{__(@$data->data_values->designation)}}</span>
                        <ul class="social-icons-team d-flex flex-wrap justify-content-center">
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
            </div>
            @endforeach


        </div>
    </div>
</section>
@endif

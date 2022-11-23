@extends($activeTemplate .'layouts.master')

@section('content')
    @include($activeTemplate.'partials.frontend-breadcrumb')

    <!-- ========Faq-Section Starte Here ========-->
    <section class="faq-section padding-top padding-bottom">
        <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="section-header">
                            <h2 class="title">{{__(@$ruleheads->data_values->heading)}}</h2>
                            <p>{{__(@$ruleheads->data_values->sub_heading)}}</p>
                        </div>
                    </div>
                </div>



            <div class="row justify-content-center justify-content-lg-between">

                <div class="col-lg-12 col-xl-12">
                    <div class="faq-wrapper style-two">
                        @foreach($rules as $k=>$data)
                            <div class="faq-item  open active">
                                <div class="faq-content">
                                    <p>@php echo $data->data_values->title @endphp</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========Faq-Section Ends Here ========-->
@endsection

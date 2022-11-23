@extends($activeTemplate .'layouts.master')

@section('content')
    @include($activeTemplate.'partials.frontend-breadcrumb')
    <section class="terms-section padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="terms-content">
                        <div class="item">
                            <h5 class="title" id="overview">{{$page_title}}</h5>
                            <p>@php echo $menu->data_values->body @endphp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends($activeTemplate .'layouts.master')

@section('content')

    @include($activeTemplate.'partials.breadcrumb')
    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9">
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">
                                <li>

                                    <a href="{{route('ticket.open') }}" class="btn btn-sm btn-rounded btn-success float-right">@lang('Open New Support Ticket')</a>
                                </li>
                                <li>
                                    <a href="#0" class="log-out d-lg-none">

                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon" style="display: block; height: unset;"></span>

                                            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">


                                <div class="row mb-60-80">
                                    <div class="col-md-12 mb-30">
                                        <div class="table-responsive table-responsive--md">
                                            <table class="table table-striped">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">@lang('Subject')</th>
                                                    <th scope="col">@lang('Status')</th>
                                                    <th scope="col">@lang('Last Reply')</th>
                                                    <th scope="col">@lang('Action')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($supports as $key => $support)
                                                    <tr>
                                                        <td data-label="@lang('Subject')"> <a href="{{ route('ticket.view', $support->ticket) }}" class="font-weight-bold"> [Ticket#{{ $support->ticket }}] {{ $support->subject }} </a></td>
                                                        <td data-label="@lang('Status')">
                                                            @if($support->status == 0)
                                                                <span class="badge badge-success py-2 px-3">Open</span>
                                                            @elseif($support->status == 1)
                                                                <span class="badge badge-primary py-2 px-3">Answered</span>
                                                            @elseif($support->status == 2)
                                                                <span class="badge badge-warning py-2 px-3">Customer Reply</span>
                                                            @elseif($support->status == 3)
                                                                <span class="badge badge-dark py-2 px-3">Closed</span>
                                                            @endif
                                                        </td>
                                                        <td data-label="@lang('Last Reply')">{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                                        <td data-label="@lang('Action')">
                                                            <a href="{{ route('ticket.view', $support->ticket) }}" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-desktop"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{$supports->links()}}
                                    </div>
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->



@endsection

@push('script')

@endpush

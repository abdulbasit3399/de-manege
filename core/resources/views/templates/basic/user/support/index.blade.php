@extends($activeTemplate .'layouts.user')

@section('content')
    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title"><span class="float-left">{{__($page_title)}}</span>

                        <a href="{{route('ticket.open') }}" class="btn btn-rounded btn-success float-right">@lang('Open New Support Ticket')</a>
                    </h2>
                </div>

            </div>
        </div>
    </div>



    <div class="privacy-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="dashboard-content">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard-inner-content">


                                    <div class="card">

                                        <div class="card-body p-0">

                                            <div>
                                                <table class="history_table">
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
                                                            <td data-label="@lang('Last Reply')">{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }}</td>

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                {{$supports->links()}}
                            </div>
                        </div>
                    </div>
                </div>
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
@endsection

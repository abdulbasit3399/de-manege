@extends('templates.crypto.layouts.user')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <section class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-12 p-4">
                        <a href="{{route('ticket.open') }}" class="btn btn-success" style="float:right;">
                        @lang('Open New Support Ticket')
                        </a>
                    </div>
                </div>
                <div id="what-is" class="card">
                    <div class="row">
                    <div class="table-responsive table-responsive--md">
                        <table class="table table-bordernone rounded">
                            <thead class="table-primary">
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
                                    <span class="badge badge-success ">Open</span>
                                    @elseif($support->status == 1)
                                    <span class="badge badge-primary ">Answered</span>
                                    @elseif($support->status == 2)
                                    <span class="badge badge-warning ">Customer Reply</span>
                                    @elseif($support->status == 3)
                                    <span class="badge badge-dark ">Closed</span>
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
                <!-- Simple Card-->
            </div>
        </section>
    </div>
</div>
@endsection

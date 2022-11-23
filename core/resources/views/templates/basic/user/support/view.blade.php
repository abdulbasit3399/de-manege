@extends($activeTemplate .'layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/ticket.css')}}">
    <style>
        .subscribe-block {
            display: none
        }

        .editor-statusbar {
            display: none;
        }

        .accordion .card::before {
            content: none !important;
            color: #fff;
            display: inline-block;
            box-shadow: none;
            background: transparent !important;
            font-size: 12px;
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 100%;
            text-align: center;
            line-height: 30px;
            top: 15px;
            left: 10px;
        }

        .card-body {
            border-radius: 20px;
        }

        .comment-content .comment-author {
            margin-bottom: -10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
        }

    </style>
@endpush
@section('content')

    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title"><span class="float-left">{{__($page_title)}}</span>
                        @auth
                        <a href="{{ route('ticket') }}"
                           class="btn btn-success float-right">@lang('My Support Ticket')</a>
                        @endauth
                    </h2>
                </div>

            </div>
        </div>
    </div>



    <div class="privacy-area pb-130 support-view">
        <div class="container">
            <div class="main-page main-page--style">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="dashboard-inner-content">


                            <div class="card-header ">
                                <h4 class="card-title ">
                                    @if($my_ticket->status == 0)
                                        <span class="badge badge-success py-2 px-3">@lang('Open')</span>
                                    @elseif($my_ticket->status == 1)
                                        <span class="badge badge-primary py-2 px-3">@lang('Answered')</span>
                                    @elseif($my_ticket->status == 2)
                                        <span class="badge badge-warning py-2 px-3">@lang('Replied')</span>
                                    @elseif($my_ticket->status == 3)
                                        <span class="badge badge-danger py-2 px-3">@lang('Closed')</span>
                                    @endif

                                    [Ticket#{{ $my_ticket->ticket }}] {{ $my_ticket->subject }}

                                    <button class="btn btn-danger float-right" type="button" data-toggle="modal"
                                            data-target="#DelModal"><i class="fa fa-lg fa-times-circle"></i>
                                        CLose Ticket
                                    </button>
                                </h4>

                            </div>

                            <div class="card-body p-0">

                                <div class="accordion" id="accordionExample">

                                    <div class="card">
                                        <div class="card-header card-header-bg" id="headingThree">
                                            <h2 class="mb-0 ">
                                                <a class="btn btn-link collapsed float-left "
                                                   href="javascript:void(0)" data-toggle="collapse"
                                                   data-target="#collapseThree" aria-expanded="true"
                                                   aria-controls="collapseThree">
                                                    <i class="fa fa-pencil"></i> @lang('Reply')
                                                </a>


                                                <a class="btn btn-link collapsed float-right accor"
                                                   href="javascript:void(0)" data-toggle="collapse"
                                                   data-target="#collapseThree" aria-expanded="true"
                                                   aria-controls="collapseThree">
                                                    <i class="fa fa-plus"></i>
                                                </a>

                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse show"
                                             aria-labelledby="headingThree"
                                             data-parent="#accordionExample">

                                            <div class="card-body p-0">
                                                @if($my_ticket->status != 4)
                                                    <form method="post"
                                                          action="{{ route('ticket.reply', $my_ticket->id) }}"
                                                          enctype="multipart/form-data" class="p-max-md-0">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row justify-content-between">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="message"
                                                                              class="form-control form-control-lg"
                                                                              id="inputMessage"
                                                                              placeholder="@lang('Your Reply') ..."
                                                                              rows="4" cols="10"></textarea>
                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class="d-flex flex-wrap justify-content-between align-items-center">

                                                            <div class="">
                                                                <div class="row justify-content-between w-100">
                                                                    <div class="col-md-11">

                                                                        <div class="form-group">
                                                                            <label for="inputAttachments">@lang('Attachments')</label>
                                                                            <input type="file"
                                                                                   name="attachments[]"
                                                                                   id="inputAttachments"
                                                                                   class="form-control"/>
                                                                            <div id="fileUploadsContainer"></div>
                                                                            <p class=" ticket-attachments-message text-muted">
                                                                                @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf")
                                                                            </p>
                                                                        </div>
                                                                    </div>


                                                                </div>


                                                            </div>

                                                            <div class="form-group m-1">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-danger btn-round"
                                                                   onclick="extraTicketAttachment()">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="m-1">
                                                                <button type="submit"
                                                                        class="btn btn-success custom-success"
                                                                        name="replayTicket" value="1">
                                                                    <i class="fa fa-reply"></i> @lang('Reply')
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-body p-0">

                                                @foreach($messages as $message)
                                                    @if($message->admin_id == 0)



                                                <div class="row border border-primary border-radius-3 my-3 py-3 mx-2">

                                                    <div class="col-md-3 border-right text-right">
                                                        <h5 class="my-3">{{ $message->ticket->name }}</h5>
                                                        <p><a href="javascript:void(0)">&#64;{{$message->ticket->name }}</a></p>

                                                    </div>

                                                    <div class="col-md-9">
                                                        <p class="text-muted font-weight-bold my-3">
                                                            @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                                        <p>{{$message->message}}</p>
                                                        @if($message->attachments()->count() > 0)
                                                            <div class="mt-2">
                                                                @foreach($message->attachments as $k=> $image)
                                                                    <a href="{{route('ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                    </div>

                                                </div>

                                                    @else


                                                <div class="row border border-warning border-radius-3 my-3 py-3" style="background-color: #21283a">

                                                    <div class="col-md-3 border-right text-right">
                                                        <h5 class="my-3">{{ $message->admin->name }}</h5>
                                                        <p class="lead text-muted">Staff</p>

                                                    </div>

                                                    <div class="col-md-9">
                                                        <p class="text-muted font-weight-bold my-3">
                                                            @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                                                        <p>{{$message->message}}</p>

                                                        @if($message->attachments()->count() > 0)
                                                            <div class="mt-2">
                                                                @foreach($message->attachments as $k=> $image)
                                                                    <a href="{{route('ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                    @endif
                                                @endforeach



                                            </div>
                                        </div>
                                    </div>



                                </div>


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


    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post" action="{{ route('ticket.reply', $my_ticket->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <strong class="modal-title"><i class='fa fa-exclamation-triangle'></i> @lang('Confirmation')
                            !</strong>

                        <button type="button" class="close btn btn-sm" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <strong>@lang('Are you sure you want to Close This Support Ticket')?</strong>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success btn-sm" name="replayTicket"
                                value="2"><i class="fa fa-check"></i> @lang("Confirm")
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                                class="fa fa-times"></i>
                            @lang('Close')
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>

        $(document).ready(function () {
            $('.delete-message').on('click', function (e) {
                $('.message_id').val($(this).data('id'));
            })

        });

        function extraTicketAttachment() {
            $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control mt-1" required />')
        }
    </script>
@endpush

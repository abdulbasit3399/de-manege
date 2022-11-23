@extends('admin.layouts.app')

@section('panel')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">
                    @if($ticket->status == 0)
                    <span class="badge badge-success py-2 px-3">Open</span>
                    @elseif($ticket->status == 1)
                    <span class="badge badge-primary py-2 px-3">Answered</span>
                    @elseif($ticket->status == 2)
                    <span class="badge badge-warning py-2 px-3">Customer Reply</span>
                    @elseif($ticket->status == 3)
                    <span class="badge badge-dark py-2 px-3">Closed</span>
                    @endif
                    [Ticket#{{ $ticket->ticket }}] {{ $ticket->subject }}
                </h4>
                <button class="btn btn-danger pull-right" type="button" data-toggle="modal" data-target="#DelModal"><i class="fa fa-lg fa-times-circle"></i> CLose Ticket </button>
            </div>
            <div class="card-body ">
                <form method="post" class="form-horizontal" action="{{ route('admin.ticket.reply', $ticket->id) }}" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="3" id="inputMessage"
                                placeholder="Your Message ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">   
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="inputAttachments">@lang('Attachments')</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="attachments[]" id="inputAttachments" class="form-control" />
                                    <div id="fileUploadsContainer"></div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-dark" onclick="extraTicketAttachment()"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-md-12 ticket-attachments-message text-muted mt-3">
                                    Allowed File Extensions: .jpg, .jpeg, .png, .pdf,
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 offset-md-3">
                            <button class="btn btn-primary btn-block mt-5" type="submit" name="replayTicket" value="1"><i class="fa fa-fw fa-lg fa-reply"></i> Reply </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row my-0 py-0">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


                @foreach($messages as $message)
                @if($message->admin_id == 0)

                <div class="row border border-primary border-radius-3 my-3 mx-2">

                    <div class="col-md-3 border-right text-right">
                        <h5 class="my-3">{{ $ticket->name }}</h5>
                        @if($ticket->user_id != null)
                        <p><a href="{{route('admin.users.detail', $ticket->user_id)}}" >@ {{ $ticket->name }}</a></p>
                        @else
                        <p>@ {{ $ticket->name }}</p>
                        @endif
                        <button data-id="{{$message->id}}" type="button" data-toggle="modal" data-target="#DelMessage" class="btn btn-danger btn-sm my-3 delete-message"><i class="fa fa-trash"></i> Delete</button>
                    </div>

                    <div class="col-md-9">
                        <p class="text-muted font-weight-bold my-3">
                            @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                            <p>{{ $message->message }}</p>
                            @if($message->attachments()->count() > 0)
                            <div class="mt-5">
                                @foreach($message->attachments as $k=> $image)
                                <a href="{{route('admin.ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                @endforeach
                            </div>
                            @endif
                        </div>

                    </div>





                    @else

                <div class="row border border-warning border-radius-3 my-3 mx-2" style="background-color: #faf8f1;">
                    
                    <div class="col-md-3 border-right text-right">
                        <h5 class="my-3">{{ $message->admin->name }}</h5>
                        <p class="lead text-muted">Staff</p>
                        <button data-id="{{$message->id}}" type="button" data-toggle="modal" data-target="#DelMessage" class="btn btn-danger btn-sm my-3 delete-message"><i class="fa fa-trash"></i> Delete</button> 

                    </div>

                    <div class="col-md-9">
                        <p class="text-muted font-weight-bold my-3">
                            @lang('Posted on') {{ $message->created_at->format('l, dS F Y @ H:i') }}</p>
                            <p>{{ $message->message }}</p>
                            @if($message->attachments()->count() > 0)
                            <div class="mt-5">
                                @foreach($message->attachments as $k=> $image)
                                <a href="{{route('admin.ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                @endforeach
                            </div>
                            @endif
                        </div>

                    </div>

                @endif
                @endforeach

                <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><i class='fa fa-exclamation-triangle'></i><strong> Close Support Ticket! </strong>
                                </h4>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you  want to Close This Support Ticket?</strong>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="{{ route('admin.ticket.reply', $ticket->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Cancel </button>
                                    <button type="submit" class="btn btn-warning" name="replayTicket" value="2"><i class="fa fa-check"></i> Close Ticket </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="modal fade" id="DelMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><i class='fa fa-exclamation-triangle'></i><strong>Delete Reply!</strong>
                                </h4>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this?</strong>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="{{ route('admin.ticket.delete')}}">
                                    @csrf
                                    <input type="hidden" name="message_id" class="message_id">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Cancel </button>
                                    <button type="submit" class="btn btn-danger "><i class="fa fa-trash"></i> Delete </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('breadcrumb-plugins')
        <a href="{{ route('admin.ticket') }}" class="btn btn-dark"><i class="fa fa-fw fa-backward"></i> Go Back </a>
        @endpush

        @push('style')
        <link rel="stylesheet" href="{{asset('assets/admin/css/simplemde.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/ticket.css')}}">
        @endpush

        @push('script')
        <script src="{{asset('assets/admin/js/simplemde.min.js')}}"></script>

        <script>
            var simplemde = new SimpleMDE({ element: document.getElementById("inputMessage") });

            $(document).ready(function () {
                $('.card-body').scrollTop($('.card-body')[0].scrollHeight);


                $('.delete-message').on('click', function (e) {
                    $('.message_id').val($(this).data('id'));
                })

            });

            function extraTicketAttachment() {
                $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control mt-1" required />')
            }


        </script>
        @endpush

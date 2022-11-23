@extends('templates.crypto.layouts.user')

@section('style')
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
@endsection

@section('content')

@guest

<div class="page-body">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                <div class="col-6">
                    <h3>{{__($page_title)}}</h3>
                </div>
                </div>
            </div>
        </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="tab-area fullscreen-width">
            <div class="tab-item active">
              <div class="row justify-content-center">
                <div class="col-md-12">


                  <div class="card">
                    <div class="card-header card-header-bg d-flex flex-wrap justify-content-between align-items-center">
                      <h5 class="card-title text-white mt-0">
                        @if($my_ticket->status == 0)
                        <span class="badge badge-success py-2 px-3">@lang('Open')</span>
                        @elseif($my_ticket->status == 1)
                        <span class="badge badge-primary py-2 px-3">@lang('Answered')</span>
                        @elseif($my_ticket->status == 2)
                        <span class="badge badge-warning py-2 px-3">@lang('Replied')</span>
                        @elseif($my_ticket->status == 3)
                        <span class="badge badge-dark py-2 px-3">@lang('Closed')</span>
                        @endif
                        [Ticket#{{ $my_ticket->ticket }}] {{ $my_ticket->subject }}
                      </h5>

                      <button class="btn btn-danger close-button" type="button" title="@lang('Close Ticket')" data-bs-toggle="modal" data-bs-target="#DelModal"><i class="fa fa-lg fa-times-circle"></i>
                      </button>

                    </div>

                    <div class="card-body">

                      <div class="accordion" id="accordionExample">

                        <div class="card">
                          <div class="card-header card-header-bg" id="headingThree">
                            <h2 class="my-2 ">
                              <a class="btn btn-link collapsed float-left "
                              href="javascript:void(0)" data-bs-toggle="collapse"
                              data-bs-target="#collapseThree" aria-expanded="true"
                              aria-controls="collapseThree">
                              <i class="fa fa-pencil-alt"></i> @lang('Reply')
                            </a>


                            <a class="btn btn-link collapsed float-right accor"
                            href="javascript:void(0)" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="true"
                            aria-controls="collapseThree">
                            <i class="fa fa-plus"></i>
                          </a>

                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse show"
                      aria-labelledby="headingThree"
                      data-parent="#accordionExample">

                      <div class="card-body">
                        @if($my_ticket->status != 4)
                        <form method="post"
                        action="{{ route('ticket.reply', $my_ticket->id) }}"
                        enctype="multipart/form-data">
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

                        <div class="row justify-content-between">

                          <div class="col-md-8 ">
                            <div class="row justify-content-between">
                              <div class="col-md-11">

                                <div class="form-group">
                                  <label for="inputAttachments">@lang('Attachments')</label>
                                  <input type="file" name="attachments[]"
                                  id="inputAttachments"
                                  class="form-control"/>
                                  <div id="fileUploadsContainer"></div>
                                  <p class="my-2 ticket-attachments-message text-muted">
                                    @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf")
                                  </p>
                                </div>
                              </div>
                              <div class="col-md-1">
                                <div class="form-group">
                                  <a href="javascript:void(0)"
                                  class="btn btn-danger mt-2"
                                  onclick="extraTicketAttachment()">
                                  <i class="ft-plus-square"></i>
                                </a>
                              </div>
                            </div>
                          </div>


                        </div>

                        <div class="col-md-3">
                          <button type="submit"
                          class="btn btn-success custom-success mt-4"
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
                <div class="card-body">

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


                    <div class="row border border-warning border-radius-3 my-3 py-3 mx-2" style="background-color: #ffd96729">

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
</div>
</div>
</div>
</div>
@else
<div class="page-body">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                <div class="col-6">
                    <h3>{{__($page_title)}}</h3>
                </div>
                </div>
            </div>
        </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="tab-area fullscreen-width">
            <div class="tab-item active">
              <div class="row justify-content-center">
                <div class="col-md-12">


                  <div class="card">
                    <div class="card-header card-header-bg d-flex flex-wrap justify-content-between align-items-center" style="background-color: #babfc773 !important;">
                      <h5 class="card-title mt-0">
                        @if($my_ticket->status == 0)
                        <span class="badge badge-success">@lang('Open')</span>
                        @elseif($my_ticket->status == 1)
                        <span class="badge badge-primary">@lang('Answered')</span>
                        @elseif($my_ticket->status == 2)
                        <span class="badge badge-warning">@lang('Replied')</span>
                        @elseif($my_ticket->status == 3)
                        <span class="badge badge-dark">@lang('Closed')</span>
                        @endif
                        [Ticket#{{ $my_ticket->ticket }}] {{ $my_ticket->subject }}
                      </h5>

                      <button class="btn btn-danger close-button" type="button" title="@lang('Close Ticket')"
                      data-bs-toggle="modal"
                      data-bs-target="#DelModal"><i class="fa fa-times"></i>

                    </button>

                  </div>

                  <div class="card-body">

                    @if($my_ticket->status != 4)
                    <form method="post"
                    action="{{ route('ticket.reply', $my_ticket->id) }}"
                    enctype="multipart/form-data">
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

                    <div class="row justify-content-between">

                      <div class="col-md-8 ">
                        <div class="row justify-content-between">
                          <div class="col-md-11">

                            <div class="form-group">
                              <label for="inputAttachments">@lang('Attachments')</label>
                              <input type="file"
                              name="attachments[]"
                              id="inputAttachments"
                              class="form-control"/>
                              <div id="fileUploadsContainer"></div>
                              <p class="my-2 ticket-attachments-message text-muted">
                                @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf")
                              </p>
                            </div>
                          </div>
                          <div class="col-md-1">
                            <div class="form-group">
                              <a href="javascript:void(0)"
                              class="btn btn-danger  mt-4"
                              onclick="extraTicketAttachment()">
                              <i class="fa fa-plus-square-o"></i>
                            </a>
                          </div>
                        </div>
                      </div>


                    </div>

                    <div class="col-md-3">
                      <button type="submit"
                      class="btn btn-success custom-success mt-4 mb-4"
                      name="replayTicket" value="1">
                      <i class="fa fa-reply"></i> @lang('Reply')
                    </button>
                  </div>

                </div>
              </form>
              @endif


              <div class="row">
                <div class="col-md-12">

                  <div class="card m-3">
                    <div class="card-body">

                      @foreach($messages as $message)
                      @if($message->admin_id == 0)



                      <div class="row border border-primary border-radius-3 my-3 py-3 mx-2">

                        <div class="col-md-3 border-end text-end">
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


                        <div class="row border border-warning border-radius-3 my-3 py-3 mx-2" style="background-color: #ffd96729">

                          <div class="col-md-3 border-end text-end">
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
      </div>
    </div>
  </div>
</div>
@endguest

<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" action="{{ route('ticket.reply', $my_ticket->id) }}">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <strong class="modal-title"><i class='fa fa-exclamation-triangle'></i> @lang('Confirmation')
          !</strong>

          <button type="button" class="close close-button" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
          <strong class="text-dark">@lang('Are you sure you want to Close This Support Ticket')?</strong>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"></i>
            @lang('Close')
          </button>

          <button type="submit" class="btn btn-success btn-sm" name="replayTicket"
          value="2"><i class="fa fa-check"></i> @lang("Confirm")
        </button>
      </div>

    </form>

  </div>
</div>
</div>
@endsection

@section('scripts')
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
@endsection

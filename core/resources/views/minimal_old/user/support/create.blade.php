@extends($activeTemplate .'layouts.user')
@section('content')

    @include($activeTemplate.'partials.breadcrumb')

    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9" >
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">

                                <li>
                                    <a href="{{route('ticket') }}" class="btn btn-sm btn-rounded btn-success float-right">@lang('My Support Ticket')</a>
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


                                <form  action="{{route('ticket.store')}}" role="form" method="post" enctype="multipart/form-data" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                                    @csrf
                                    <div class="row ">


                                        <div class="form-group col-md-6">
                                            <label for="name">@lang('Name')</label>
                                            <input type="text"  name="name" value="{{@$user->firstname . ' '.@$user->lastname}}" class="form-control form-control-lg" placeholder="@lang('Enter Name')" required readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">@lang('Email address')</label>
                                            <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg" placeholder="@lang('Enter your Email')" required readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="website">@lang('Subject')</label>
                                            <input type="text" name="subject" value="{{old('subject')}}" class="form-control form-control-lg" placeholder="@lang('Subject')" >
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="inputMessage">@lang('Message')</label>
                                            <textarea name="message" id="inputMessage" rows="12" class="form-control form-control-lg">{{old('message')}}</textarea>
                                        </div>
                                    </div>



                                    <div class="row form-group ">
                                        <div class="col-sm-9 file-upload">
                                            <label for="inputAttachments">@lang('Attachments')</label>
                                            <input type="file" name="attachments[]" id="inputAttachments" class="form-control mb-2" />
                                            <div id="fileUploadsContainer"></div>

                                            <p class="ticket-attachments-message text-muted">
                                                @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                                            </p>
                                        </div>



                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-success btn-sm" onclick="extraTicketAttachment()">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row form-group justify-content-center">
                                        <div class="col-md-2">
                                            <button class="btn btn-success btn-lg" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                                        </div>

                                        <div class="col-md-2">

                                            <button class=" btn btn-danger website-color btn-round" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button>
                                        </div>
                                    </div>
                                </form>


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
    <script>
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control my-3" required />')
        }
        function formReset() {
            window.location.href = "{{url()->current()}}"
        }


    </script>
@endpush

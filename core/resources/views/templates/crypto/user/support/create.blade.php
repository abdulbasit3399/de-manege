@extends('templates.crypto.layouts.user')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h3>{{__($page_title)}}</h3>
            </div>
            {{--  <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                <li class="breadcrumb-item">Bootstrap Tables</li>
                <li class="breadcrumb-item active">Bootstrap Styling Tables</li>
              </ol>
            </div>  --}}
          </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="what-is" class="card">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <a href="{{route('ticket') }}" class="btn btn-success" style="float:right;">
                              @lang('My Support Ticket')
                            </a>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                          <form  action="{{route('ticket.store')}}" role="form" method="post" enctype="multipart/form-data" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                              @csrf
                            <div class="row ">

                              <div class="form-group col-md-6">
                                <label for="name">@lang('Name')</label>
                                <input type="text"  name="name" value="{{@$user->firstname . ' '.@$user->lastname}}" class="form-control  " placeholder="@lang('Enter Name')" required readonly>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="email">@lang('Email address')</label>
                                <input type="email"  name="email" value="{{@$user->email}}" class="form-control  " placeholder="@lang('Enter your Email')" required readonly>
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-12">
                                <label for="website">@lang('Subject')</label>
                                <input type="text" name="subject" value="{{old('subject')}}" class="form-control  " placeholder="@lang('Subject')" >
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-12 form-group">
                                <label for="inputMessage">@lang('Message')</label>
                                <textarea name="message" id="inputMessage" rows="12" class="form-control  ">{{old('message')}}</textarea>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12">
                                <label for="name">@lang('Attachments')</label>
                              </div>
                            </div>
                            <section id="form-repeater">
                              <div class="row">
                                <div class="col-12">

                                <div class="repeater-default">
                                  <div data-repeater-list="car">
                                    <div data-repeater-item>
                                        <div class="form-group mt-1 col-sm-9">
                                          <input type="file" name="attachments[]" id="inputAttachments" class="form-control mb-0" />
                                          <p class="ticket-attachments-message text-muted m-0">
                                            @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                                          </p>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="form-group overflow-hidden">
                                      <div class="col-12">
                                        <button type="button" data-repeater-create class="btn btn-primary">
                                          <i class="fa fa-plus"></i> Add
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                              </section>
                            <div class="row form-group justify-content-center">
                              <div class="col-md-4">
                                <button class="btn btn-success mx-2" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                                <button class=" btn btn-danger website-color" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button>
                              </div>
                            </div>
                            </form>

                          </div>

                        </div>
                    </div>
                </div>

                <!-- Simple Card-->
              </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script src="{{asset('assets/new_assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/new_assets/app-assets/js/scripts/forms/form-repeater.js')}}" type="text/javascript"></script>
@endsection

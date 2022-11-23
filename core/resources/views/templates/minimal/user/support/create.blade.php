@extends('templates.minimal.layouts.user')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">{{__($page_title)}}</h3>
      </div>
      
    </div>
    <div class="content-body">
      <section class="row">
        <div class="col-sm-12">

          <div id="what-is" class="card">
            <div class="card-header">
              
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
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
                                    <i class="ft-plus"></i> Add
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
            </div>
          </div>

          <!-- Simple Card-->
        </div>
      </section>

    </div>
  </div>
</div>


@endsection

@section('script')
<script src="{{asset('assets/new_assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/new_assets/app-assets/js/scripts/forms/form-repeater.js')}}" type="text/javascript"></script>
@endsection
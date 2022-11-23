@extends('templates.crypto.layouts.user')

@section('content')

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
        <div class="col-lg-6 col-md-6">
          @if(Auth::user()->ts)
          <div class="card">
            <h5 class="card-header card-header-bg">@lang('Two Factor Authenticator')</h5>
            <div class="card-body">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" value="{{$prevcode}}"
                  class="form-control " id="referralURL"
                  readonly>
                  <div class="input-group-append">
                    <span class="input-group-text copytext" id="copyBoard"
                    onclick="myFunction()"> <i data-feather="copy"></i> </span>
                  </div>
                </div>
              </div>
              <div class="form-group mx-auto text-center">
                <img class="mx-auto" src="{{$prevqr}}">
              </div>
              <div class="form-group mx-auto text-center">
                <a href="#0"  class="btn btn-block btn-lg btn-danger"  data-bs-toggle="modal" data-bs-target="#disableModal">@lang('Disable Two Factor Authenticator')</a>
              </div>
            </div>
          </div>
          @else
          <div class="card">
            <h5 class="card-header card-header-bg">@lang('Two Factor Authenticator')</h5>
            <div class="card-body">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" name="key" value="{{$secret}}"
                  class="form-control" id="referralURL"
                  readonly>
                  <div class="input-group-append">
                    <span class="input-group-text copytext" id="copyBoard"
                    onclick="myFunction()"> <i data-feather="copy"></i> </span>
                  </div>
                </div>
              </div>
              <div class="form-group mx-auto text-center">
                <img class="mx-auto" src="{{$qrCodeUrl}}">
              </div>
              <div class="form-group mx-auto text-center">
                <a href="#0" class="btn btn-success btn-lg mt-3 mb-1"
                data-bs-toggle="modal"
                data-bs-target="#enableModal">@lang('Enable Two Factor Authenticator')</a>
              </div>
            </div>
          </div>
          @endif
        </div>
        <div class="col-lg-6 col-md-6">
          <div class=" card" >
            <h5 class="card-header card-header-bg">@lang('Google Authenticator')</h5>
            <div class=" card-body">
              <h5 class="text-uppercase">@lang('Use Google Authenticator to Scan the QR code  or use the code')</h5>
              <hr/>
              <p>@lang('Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.')</p>
              <a class="btn btn-success btn-md mt-3"
              href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
              target="_blank">@lang('DOWNLOAD APP')</a>
            </div>
          </div><!-- //. single service item -->
        </div>
      </div>
    </div>
</div>
</div>

<!--Enable Modal -->
<div id="enableModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Verify Your OTP')</h4>
        <button type="button" class="close close-button" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>

      </div>
      <form action="{{route('user.twofactor.enable')}}" method="POST">
        <div class="modal-body">

          {{csrf_field()}}
          <div class="form-group">
            <input type="hidden" name="key" value="{{$secret}}">
            <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-success btn-lg">@lang('Verify')</button>
        </div>

      </form>
    </div>

  </div>
</div>

<!--Disable Modal -->
<div id="disableModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Verify Your OTP to Disable')</h4>
        <button type="button" class="close close-button" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
      </div>
      <form action="{{route('user.twofactor.disable')}}" method="POST">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-success btn-lg">@lang('Verify')</button>
        </div>
      </form>
    </div>

  </div>
</div>

@endsection

@section('scripts')
<script>
  function myFunction() {
    var copyText = document.getElementById("referralURL");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    /*For mobile devices*/
    document.execCommand("copy");
    var alertStatus = "{{$general->alert}}";
    if (alertStatus == '1') {
      iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
    } else if (alertStatus == '2') {
      toastr.success("Copied: " + copyText.value);
    }
  }
</script>
@endsection

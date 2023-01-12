@extends($activeTemplate .'layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.pinlogin.css') }}"/>
<style>
    body{
        background-color: black;
    }
</style>
{{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-pincode-input.css') }}"/> --}}
{{-- <style>
    .pincode-input-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pincode-input-container .pincode-input-text {
        text-align: center;
        font-weight: 300;
        border: none;
/*        border-bottom: 1px solid;*/
        font-size: 35px;
        border-radius: 0px !important;
        margin-right: 10px;
    }
    .login-area .login-form .frm-grp input {
        padding:inherit;
    }
    .pincode-input-text, .form-control.pincode-input-text {
        width: 60px;
        height: 60px !important;

    }
    .pincode-input-container.touch .touchwrapper .touchtable td{
        border: none !important;
    }
</style> --}}
@endpush

@section('content')
    @php
        $bannerCaption = getContent('banner.content',true);
    @endphp
    @if($bannerCaption)
    <!-- ========Banner-Section Starts Here ========-->
    {{-- <section class="" style="margin-top: 130px">

         <div class="banner-shape01">
             <img src="{{asset($activeTemplateTrue.'images/animation/banner-shape.png')}}" alt="banner" style="display:none;">
        </div>
        <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/05.png')}}" alt="shape">
        </div>
        <div class="circle-2 three" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/11.png')}}" alt="shape">
        </div>

        <div class="circle-2 five" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/15.png')}}" alt="shape">
        </div>

         <div class="container">
            <div class="banner-area align-items-center">
                <div class="banner-content">
                    <h1 class="title">{{__(@$bannerCaption->data_values->heading)}}</h1>
                    <p class="text-white">{{__(@$bannerCaption->data_values->sub_heading)}}</p>
                    <a href="{{@$bannerCaption->data_values->button_link}}" class="custom-button">{{__($bannerCaption->data_values->button_name)}}</a>
                </div>

                <div class="banner-thumb d-none d-md-block">
                    <div class="thumb">
                        <img src="{{asset('assets/images/frontend/banner/'.@$bannerCaption->data_values->image)}}" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ========Banner-Section Ends Here ========-->
    @endif
    <div class="container">

    <div class="row justify-content-center mt-4">

        @foreach ($tile as $tl)
        <div class="card m-3 p-3 identifyingClass" data-price="{{ $tl->price }}" data-name="{{ $tl->name }}" data-id="{{ $tl->id }}" data-toggle="modal" data-target="#depoModal" style="border: 2px solid #358f79; width: 15rem; border-radius: 8%;background:linear-gradient(rgba(255,255,255,.3), rgba(255,255,255,.2)),url({{ asset('assets/images/gateway/' .$tl->image) }});height: 203px;background-size: cover;background-position: center;">
        {{-- <img src="{{ asset('assets/images/gateway/' .$tl->image) }}" data-price="{{ $tl->price }}" data-name="{{ $tl->name }}" data-id="{{ $tl->id }}" data-toggle="modal" data-target="#depoModal" class="card-img-top identifyingClass" alt="..."> --}}

        <div class="text-start p-2" style="height: 100%;">
            <h6 class="card-subtitle text-white " id="name" style="position: absolute; margin-top:10px; padding:4px; top: 0; background: #1f233a9e;border-radius: 8px;border: 1px solid #358f79;">{{ $tl->name }}</h6>
            <p class="card-title text-white pl-2" name="price" id="price" style="position: absolute;bottom: 0;background: #1f233a9e;border-radius: 8px;border: 1px solid #358f79;width: 60px;">{{ $general->cur_sym }} {{ $tl->price }}</p>
        </div>
        {{--  <p class="card-text">{{ $tl->description }}</p>  --}}
        {{--  <div class="text-center">
            <a href="#" class="btn mr-2 btn-primary" data-toggle="modal" data-target="#depoModal"><i class="fas fa-user"></i> Login</a>
        </div>  --}}
        </div>
        @endforeach
    </div>

    </div>
    {{--  <section>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">Mailchimp</h6> <span>1 days ago</span>
                                </div>
                            </div>
                            <div class="badge"> <span>Design</span> </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">Senior Product<br>Designer-Singapore</h3>
                            <div class="mt-5">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="mt-3"> <span class="text1">32 Applied <span class="text2">of 50 capacity</span></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="bx bxl-dribbble"></i> </div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">Dribbble</h6> <span>4 days ago</span>
                                </div>
                            </div>
                            <div class="badge"> <span>Product</span> </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">Junior Product<br>Designer-Singapore</h3>
                            <div class="mt-5">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="mt-3"> <span class="text1">42 Applied <span class="text2">of 70 capacity</span></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="bx bxl-reddit"></i> </div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">Reddit</h6> <span>2 days ago</span>
                                </div>
                            </div>
                            <div class="badge"> <span>Design</span> </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">Software Architect <br>Java - USA</h3>
                            <div class="mt-5">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="mt-3"> <span class="text1">52 Applied <span class="text2">of 100 capacity</span></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}

    {{--  @if($sections->secs != null)
    @foreach(json_decode($sections->secs) as $sec)
        @include($activeTemplate.'sections.'.$sec)
    @endforeach
    @endif  --}}
<!-- Modal -->
<div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content ">

        <form action="{{route('user.purchases')}}" method="post" id="formin">
        @csrf
        <input type="hidden" name="user_id" value="{{ \Auth::id() }}">
        <input type="hidden" name="amount" id="amount" value="">
        <input type="hidden" name="name" id="nam" value="">
        <input type="hidden" name="tile_id" id="tile_id" value="">
        <div class="modal-body">
            <div class="form-group">
                <div class="form-group">
                <strong>@lang('Selecteer Gebruikersnaam')</strong>
                <select id="" name="usrr_id" class="form-control select-country @error('username') is-invalid @enderror" required>
                    <option value="">Selecteer</option>
                    @foreach($user as $ur)
                    @if($ur->status == 1)
                    <option value="{{$ur->id}}">{{$ur->username}}</option>
                    @endif
                    @endforeach
                </select>
                </div>

                <strong>@lang('Quantity')</strong>
                    <br/>
                <input type="button" value="-" id="subs" class="minus pull-left col-1 m-1 " style=""/>
                <input type="text" style="" class="onlyNumber pull-left col-3 mt-1 text-center" id="noOfRoom" value="1" name="quantity" />
                <input type="button" value="+" id="adds" class="plus col-1 m-1" />

                <div class="form-group">
                    <strong>@lang('Pin')</strong>
                    <br/>
                    <div id="pinwrapper"></div>
                    <input name="password" type="hidden" id="pinpasswrd" required class="form-control">
                    {{--  <input type="password" class="form-control" name="password" value="" maxlength="4" pattern="\d{4}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>  --}}
                </div>

            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" id="kopen" class="btn btn-success" >@lang('Kopen')</button>
        </div>
        </form>

    {{--  <form action="{{route('user.login')}}" method="post">
        @csrf
        <div class="modal-body">
            <div class="form-group">
            <div class="form-group">
                <strong>@lang('Select Username')</strong>
                <select id="" name="username" class="form-control select-country @error('username') is-invalid @enderror">
                <option value=""></option>
                    @foreach($user as $ur)
                    <option value="{{$ur->username}}">{{$ur->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <strong>@lang('Password')</strong>
            <input type="password" class="form-control" id="" name="password" value="" onkeyup="">
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="submit"  class="btn btn-success " >@lang('Login')</button>
        </div>
    </form>  --}}
    </div>
    </div>
</div>

@endsection

@push('script')

<script src="{{ asset('assets/admin/js/jquery.pinlogin.js') }}"></script>
<script type="text/javascript">
    $('#kopen').click(function(){
        $('#formin').submit();
    });
    $('#pinwrapper').pinlogin({
      fields : 4,
      reset : false,
      complete : function(pin){
            $('#pinpasswrd').val(pin);
            // alert ('Awesome! You entered: ' + pin);

            // reset the inputs
            loginpin.reset();

            // disable the inputs
            loginpin.disable();

            // further processing here
        },
    });
</script>

{{-- <script src="{{ asset('assets/admin/js/bootstrap-pincode-input.js') }}"></script> --}}
{{-- <script>
    $('.pincode-input').pincodeInput({
        inputs:4,
        placeholder:"- - - -",
        hidedigits:true
    });
</script> --}}

<script type="text/javascript">
    $(function () {
        $(".identifyingClass").click(function () {

            var price = $(this).data('price');
            $('#amount').val(price);

            var name = $(this).data('name');
            $('#nam').val(name);

            var id = $(this).data('id');
            $('#tile_id').val(id);

        })
    });
</script>
<script>
    $(function(){
        $('#adds').on('click',add);
        $('#subs').on('click',remove);
      });

      function add(){

        var input = $('#noOfRoom'),
            value = input.val();

        input.val(++value);

        if(value > 0){
          $('#subs').removeAttr('disabled');
        }

      }

      function remove(){

         var input = $('#noOfRoom'),
             value = input.val();

         if(value > 0){
           input.val(--value);
         }else{
           $('#subs').attr('disabled','disabled');
        }

      }
</script>
<script>
    $('#depoModal').on('shown.bs.modal', function () {
        $('#pinwrapper_pinlogin_0').focus();
    });
</script>
@endpush



@extends($activeTemplate .'layouts.master')
@push('style')
<link rel="stylesheet" href="{{asset('assets/admin/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

  .valid {
    background: url(../assets/images/if_tick_12514.png) no-repeat;
    color: #3a7d34;
    background-position: left;
    padding-left: 22px;
    line-height: 24px;
  }

  .invalid {
    background: url(../assets/images/if_cross-button_45933.png) no-repeat;
    background-position: left;
    padding-left: 22px;
    line-height: 24px;
    color: #ec3f41;
  }

  .intl-tel-input {
    position: relative;
    display: inline-block;
    width: 100%;
    !important;
  }
  .header-top, .page-header > *{
    display:none;
  }

  .header{
    top:0px;
    background:#000036;
  }

  header.inActive, header.active{
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }



  .page-header{
   background-image: none !important;
   padding: 0px !important;
 }

 .card0 {
  background-color: #F5F5F5;
  border-radius: 8px;
  z-index: 0
}


.account-form{
  margin-bottom:40px;

}

.account-form input[type="radio"]{
  width:unset;
  height: 15px !important;

}

.form_radio{
  display: flex;
  align-items: baseline;
}

.form_radio label{
  margin-left: 10px;
}

.form_radio p{
  margin-bottom: 0px;
  margin-top: 0px;
  color: #000;
  font-weight: 600;
}

.card00 {
  z-index: 0
}

.card1 {
  margin-left: 140px;
  z-index: 0;
  border-right: 1px solid #F5F5F5
}

.card2 {
  display: none
}

.card2.show {
  display: block
}

.social {
  border-radius: 50%;
  background-color: #FFCDD2;
  color: #3418ce;
  height: 47px;
  width: 47px;
  padding-top: 16px;
  cursor: pointer
}

input,
select {
  padding: 2px;
  border-radius: 0px;
  box-sizing: border-box;
  color: #9E9E9E;
  border: 1px solid #BDBDBD;
  font-size: 16px;
  letter-spacing: 1px;
  height: 50px !important
}

select {
  width: 100%;
  margin-bottom: 85px
}

input:focus,
select:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid #3418ce !important;
  outline-width: 0 !important
}

.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
  background-color: #3418ce
}

.form-group {
  position: relative;
  margin-bottom: 1.5rem;
  width: 77%
}

.form-control-placeholder {
  position: absolute;
  top: 0px;
  padding: 12px 2px 0 2px;
  transition: all 300ms;
  opacity: 0.5
}

.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
  font-size: 95%;
  top: 15px;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
  background:#fff;

}


input:-internal-autofill-selected{
  background-color:#fff !important;
}

.next-button {
  width: 18%;
  height: 50px;
  background-color: #BDBDBD;
  color: #fff;
  border-radius: 6px;
  padding: 10px;
  cursor: pointer
}

.next-button:hover {
  background-color: #1396f0;
  color: #fff
}

.get-bonus {
  margin-left: 154px
}

.pic {
  width: 230px;
  height: 110px
}

#progressbar {
  position: absolute;
  left: 35px;
  overflow: hidden;
  color: #3418ce
}

#progressbar li {
  list-style-type: none;
  font-size: 8px;
  font-weight: 400;
  margin-bottom: 36px;
  position:relative;
}


#progressbar .step0:before {
  content: "";
  color: #fff
}

#progressbar li:before {
  width: 30px;
  height: 30px;
  line-height: 30px;
  display: block;
  font-size: 20px;
  background: #fff;
  border: 2px solid #3418ce;
  border-radius: 50%;
  margin: auto
}



#progressbar li:after {
  content: '';
  width: 3px;
  height: 76px;
  background: #BDBDBD;
  position: absolute;
  bottom: 15px;
  z-index: -1;

}




#progressbar li:nth-child(2):after {

  left:auto;
}

#progressbar li:first-child:after {
  position: absolute;
  top: 15%;
  left:auto;
}

#progressbar li.active:after {
  background: #3418ce
}

#progressbar li.active:before {
  background: #3418ce;
  font-family: FontAwesome;
  content: "\f00c"
}

.container-fluid{
  margin-top: 60px;
}

.tick {
  width: 100px;
  height: 100px
}

.prev {
  display: block;
  position: absolute;
  left: 40px;
  top: 20px;
  cursor: pointer;
  color:#1396f0;

}


// .header-bottom .logo img{
  //     background-color: #3418ce;
  // }
  h6 {
    font-size: 18px;
  }

  .mb-5, .my-5 {
    margin-bottom: 4rem!important;
  }


  @media screen and (max-width: 912px) {
    .card00 {
      padding-top: 30px
    }
    


    .card1 {
      border: none;
      margin-left: 50px
    }

    .card2 {
      border-bottom: 1px solid #F5F5F5;
      margin-bottom: 25px
    }

    .social {
      height: 30px;
      width: 30px;
      font-size: 15px;
      padding-top: 8px;
      margin-top: 7px
    }

    .get-bonus {
      margin-top: 40px !important;
      margin-left: 75px
    }

    #progressbar {
      left: -25px
    }
    

    
  }
  @media screen and (max-width: 768px) {
   .progressbar_div{
    display:none;
  }

}

</style>
@endpush
@section('content')

<div class="container-fluid px-1 px-md-4 py-5 mx-auto">
  <div class="row d-flex justify-content-center">
    <div class="col-12 col-md-11 col-lg-10 col-xl-9">
      <div class="card card0 border-0">
        <div class="row">
          <div class="col-12">
            <div class="card card00 m-2 border-0">
              <div class="row text-center justify-content-center px-3">

                <h3 class="mt-4">@lang('Create your account')</h3>
              </div>
              <form action="{{ route('user.register') }}" method="POST" class="account-form" onsubmit="return submitUserForm();">
                @csrf
                @isset($reference)
                <div class="form-group">
                  <label class="fixlabel" for="email1">
                    <i class="fas fa-user-circle"></i>
                  </label>
                  <input type="text" name="referBy" class="form-control" id="referenceBy"
                  value="{{$reference}}" placeholder="@lang('Reference BY')" readonly/>
                </div>
                @endisset
                <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse">
                  <div class="col-md-6 progressbar_div">
                    <div class="card1">
                      <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>
                        <li class="step0"></li>

                      </ul>
                      <h6 class="mb-5">Enter your Name</h6>
                      <h6 class="mb-5">Enter your Email</h6>
                      <h6 class="mb-5">Set password</h6>
                      <h6 class="mb-5">Age</h6>
                      <h6 class="mb-5">Investment Experience</h6>
                      <h6 class="mb-5">Source Of Wisdom</h6>
                      <h6 class="mb-5">Duration Of Investment</h6>
                      <h6 class="mb-5">Investment Planning</h6>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="card2 first-screen show ml-2">

                      <div class="row px-3 mt-4">
                        <div class="form-group mt-1 mb-1"> 
                          <input type="text" name="firstname" id="first_name" class="form-control" value="{{old('firstname')}}"  required> <label class="ml-3 form-control-placeholder" for="first_name">@lang('First Name')</label>
                        </div>

                      </div>
                      <div class="row px-3 mt-4">
                        <div class="form-group mt-1 mb-1"> 
                          <input type="text" name="lastname" id="last_name" class="form-control"  required> <label class="ml-3 form-control-placeholder" for="last_name">@lang('Last Name')</label>
                        </div>

                      </div>

                      <div class="row px-3 mt-4">
                        <div class="form-group mt-1 mb-1"> 
                          <input type="text" name="username" id="username" class="form-control" required><label class="ml-3 form-control-placeholder" for="username">@lang('Username')</label>
                          <small>Note: Must be 6 characters long.</small>
                        </div>

                      </div>
                      <div class="row px-3 mt-4">

                       <div class="next-button text-center mr-5 mt-1 " style="margin-left:auto;"> <span class="fa fa-arrow-right"></span> </div>
                     </div>

                   </div>
                   <div class="card2 ml-2">
                    <div class="row px-3 mt-4">
                      <div class="form-group mt-1 mb-1"> 
                        <label class=" " for="country">@lang('Select Country')</label>
                        <select id="country" name="country">
                          <option value="">@lang('Select Country')</option>
                          @foreach($country as $c)
                          <option value="{{$c['country_code']}}"> {{$c['country_name']}} </option>
                          @endforeach
                        </select>

                      </div>
                    </div>
                    <div class="row px-3 mt-4">
                      <div class="form-group mt-1 mb-1"> 
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required> <label class="ml-3 form-control-placeholder" for="email">@lang('E-mail Address')</label>
                      </div>

                    </div>
                    <div class="row px-3 mt-4">
                      <div class="form-group mt-1 mb-1"> 
                        <input type="hidden" id="track" name="country_code">
                        <input type="tel" name="mobile" id="phone" class="form-control pranto-control" value="{{old('mobile')}}" required> 
                      </div>

                    </div>
                    <div class="row px-3 mt-4 d-flex" style="justify-content:space-between;">
                      <p class="prev mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                      <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                       
                    </div>

                  </div>


                  <div class="card2 ml-2">
                    <div class="row px-3 mt-3">
                      <div class="form-group mt-1 mb-1">
                        <input type="password"  name="password" id="pwd" onkeyup="AvoidSpace(this);" onchange="AvoidSpace(this);"  class="form-control" value="{{old('password')}}" required> <label class="ml-3 form-control-placeholder" for="pwd">@lang('Password')</label> </div>

                        <div id="pswd_info" style="list-style: unset; display: none;" bis_skin_checked="1">
                          <ul style="list-style: none !important;padding:0;">
                            <li id="number" class="invalid">At least
                              <strong>one number</strong></li>
                              <li id="letter" class="invalid">At least
                                <strong>one Special Character</strong></li>
                                <li id="length" class="invalid">Be at least
                                  <strong>6 characters</strong></li>
                                </ul>
                              </div>

                            </div>
                            <div class="row px-3 mt-3">
                              <div class="form-group mt-1 mb-1">
                                <input type="password"  name="password_confirmation" id="pwd1" class="form-control"  required> <label class="ml-3 form-control-placeholder" for="pwd1">@lang('Retype Password')</label> </div>

                              </div>
                              <div class="row px-3 mt-3" style="justify-content:space-between;">
                                <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                                <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                     
                              </div>



                            </div>

                            <div class="card2 ml-2">
                             <div class="row px-3 mt-3">
                               <h6>How old are you? </h6>
                               <div class="form-group mt-1 mb-1">
                                <input type="number"  name="age" id="age" class="form-control" value="{{old('age')}}" required> <label class="ml-3 form-control-placeholder" for="age">@lang('Age')</label>
                              </div>
                            </div>
                            <div class="row px-3 mt-3" style="justify-content:space-between;">
                              <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                              <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                     
                            </div>

                          </div>

                          <div class="card2 ml-2">
                           <div class="row px-3 mt-3">
                             <h6>How would you describe your level of familiarity with investing?</h6>
                             <div class="mt-1 mb-1">
                               <div class="form_radio">
                                <input type="radio" name="investment_experience" value="novice" required> <label for="novice"><p>Novice</p> <span>I’m new to investing</span></label>
                              </div>
                              <div class="form_radio">
                                <input type="radio" name="investment_experience" value="beginner" required> <label for="beginner"><p>Beginner</p><span>I have an employer-based 401k, IRA, or other retirement account but my involvement is limited in selecting the actual investments</span></label>
                              </div>
                              <div class="form_radio">
                                <input type="radio" name="investment_experience" value="competent" required> <label for="competent"><p>Competent</p> <span>I’m relatively experienced when it comes to investing in the stock market and may be familiar with real estate investing</span></label>
                              </div>
                              <div class="form_radio">
                                <input type="radio" name="investment_experience" value="proficient" required> <label for="proficient"><p>Proficient</p> <span>I invest in a wide variety of stocks and bonds, this can include real estate investing</span></label>
                              </div>
                              <div class="form_radio">
                                <input type="radio" name="investment_experience" value="expert" required> <label for="expert"><p>Expert</p> <span>I have experience investing in private real estate deals or have owned my own investment properties</span></label>
                              </div>
                            </div>
                          </div>
                          <div class="row px-3 mt-3" style="justify-content:space-between;">
                            <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                            <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                     
                          </div>

                        </div>

                        <div class="card2 ml-2">
                         <div class="row px-3 mt-3">
                           <h6>Where do you go for investing advice?</h6>
                           <div class="mt-1 mb-1">
                             <div class="form_radio">
                              <input type="radio" name="wisdom_source" value="Investment advisor" required> <label for="investment_advisor"><p>Investment advisor</p> <span>I have an investment advisor that I pay to manage my portfolio</span></label>
                            </div>
                            <div class="form_radio">
                              <input type="radio" name="wisdom_source" value="Self-educate" required> <label for="self_educate"><p>Self-educate</p> <span>I read books and articles, picking investments based on my own in-depth analysis</span></label>
                            </div>
                            <div class="form_radio">
                              <input type="radio" name="wisdom_source" value="Friends and family" required> <label for="friends_family"><p>Friends and family</p> <span>I rely on the advice of friends and family that I trust</span></label>
                            </div>
                            <div class="form_radio">
                              <input type="radio" name="wisdom_source" value="I don’t seek advice" required> <label for="no_advise"><p>I don’t seek advice</p><span>Historically, I don’t invest outside of my employer-based plan, so I own whatever they’ve selected for me</span></label>
                            </div>
                          </div>
                        </div>
                        <div class="row px-3 mt-3" style="justify-content:space-between;">
                          <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                          <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                     
                        </div>

                      </div>



                      <div class="card2 ml-2">
                       <div class="row px-3 mt-3">
                         <h6>How long do you plan to hold your Reelshares investment?</h6>
                         <div class="mt-1 mb-1">
                           <div class="form_radio">
                            <input type="radio" name="investment_duration" value="Less than 3 years" required> <label for="duration3">Less than 3 years</label>
                          </div>
                          <div class="form_radio">
                            <input type="radio" name="investment_duration" value="3-5 years" required> <label for="duration35">3-5 years</label>
                          </div>
                          <div class="form_radio">
                            <input type="radio" name="investment_duration" value="6-10 years" required> <label for="duration61">6-10 years</label>
                          </div>
                          <div class="form_radio">
                            <input type="radio" name="investment_duration" value="More than 10 years" required> <label for="duration1">More than 10 years</label>
                          </div>

                        </div>
                      </div>
                      <div class="row px-3 mt-3" style="justify-content:space-between;">
                        <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">
                        <div class="next-button text-center mt-1 ml-2"> <span class="fa fa-arrow-right"></span> </div>                                                     
                      </div>

                    </div>


                    <div class="card2 ml-2">
                     <div class="row px-3 mt-3">
                       <h6>How much do you plan to invest on a yearly basis?</h6>
                       <div class="mt-1 mb-1">
                         <div class="form_radio">
                          <input type="radio" name="investment_planning" value="Less than $5,000" required> <label for="planning1">Less than $5,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="$5,000 - $10,000" required> <label for="planning2">$5,000 - $10,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="$11,000 - $20,000" required> <label for="planning3">$11,000 - $20,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="$21,000 - $30,000" required> <label for="planning4">$21,000 - $30,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="$31,000 - $50,000" required> <label for="planning5">$31,000 - $50,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="$51,000- $100,000" required> <label for="planning6">$51,000- $100,000</label>
                        </div>
                        <div class="form_radio">
                          <input type="radio" name="investment_planning" value="More than $100,000" required> <label for="planning7">More than $100,000</label> 
                        </div>

                      </div>
                    </div>
                    <div class="row px-3 mt-3" style="justify-content:space-between;">
                      <p class="prev  mb-0" style="position:relative;"><span class="fa fa-long-arrow-left mb-0" > Go Back</span></p id="back">

                    </div>
                    <div class="row px-3 mt-3">
                      <div class="form-group">
                        @php echo recaptcha() @endphp
                      </div>
                      @include($activeTemplate.'partials.custom-captcha')

                      <div class="form-group mt-1 mb-1">
                        <input type="submit" id="recaptcha" class="form-control submit-form-btn" value="@lang('SIGN UP')">
                      </div>
                      <div class="form-group">
                        @lang("Already have an account yet?")
                        <a href="{{route('user.login')}}" class=" d-block">@lang('Sign In')</a>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="login_section" style="text-align: center;">
  @lang("Already have an account yet?")
  <a href="{{route('user.login')}}" class=" d-block">@lang('Sign In')</a>
</div>
</div>


<!-- ========Header-Section Ends Here ========-->

@endsection

@push('script')
<script src="{{ asset('assets/admin/build/js/intlTelInput.js') }}"></script>

<script>

  $('select[name=country]').val("{{ old('country') }}");

  $("#phone").on("countrychange", function (e, countryData) {
            // do something with countryData

            var data = $(this).val('+' + countryData.dialCode)
            $('#track').val(data);
            var country = countryData.name;
            var country = country.split('(')[0];
            $('#country').val(country);
          });
  $("#phone").intlTelInput({
    geoIpLookup: function (callback) {
      $.get("https://ipinfo.io", function () {
      }, "jsonp").always(function (resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
      });
    },

            // hiddenInput: "full_number",
            initialCountry: "auto",
            utilsScript: "{{asset('assets/admin/build/js/utils.js')}}"
          });

  function submitUserForm() {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
      return false;
    }
    return true;
  }

  function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
  }


  $(document).ready(function(){

    var current_fs, next_fs, previous_fs;

// No BACK button on first screen
if($(".show").hasClass("first-screen")) {
  $(".prev").css({ 'display' : 'none' });
}

// Next button
$(".next-button").click(function(){

  current_fs = $(this).parent().parent();
  next_fs = $(this).parent().parent().next();

  $(".prev").css({ 'display' : 'block' });

  $(current_fs).removeClass("show");
  $(next_fs).addClass("show");

  $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

  current_fs.animate({}, {
    step: function() {

      current_fs.css({
        'display': 'none',
        'position': 'relative'
      });

      next_fs.css({
        'display': 'block'
      });
    }
  });
});

// Previous button
$(".prev").click(function(){

  current_fs = $(".show");
  previous_fs = $(".show").prev();

  $(current_fs).removeClass("show");
  $(previous_fs).addClass("show");

  $(".prev").css({ 'display' : 'block' });

  if($(".show").hasClass("first-screen")) {
    $(".prev").css({ 'display' : 'none' });
  }

  $("#progressbar li").eq($(".card2").index(current_fs)).removeClass("active");

  current_fs.animate({}, {
    step: function() {

      current_fs.css({
        'display': 'none',
        'position': 'relative'
      });

      previous_fs.css({
        'display': 'block'
      });
    }
  });
});

});


  $('#pwd').keyup(function () {
    //  $('.registerBtn').prop('disabled',true);
    // alert(1);
    // keyup code here
    // set password variable
    var pswd = $(this).val();
    //validate the length
    if (pswd.length < 6) {
      $('#length').removeClass('valid').addClass('invalid');
    } else {
      $('#length').removeClass('invalid').addClass('valid');
    }
    //validate letter
    if (pswd.match(/[!@#$%\^&*(){}[\]<>?/|\-]/)) {
      $('#letter').removeClass('invalid').addClass('valid');
    } else {
      $('#letter').removeClass('valid').addClass('invalid');
    }



    //validate number
    if (pswd.match(/\d/)) {
      $('#number').removeClass('invalid').addClass('valid');
    } else {
      $('#number').removeClass('valid').addClass('invalid');
    }
  }).focus(function () {
    $('#pswd_info').show();
  }).blur(function () {
    $('#pswd_info').hide();
  });


</script>

@endpush

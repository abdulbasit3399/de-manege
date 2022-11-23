<style>
.total .col-md-6:nth-child(odd){
    padding-right:0px;
}
</style>

@extends($activeTemplate .'layouts.master')
@section('style')


/*  <style>
    .card {
        border: none;
        border-radius: 10px
    }

    .c-details span {
        font-weight: 300;
        font-size: 13px
    }

    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    .progress {
        height: 10px;
        border-radius: 10px
    }

    .progress div {
        background-color: red
    }

    .text1 {
        font-size: 14px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }
</style> */
@endsection

@section('content')

    @php
        $bannerCaption = getContent('banner.content',true);
    @endphp
    @if($bannerCaption)
    <!-- ========Banner-Section Starts Here ========-->
    <section class="banner-section">
        <div class="banner-shape02"></div>
        <div class="banner-shape03"></div>
        {{--  <div class="banner-shape01">
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
        </div>  --}}

        {{--  <div class="container">
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
        </div>  --}}
    </section>
    <!-- ========Banner-Section Ends Here ========-->
    @endif
    <div class="container">

        <div class="row justify-content-center mt-4">

    @foreach ($tile as $tl)
        <div class="card m-3" style="width: 15rem; border-radius: 8%;">
        <img src="{{ asset('assets/images/gateway/' .$tl->image) }}" data-price="{{ $tl->price }}" data-name="{{ $tl->name }}" data-id="{{ $tl->id }}" data-toggle="modal" data-target="#depoModal" class="card-img-top identifyingClass" alt="...">

        <div class="text-start p-2" style="margin-top:-80px">
            <h5 class="card-title" name="price" id="price">${{ $tl->price }}</h5>
            <h6 class="card-subtitle text-muted " id="name">{{ $tl->name }}</h6>
        </div>
        {{--  <p class="card-text">{{ $tl->description }}</p>  --}}
        {{--  <div class="text-center">
            <a href="#" class="btn mr-2 btn-primary" data-toggle="modal" data-target="#depoModal"><i class="fas fa-user"></i> Login</a>
        </div>  --}}
            {{--  <a href="#" class="btn "><i class="fab fa-github"></i> Github</a>  --}}
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
          <div class="modal-header">

            @guest
            <h5 class="modal-title pt-2" id="ModalLabel">Sign In</h5>
            @endguest

          </div>

          @auth
          <form action="{{route('user.purchases')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ \Auth::id() }}">

            <input type="hidden" name="amount" id="amount" value="">
            <input type="hidden" name="name" id="nam" value="">
            <input type="hidden" name="tile_id" id="tile_id" value="">


            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >@lang('Go Back')</button>
            </div>
          </form>
          @endauth

          @guest
          <form action="{{route('user.login')}}" method="post">
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
        </form>
          @endguest

      </div>
    </div>
    </div>


@endsection

@push('script')

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
@endpush


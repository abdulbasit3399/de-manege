<style>
  .log-out .navbar-toggler-icon {
    display: unset;
    vertical-align: unset;
  }
</style>
@extends($activeTemplate .'layouts.user')


@section('content')

@include($activeTemplate.'partials.breadcrumb')
<!-- ========User-Panel-Section Starte Here ========-->
<section class="user-panel-section padding-bottom padding-top">
  <div class="container user-panel-container">
    <div class=" user-panel-tab">
      <div class="row">
        @include($activeTemplate.'partials.sidebar')

        <div class="col-lg-9">
          <div class="user-panel-header mb-60-80">
            <div class="left d-sm-block d-none">
              <h6 class="title">{{__($page_title)}}</h6>
            </div>
            <ul class="right">

              <li>
                <a href="#0" class="log-out d-lg-none">

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>

                    <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                  </button>
                </a>
              </li>
            </ul>
          </div>
          
          <div class="tab-area fullscreen-width">
            <div class="tab-item active">


              <div class="row mb-60-80">
                <div class="col-md-12 mb-30">
                  <div class="table-responsive table-responsive--md">
                   <table class="table table-striped">
                    <thead class="thead-dark">
                     <tr>
                      <th scope="col">@lang('ID')</th>
                      <th scope="col">@lang('Plan Name')</th>
                      <th scope="col">@lang('Plan Amount')</th>
                      <th scope="col">@lang('Interest Amount')</th>
                      <th scope="col">@lang('Total Amount you get')</th>
                      <th scope="col">@lang('Date')</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if(count($invest_plan) >0)
                   @foreach($invest_plan as $k=>$data)
                   <tr> 
                    <td>{{$data->id}}</td>
                    <td>{{$data->plan_name}}</td>
                    <td>{{$data->amount}}</td>
                    <td>{{$data->interest}}</td>
                    <td>{{$data->total_amount}}</td>
                    <td>{{$data->created_at}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="6"> @lang('No results found')!</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    
  </div>
</div>
</div>
</div>
</section>
<!-- ========User-Panel-Section Ends Here ========-->


@endsection





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

          <!-- What is-->
          <div id="what-is" class="card">
            <div class="card-header">
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
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
                          <td>{{number_format($data->amount,2)}}</td>
                          <td>{{number_format($data->interest,2)}}</td>
                          <td>{{number_format($data->total_amount,2)}}</td>
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
          <!--/ What is-->

          <!-- Kick start -->

         

          <!-- Simple Card-->
        </div>
      </section>

    </div>
  </div>
</div>
@endsection
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

            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row">
                    <div class="table-responsive table-responsive--md">
                      <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">@lang('Transaction ID')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Remaining Balance')</th>
                            <th scope="col">@lang('Details')</th>
                            <th scope="col">@lang('Date')</th>

                          </tr>
                        </thead>
                        <tbody>
                          @if(count($logs) >0)
                          @foreach($logs as $k=>$data)
                          <tr>
                            <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                            <td data-label="@lang('Amount')">
                              <strong @if($data->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($data->trx_type == '+') ? '+':'-'}} {{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                            </td>
                            <td data-label="@lang('Remaining Balance')">
                              <strong class="text-info">{{formatter_money($data->post_balance)}} {{$general->cur_text}}</strong>
                            </td>
                            <td data-label="@lang('Details')">{{$data->details}}</td>
                            <td data-label="@lang('Date')">{{date('d M, Y', strtotime($data->created_at))}}</td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="5"> @lang('No results found')!</td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>

                    {{$logs->links()}}
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

@section('script')

@endsection

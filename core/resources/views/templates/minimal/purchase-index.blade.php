@extends('templates.minimal.layouts.user')
@section('content')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                <a href="{{ route('home.purchase') }}" class="btn btn-dark">Add Purchase</a>
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
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Amount')</th>

                            <th scope="col">@lang('Date')</th>
                            {{--  <th scope="col">@lang('Actions')</th>  --}}

                          </tr>
                        </thead>
                        <tbody>
                         @if(count($pur) >0)
                         @foreach($pur as $k=>$data)
                         <tr>
                          <td>{{$data->id}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{number_format($data->amount,2)}}</td>
                          <td>{{ Carbon\Carbon::parse($data->created_at)->format('d F, y') }}</td>

                        {{--  <td>
                            <a href="{{ url('/purchase/edit', $data->id) }}" class="label label-primary"><i class="fas fa-edit"></i></a>
                        </td>  --}}

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

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
                          <th scope="col">@lang('Gateway')</th>
                          <th scope="col">@lang('Amount')</th>
                          <th scope="col">@lang('Charge')</th>
                          <th scope="col">@lang('After Charge')</th>
                          <th scope="col">@lang('Rate')</th>
                          <th scope="col">@lang('Receivable')</th>
                          <th scope="col">@lang('Status')</th>
                          <th scope="col">@lang('Time')</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($withdraws as $k=>$data)
                        <tr>
                          <td data-label="#@lang('Transaction ID')">{{$data->trx}}</td>
                          <td data-label="@lang('Gateway')">{{ $data->method->name   }}</td>
                          <td data-label="@lang('Amount')">
                            <strong>{{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                          </td>
                          <td data-label="@lang('Charge')" class="text-danger">
                            {{formatter_money($data->charge)}} {{$general->cur_text}}
                          </td>
                          <td data-label="@lang('After Charge')">
                            {{formatter_money($data->after_charge)}} {{$general->cur_text}}
                          </td>
                          <td data-label="@lang('Rate')">
                            {{$data->rate +0}}
                          </td>
                          <td data-label="@lang('Receivable')" class="text-success">
                            <strong>{{formatter_money($data->final_amount)}} {{$data->currency}}</strong>
                          </td>
                          <td data-label="@lang('Status')">
                            @if($data->status == 2)
                            <span class="badge badge-warning">@lang('Pending')</span>
                            @elseif($data->status == 1)
                            <span class="badge badge-success">@lang('Completed')</span>
                            <span type="button" class="btn-info btn-rounded py-1 px-1 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="ft-info"></i></span>
                            @elseif($data->status == 3)
                            <span class="badge badge-danger">@lang('Rejected')</span>
                            <span type="button" class="btn-info btn-rounded py-1 px-1 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="ft-info"></i></span>
                            @endif

                          </td>
                          <td data-label="@lang('Time')">
                            <i class="fa fa-calendar"></i> {{date('d M, Y ', strtotime($data->created_at))}}
                            <span class="pl-1"></span> {{date('h:i A', strtotime($data->created_at))}}
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>

                    {{$withdraws->links()}}
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

<!-- Modal -->
<div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('Details')</h5>
        <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="withdraw-detail"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $('.approveBtn').on('click', function() {
    var modal = $('#approveModal');

    var feedback = $(this).data('admin_feedback');

    modal.find('.withdraw-detail').html(`<p class="text-dark"> ${feedback} </p>`);
    modal.modal('show');
  });

</script>
@endsection
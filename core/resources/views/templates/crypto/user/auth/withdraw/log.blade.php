@extends('templates.crypto.layouts.user')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>{{__($page_title)}}</h3>
          </div>
          {{--  <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-huis"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
              <li class="breadcrumb-item">Bootstrap Tables</li>
              <li class="breadcrumb-item active">Bootstrap Styling Tables</li>
            </ol>
          </div>  --}}
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-block row">
              <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table-primary">
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
                            <span class="badge badge-light-warning">@lang('Pending')</span>
                            @elseif($data->status == 1)
                            <span class="badge badge-light-success">@lang('Completed')</span>

                            <span type="button" class="btn-info btn-rounded py-1 px-1 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info-circle"></i></span>
                            @elseif($data->status == 3)
                            <span class="badge badge-light-danger">@lang('Rejected')</span>
                            <span type="button" class="btn-info btn-rounded py-1 px-1 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info-circle"></i></span>
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
                {{--  <div class="p-3 text-end">
                    {{$withdraws->links()}}
                </div>  --}}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

<!-- Modal -->
<div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('Details')</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
      </div>
      <div class="modal-body">

        <div class="withdraw-detail"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('.approveBtn').on('click', function() {
    var modal = $('#approveModal');

    var feedback = $(this).data('admin_feedback');

    modal.find('.withdraw-detail').html(`<p class="text-dark"> ${feedback} </p>`);
    modal.modal('show');
  });

</script>
@endsection

@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                            <tr>
                                <th scope="col">Datum</th>
                                {{--  <th scope="col">Trx Number</th>  --}}
                                <th scope="col">Gebruikersnaam</th>
                                {{--  <th scope="col">Method</th>  --}}
                                <th scope="col">Hoeveelheid</th>
                                {{--  <th scope="col">Bedrag</th>  --}}
                                {{--  <th scope="col">After Charge</th>  --}}
                                {{--  <th scope="col">Rate</th>  --}}
                                {{--  <th scope="col">Payable</th>  --}}
                                @if(request()->routeIs('admin.deposit.pending') )
                                    <th scope="col">Actie</th>

                                @elseif(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.search') || request()->routeIs('admin.users.deposits'))
                                    <th scope="col">Toestand</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse( $deposits as $deposit )
                                @if(!$deposit->gateway) @endif
                                <tr>
                                    <td>{{ show_datetime($deposit->created_at) }}</td>
                                    {{--  <td class="font-weight-bold text-uppercase">{{ $deposit->trx }}</td>  --}}
                                    <td><a href="{{ route('admin.users.detail', $deposit->user->id) }}">{{ $deposit->user->username }}</a></td>
                                    {{--  <td>{{ $deposit->gateway->name }}</td>  --}}
                                    <td class="font-weight-bold">{{ $deposit->amount +0 }} {{ $general->cur_text }}</td>
                                    {{--  <td class="text-success">{{ $deposit->charge +0 }} {{ $general->cur_text }}</td>  --}}
                                    {{--  <td> {{ $deposit->amount+$deposit->charge }}</td>  --}}
                                    {{--  <td> {{ $deposit->rate +0 }}</td>  --}}
                                    {{--  <td class="font-weight-bold">{{ formatter_money($deposit->final_amo) }} {{$deposit->method_currency}}</td>  --}}
                                    @if(request()->routeIs('admin.deposit.pending'))

                                    @php
                                        $details = ($deposit->detail != null) ? $deposit->detail : '';
                                        $proveImg = "<img src='".get_image(config('constants.deposit.verify.path').'/'.$deposit->verify_image)."' alt=''>";
                                    @endphp

                                    <td>
                                        <button class="btn btn-success approveBtn"  data-prove_img="@php echo $proveImg @endphp"
                                        {{$deposit->bank_name ? 'data-bank_name='.$deposit->bank_name : ''}}
                                        {{$deposit->check_no ? 'data-check_no='.$deposit->check_no : ''}}
                                        {{$deposit->account_number ? 'data-account_number='.$deposit->account_number : ''}}
                                        {{$deposit->bank_address ? 'data-bank_address='.$deposit->bank_address : ''}}
                                        {{$deposit->routing ? 'data-routing='.$deposit->routing : ''}}
                                        {{$deposit->customer_full_name ? 'data-customer_full_name='.$deposit->customer_full_name : ''}}
                                        {{$deposit->customer_address ? 'data-customer_address='.$deposit->customer_address : ''}}
                                        data-id="{{ $deposit->id }}" data-amount="{{ formatter_money($deposit->amount)}} {{ $general->cur_text }}" data-username="{{ $deposit->user->username }}"><i class="fa fa-fw fa-check"></i></button>
                                        <button class="btn btn-danger rejectBtn" data-prove_img="@php echo $proveImg @endphp"
                                        {{$deposit->bank_name ? 'data-bank_name='.$deposit->bank_name : ''}}
                                        {{$deposit->check_no ? 'data-check_no='.$deposit->check_no : ''}}
                                        {{$deposit->account_number ? 'data-account_number='.$deposit->account_number : ''}}
                                        {{$deposit->bank_address ? 'data-bank_address='.$deposit->bank_address : ''}}
                                        {{$deposit->routing ? 'data-routing='.$deposit->routing : ''}}
                                        {{$deposit->customer_full_name ? 'data-customer_full_name='.$deposit->customer_full_name : ''}}
                                        {{$deposit->customer_address ? 'data-customer_address='.$deposit->customer_address : ''}}
                                        data-detail="{{$deposit}}" data-id="{{ $deposit->id }}" data-amount="{{ formatter_money($deposit->amount)}} {{ $general->cur_text  }}" data-username="{{ $deposit->user->username }}"><i class="fa fa-fw fa-ban"></i></button>
                                    </td>
                                    @elseif(request()->routeIs('admin.deposit.list')  || request()->routeIs('admin.deposit.search') || request()->routeIs('admin.users.deposits'))
                                        <td>
                                            @if($deposit->status == 2)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($deposit->status == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($deposit->status == 3)
                                                <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        {{ $deposits->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>


{{-- APPROVE MODAL --}}
<div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aanbetalingsbevestiging goedkeuren</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.deposit.approve') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">

                    <p>Weet je het zeker <span class="font-weight-bold">goedkeuren</span> <span class="font-weight-bold withdraw-amount text-success"></span> aanbetaling van <span class="font-weight-bold withdraw-user"></span>?</p>
                    <p class="withdraw-detail">
                    </p>

                    <span class="withdraw-proveImg"></span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Dichtbij</button>
                    <button type="submit" class="btn btn-success">goedkeuren</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- REJECT MODAL --}}
<div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aanbetalingsbevestiging afwijzen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.deposit.reject') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">

                    <p>Weet je het zeker <span class="font-weight-bold">Afwijzen</span> <span class="font-weight-bold withdraw-amount text-success"></span> aanbetaling van <span class="font-weight-bold withdraw-user"></span>?</p>

                    <p class="withdraw-detail"></p>
                    <span class="withdraw-proveImg"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Dichtbij</button>
                    <button type="submit" class="btn btn-danger">Afwijzen</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('.approveBtn').on('click', function() {
        var modal = $('#approveModal');
        modal.find('input[name=id]').val($(this).data('id'));

        modal.find('.withdraw-amount').text($(this).data('amount'));
        modal.find('.withdraw-user').text($(this).data('username'));

        modal.find('.withdraw-proveImg').html($(this).data('prove_img'));

        // var details =  Object.entries($(this).data('detail'));
        var list = '';
        if($(this).data('bank_name'))
            list += `<li class="list-group-item">Bank Name: `+$(this).data('bank_name')+`</li>`;
        if($(this).data('check_no'))
            list += `<li class="list-group-item">Check Number: `+$(this).data('check_no')+`</li>`;
        if($(this).data('account_number'))
            list += `<li class="list-group-item">Account Number: `+$(this).data('account_number')+`</li>`;
        if($(this).data('bank_address'))
            list += `<li class="list-group-item">Bank Address: `+$(this).data('bank_address')+`</li>`;
        if($(this).data('routing'))
            list += `<li class="list-group-item">Routing: `+$(this).data('routing')+`</li>`;
        if($(this).data('customer_full_name'))
            list += `<li class="list-group-item">Customer Name: `+$(this).data('customer_full_name')+`</li>`;
        if($(this).data('customer_address'))
            list += `<li class="list-group-item">Customer Address: `+$(this).data('customer_address')+`</li>`;
        // details.map( function(item,i) {
        //     list[i] = ` <li class="list-group-item">${item[0]} : ${item[1]}</li>`
        // });
        modal.find('.withdraw-detail').html(list);
        modal.modal('show');
    });

    $('.rejectBtn').on('click', function() {
        var modal = $('#rejectModal');
        modal.find('input[name=id]').val($(this).data('id'));
        modal.find('.withdraw-amount').text($(this).data('amount'));

        modal.find('.withdraw-user').text($(this).data('username'));

        modal.find('.withdraw-proveImg').html($(this).data('prove_img'));

        var list = '';
        if($(this).data('bank_name'))
            list += `<li class="list-group-item">Bank Name: `+$(this).data('bank_name')+`</li>`;
        if($(this).data('check_no'))
            list += `<li class="list-group-item">Check Number: `+$(this).data('check_no')+`</li>`;
        if($(this).data('account_number'))
            list += `<li class="list-group-item">Account Number: `+$(this).data('account_number')+`</li>`;
        if($(this).data('bank_address'))
            list += `<li class="list-group-item">Bank Address: `+$(this).data('bank_address')+`</li>`;
        if($(this).data('routing'))
            list += `<li class="list-group-item">Routing: `+$(this).data('routing')+`</li>`;
        if($(this).data('customer_full_name'))
            list += `<li class="list-group-item">Customer Name: `+$(this).data('customer_full_name')+`</li>`;
        if($(this).data('customer_address'))
            list += `<li class="list-group-item">Customer Address: `+$(this).data('customer_address')+`</li>`;

        // var details =  Object.entries($(this).data('detail'));
        // // var list = [];
        // // details.map( function(item,i) {
        // //     list[i] = ` <li class="list-group-item">${item[0]} : ${item[1]}</li>`
        // // });
        modal.find('.withdraw-detail').html(list);
        modal.modal('show');
    });
</script>
@endpush

@push('breadcrumb-plugins')
@if(request()->routeIs('admin.users.deposits'))
<form action="" method="GET" class="form-inline">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="Deposit code" value="{{ $search ?? '' }}">
        <div class="input-group-append">
        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@else
<form action="{{ route('admin.deposit.search', $scope ?? str_replace('admin.deposit.', '', request()->route()->getName())) }}" method="GET" class="form-inline">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="Stortingscode/gebruikersnaam" value="{{ $search ?? '' }}">
        <div class="input-group-append">
        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endif
@endpush

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
                            <th scope="col">TRX</th>
                            <th scope="col">Gebruikersnaam</th>
                            <th scope="col">Hoeveelheid</th>
                            {{--  <th scope="col">Charge</th>
                            <th scope="col">Post Balance</th>  --}}
                            {{--  <th scope="col">Detail</th>  --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                        <tr>
                            <td>{{ show_datetime($trx->created_at) }}</td>
                            <td class="font-weight-bold">{{ strtoupper($trx->trx) }}</td>
                            <td><a href="{{ route('admin.users.detail', $trx->user->id) }}">{{ $trx->user->username }}</a></td>

                            <td class="budget">
                                <strong @if($trx->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($trx->trx_type == '+') ? '+':'-'}} {{formatter_money($trx->amount)}} {{$general->cur_text}}</strong>
                            </td>
                            {{--  <td class="budget">{{ $general->cur_sym }} {{ formatter_money($trx->charge) }}</td>
                            <td>{{ $trx->post_balance +0 }}</td>  --}}
                            {{--  <td>{{ $trx->details }}</td>  --}}
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
                    {{ $transactions->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
@if(request()->routeIs('admin.users.transactions'))
<form action="" method="GET" class="form-inline">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="TRX" value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@else
<form action="{{ route('admin.report.transaction.search') }}" method="GET" class="form-inline">
    <div class="input-group has_append">
        <input type="text" name="search" class="form-control" placeholder="TRX / Username" value="{{ $search ?? '' }}">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
@endif
@endpush

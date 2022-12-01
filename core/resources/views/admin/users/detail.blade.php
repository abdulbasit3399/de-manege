@extends('admin.layouts.app')

@section('panel')
<div class="row">
  <div class="col-lg-3">
    <div class="card">
      <div class="card-body text-center border-bottom">
        <img src="{{ get_image(config('constants.user.profile.path') .'/'. $user->image) }}" alt="profile-image" class="user-image">
        <h5 class="card-title mt-3">{{ $user->name }}</h5>
      </div>
      <div class="card-body">
        <p class="clearfix">
          <span class="float-left">Gebruikersnaam</span>
          <span class="float-right font-weight-bold"><a href="{{ route('admin.users.detail', $user->id) }}">{{ $user->username }}</a></span>
        </p>
        <p class="clearfix">
          <span class="float-left">E-mail</span>
          <span class="float-right text-muted">{{ $user->email }}</span>
        </p>
        {{--  <p class="clearfix">
          <span class="float-left">Phone</span>
          <span class="float-right text-muted">{{ $user->mobile ?: 'Not available'}}</span>
        </p>  --}}

        @foreach($user->wallets as $wallet)
        <p class="clearfix">
          <span class="float-left">{{str_replace('_',' ',strtoupper($wallet->wallet_type))}}</span>
          <span class="float-right text-muted">{{ $general->cur_sym }}{{ formatter_money($wallet->balance) }}</span>
        </p>
        @endforeach

        {{--  <p class="clearfix">
          <span class="float-left">Status</span>
          <span class="float-right text-muted">
            @switch($user->status)
            @case(1)
            <span class="badge badge-pill badge-success">Active</span>
            @break
            @case(0)
            <span class="badge badge-pill badge-danger">Banned</span>
            @break
            @endswitch
          </span>
        </p>  --}}
      </div>
    </div>

    {{--  <div class="card">
      <div class="card-body text-center border-bottom">
        <h5 class="card-title mt-3">ACH TRANSFER Details</h5>
      </div>
      <div class="card-body">
       <p class="clearfix">
        <span class="float-left">Account Number : </span>
        <span class="float-right text-muted">{{ isset($deposit->account_number) ? ($deposit->account_number) :'' }}</span>
      </p>
      <p class="clearfix">
        <span class="float-left">Bank Address :</span>
        <span class="float-right text-muted">{{ isset($deposit->bank_address) ? ($deposit->bank_address) :''  }}</span>
      </p>
      <p class="clearfix">
        <span class="float-left">Bank Name :</span>
        <span class="float-right text-muted">{{ isset($deposit->bank_name) ? ($deposit->bank_name) :''}}</span>
      </p>

      <p class="clearfix">
        <span class="float-left">Routing :</span>
        <span class="float-right text-muted">{{ isset($deposit->routing) ? ($deposit->routing) : ''}} </span>
      </p>

      <p class="clearfix">
        <span class="float-left">Customer Full Name : </span>
        <span class="float-right text-muted">{{ isset($deposit->customer_full_name) ? ($deposit->customer_full_name) : ''  }} </span>
      </p>
      <p class="clearfix">
        <span class="float-left">Customer Full Address :</span>
        <span class="float-right text-muted">{{ isset($deposit->customer_full_address) ? ($deposit->customer_full_address) : ''  }} </span>
      </p>
      <p class="clearfix">
        <span class="float-left">Amount :</span>
        <span class="float-right text-muted">{{ isset($deposit->amount) ? ($deposit->amount) : ''}} </span>
      </p>
      <p class="clearfix">
        <span class="float-left">Status</span>
        <span class="float-right text-muted">
          @switch(@$deposit->status)
          @case(2)
          <span class="badge badge-pill badge-danger">pending</span>
          @break
          @case(1)
          <span class="badge badge-pill badge-success">success</span>
          @break
          @case(3)
          <span class="badge badge-pill badge-danger">cancel</span>
          @break
          @endswitch
        </span>
      </p>

    </div>
    </div>  --}}

</div>
<div class="col-lg-9">
  <div class="card">

    <div class="row p-4">
     <div class="col-lg-3">
      <div class="card outline-warning">
        <div class="card-body">
          <div class="media align-items-center">
            <div class="media-body text-left">
              <h4 class="mb-0 text-warning">{{ $transactions }}</h4>
              <span class="text-warning">Totaal Transacties</span>
            </div>
            <div class="align-self-center icon-lg">
              <i class="fa fa-exchange text-warning"></i>
            </div>
          </div>
        </div>
        <a href="{{ route('admin.users.transactions', $user->id) }}" class="text-white text-center">
          <div class="card-footer btn-block btn btn-warning">Bekijk alles</div>
        </a>
      </div>
    </div>
    {{--  <div class="col-lg-3">
      <div class="card outline-orange">
        <div class="card-body">
          <div class="media align-items-center">
            <div class="media-body text-left">
              <h4 class="mb-0 text-orange">{{ $general->cur_sym}} {{ formatter_money($withdrawals) }}</h4>
              <span class="text-orange">Total Withdrawals</span>
            </div>
            <div class="align-self-center icon-lg">
              <i class="fa fa-money text-orange"></i>
            </div>
          </div>
        </div>
        <a href="{{ route('admin.users.withdrawals', $user->id) }}" class="text-white text-center">
          <div class="card-footer btn btn-block bg-orange">View All</div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card outline-success">
        <div class="card-body">
          <div class="media align-items-center">
            <div class="media-body text-left">
              <h4 class="mb-0 text-success">{{ $general->cur_sym}} {{ formatter_money($deposits) }}</h4>
              <span class="text-success">Total Deposits</span>
            </div>
            <div class="align-self-center icon-lg">
              <i class="fa fa-money text-success"></i>
            </div>
          </div>
        </div>
        <a href="{{ route('admin.users.deposits', $user->id) }}" class="text-white text-center">
          <div class="card-footer btn btn-block btn-success">View All</div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card outline-primary">
        <div class="card-body">
          <div class="media align-items-center">
            <div class="media-body text-left">
              <h4 class="mb-0 text-primary">{{ $general->cur_sym }} {{ formatter_money($invests) }}</h4>
              <span class="text-primary">Total Investment</span>
            </div>
            <div class="align-self-center icon-lg">
              <i class="fa fa-money text-primary"></i>
            </div>
          </div>
        </div>
        <a href="{{ route('admin.users.invests', $user->id) }}" class="text-white text-center">
          <div class="card-footer btn btn-block btn-primary">View All</div>
        </a>
      </div>
    </div>  --}}

    <div class="col-lg-3">
      <a class="text-white text-center btn-block" data-toggle="modal" href="#addSubModal">
        <div class="card outline-primary">
          <div class="card-body bg-primary">Add/Subtract Balance</div>
        </div>
      </a>
    </div>
    {{--  <div class="col-lg-3">
      <a href="{{ route('admin.users.login.history.single', $user->id) }}" class="text-white text-center btn-block">
        <div class="card outline-success bg-success">
          <div class="card-body">Login Logs</div>
        </div>
      </a>
    </div>
    <div class="col-lg-3">
      <a href="{{ route('admin.users.email.single', $user->id) }}" class="text-white text-center btn-block">
        <div class="card outline-orange bg-orange">
          <div class="card-body">Send Email</div>
        </div>
      </a>
    </div>
    <div class="col-lg-3">
      <a href="{{ route('admin.users.referral', $user->id) }}" class="text-white text-center btn-block">
        <div class="card outline-warning bg-warning">
          <div class="card-body">Referral Users</div>
        </div>
      </a>
    </div>  --}}
  </div>

  <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Voornaam <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="firstname" value="{{ $user->firstname }}" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Achernaam <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}" required>
          </div>
        </div>

      </div>
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input class="form-control" type="email" name="email" value="{{ $user->email }}" required>
          </div>
        </div>
        {{--  <div class="col-md-6">
          <div class="form-group">
            <label>Phone </label>
            <input class="form-control" type="text" name="mobile" value="{{ $user->mobile }}">
          </div>
        </div>  --}}
      </div>
      {{--  <div class="form-row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Level of familiarity with investing</label><br/>
            <span>{{ @ucfirst($user->investment_experience) }}</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Investing advice</label><br/>
            <span>{{ @ucfirst($user->wisdom_source) }}</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Plan to hold Reelshares investment</label><br/>
            <span>{{ @ucfirst($user->investment_duration) }}</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Plan to invest on a yearly basis</label><br/>
            <span>{{ @ucfirst($user->investment_planning) }}</span>
          </div>
        </div>
      </div>

      <div class="form-group">

        <label>Address</label>
        <br>
        <small>Street</small>
        <input class="form-control" type="text" value="{{ @$user->address->address }}" name="address" placeholder="Street">
      </div>

      <div class="form-row">
        <div class="form-group col-lg-3">
          <small>City</small>
          <input class="form-control" type="text" value="{{ @$user->address->city }}" name="city" placeholder="City">
        </div>
        <div class="form-group col-lg-3">
          <small>State</small>
          <input class="form-control" type="text" value="{{ @$user->address->state }}" name="state" placeholder="State">
        </div>
        <div class="form-group col-lg-3">
          <small>Zip/Postal</small>
          <input class="form-control" type="text" value="{{ @$user->address->zip }}" name="zip" placeholder="Zip/Postal">
        </div>
        <div class="form-group col-lg-3">
          @php
            $country = \App\Country::select('country_code','country_name')->get();
          @endphp
          <small>Country</small>
          <select name="country" class="form-control">
            @foreach($country as $c)
            <option value="{{$c['country_code']}}"> {{$c['country_name']}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-lg-4">
          <p class="text-muted">Status</p>
          <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-onstyle="success"    data-offstyle="danger" data-on="Active" data-off="Banned"  data-width="100%" name="status" @if($user->status) checked @endif>
        </div>

        <div class="form-group col-lg-4">
          <p class="text-muted">Email Verification</p>
          <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Verified" data-off="Unverified" name="ev" @if($user->ev) checked @endif>
        </div>

        <div class="form-group col-lg-4">
          <p class="text-muted">SMS Verification</p>
          <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Verified" data-off="Unverified" name="sv" @if($user->sv) checked @endif>
        </div>

        <div class="form-group col-lg-6">
          <p class="text-muted">2FA Status</p>
          <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="On" data-off="Off" name="ts" @if($user->ts) checked @endif>
        </div>

        <div class="form-group col-lg-6">
          <p class="text-muted">2FA Verification</p>
          <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Verified" data-off="Unverified" name="tv" @if($user->tv) checked @endif>
        </div>
      </div>  --}}
    </div>
    <div class="card-footer">
      <div class="form-group row">
        <div class="col-lg-12 text-center">
          <input type="submit" class="btn btn-block btn-primary mt-2" value="Wijzigingen opslaan">
        </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>

{{-- Add Sub Balance MODAL --}}
<div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Saldo optellen/aftrekken</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.users.addSubBalance', $user->id) }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="checkbox" data-width="100%" data-height="44px" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Saldo toevoegen" data-off="Saldo aftrekken" name="act" checked>
            </div>

            <div class="form-group col-md-12">
              <label>Selecteer Portemonnee<span class="text-danger">*</span></label>
              <select name="wallet_id" class="form-control" required>
                @foreach($user->wallets as $wallet)
                <option value="{{$wallet->id}}">{{str_replace('_',' ',strtoupper($wallet->wallet_type))}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-12">
              <label>Hoeveelheid<span class="text-danger">*</span></label>
              <div class="input-group has_append">
                <input type="text" name="amount" class="form-control" placeholder="Gelieve een positief bedrag op te geven">
                <div class="input-group-append"><div class="input-group-text">{{ $general->cur_sym }}</div></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">dichtbij</button>
          <button type="submit" class="btn btn-success">Versturen</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Send Email MODAL --}}
<div id="sendEmailModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.users.email.single', $user->id) }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Subject<span class="text-danger">*</span></label>
              <input type="text" name="subject" class="form-control" placeholder="Email Subject">
            </div>
            <div class="form-group col-md-12">
              <label>Message<span class="text-danger">*</span></label>
              <textarea rows="5" name="message" class="form-control nicEdit" placeholder="Your Message"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('style')
<style>
  .user-image {
    width: 200px;
    height: 200px;
  }
  .text-primary {
    color: #5e72e4 !important;
  }
  .text-primary {
    color: #5e72e4 !important;
  }
</style>
@endpush

@push('script')
<script>
  $(document).ready(function(){
    console.log('{{ @$user->address->country }}');
    $("select[name=country]").val("{{ @$user->address->country }}");
  });

</script>
@endpush

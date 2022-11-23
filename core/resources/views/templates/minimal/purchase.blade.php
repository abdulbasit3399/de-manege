@extends('templates.minimal.layouts.user')

@section('style')
<style>

// .ticket-item {
//     border-radius: 0;
// }

.log-out .navbar-toggler-icon {
    display: unset;
    vertical-align: unset;
}

.ticket-item {
    border-radius: 0 ;
    padding: 0;
}

.ticket-item .bottom {
    padding: 20px 15px;
}

.imagepreview {
    width: 100% !important;
    display: block;
    margin-bottom: 0 !important;
    max-height: 270px;
    height: 270px !important;
    object-fit: cover;
}

.ticket-item .bottom p, section.ticket-section .ticket-item .bottom h6 {
    color: #2A2B30;
}

.ticket-item .bottom .total .row.flex-row div {
    color: #2A2B30;
}
.bg-1, .bg-2, .bg-3, .bg-4, .bg-5, .bg-6, .bg-7, .bg-8 {
    background-image: unset !important;
    box-shadow: 0 1px 2px 0 rgb(42 43 48 / 15%);
}

 .ticket-item .bottom h6 {
    color: #2A2B30;
}
.bottom .info .badge {
    margin-bottom: 15px;
}

.ticket-item .bottom .total .row.flex-row .value {
    font-weight: 500;
}

.ticket-item .bottom .total .row.flex-row div {
    color: #2A2B30;
    text-align: left;
}

.ticket-item .bottom .total .flex-row .attribute {
    margin-top: 15px;
    color: #515151 !important;
    font-weight: 300;
}

.bottom .info {
    margin-bottom: 15px;
    border-bottom: 1px solid #BDC3C6;
    padding-bottom: 16px;
}

.ticket-item .bottom h6 {
    margin-bottom: 15px;
}

.ticket-item .custom-button {
    color: #FFFFFF !important;
    background: #F78F56;
    margin-top: 15px;
}

@media only screen and (max-width: 767px) {
  .ticket-item .bottom .total .flex-row .col-md-6 {
    width: 50%;
}
}


.owl-prev, .owl-next{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    display:flex;
    align-items:center;
    justify-content:center;
    -webkit-transform: rotateY(0deg) !important;
    -ms-transform: rotateY(0deg) !important;
    transform: rotateY(0deg) !important;
}


.owl-prev{
    left:10px;
    right:auto;
    width:20px;
    height:20px;
    font-size:0px;
    background:#000;
    border-radius:50%;
}

.owl-next{
    left:auto;
    right:10px;
    width:20px;
    height:20px;
    font-size:0px;
    background:#000;
    border-radius:50%;
}

.owl-nav{
    position:initial !important;
}

.owl-next::before, .owl-prev::before{
        display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 16px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color:#fff;
    line-height:normal;

}

.owl-prev::before{
    content: "\f104";
}

.owl-next::before{
    content: "\f105";
}

@media (max-width: 575px){
.owl-nav {
    display: block;
}
}

</style>
@endsection

@auth

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
      <div class="row">
        <div class="col-md-12">
          <div id="what-is" class="card" style="height: 100%">

            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row justify-content-center mb-30-none">

                    <form action="{{route('user.purchases')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="mt-2">
                        <strong>@lang('Name')</strong>
                        <input type="text" class="form-control " id="" name="name" value="{{old('name')}}">
                        </div>

                        <div class="mt-2">
                        <strong>@lang('Invest Amount')</strong>
                        <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount" value="{{old('amount')}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Purchase</button>
                    </form>

                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@endauth


@section('script')
<script>
  $(document).ready(function () {
    $('.investButton').on('click', function () {
      var data = $(this).data('resource');
      var symbol = "{{__($general->cur_sym)}}";
      var currency = "{{__($general->cur_text)}}";
      var share_price = $(this).data('price');
      $('#share_price').val(share_price);

      if(data.fixed_amount == '0'){
        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
        $('.fixedAmount').val('');
        $('#fixedAmount').attr('readonly', false);

      }else{
        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.fixed_amount}`);
        $('.fixedAmount').val(data.fixed_amount);

        $('#fixedAmount').attr('readonly', true);
      }

      if(data.interest_status == '1'){
        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} % </strong>`);
      }else{
        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} ${currency}  </strong>`);
      }
      if(data.lifetime_status == '0'){
        $('.interestValidaty').html(`<strong> ${data.repeat_time} @lang('Year') ,  ${data.repeat_time} @lang('Times')</strong>`);
      }else{
        $('.interestValidaty').html(`<strong> ${data.repeat_time} @lang('Year'),  @lang('Lifetime') </strong>`);
      }

      $('.planName').text(data.name);
      $('.plan_id').val(data.id);
    });
    $('#fixedAmount').keyup(function(){
      var total_shares = $(this).val() / $('#share_price').val();
      $('#totalShares').val(total_shares);
    });
  });

</script>

@endsection

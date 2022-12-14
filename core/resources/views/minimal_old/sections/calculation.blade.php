@php
    $calculationCaption = getContent('calculation.content',true);
@endphp
@if($calculationCaption)
    @php
        $planList = \App\Plan::where('status', 1)->latest()->get();
    @endphp

    <!-- ========Profit-Section Stars Here ========-->
    <section class="profit-calc padding-top padding-bottom light-color bg_img"
             data-background="{{asset($activeTemplateTrue.'images/profit_cal.png')}}">
        <div class="shape"></div>
        <div class="circle-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/08.png')}}" alt="shape">
        </div>
        <div class="circle-2 five" data-paroller-factor="-0.10" data-paroller-factor-lg="0.30"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset($activeTemplateTrue.'images/animation/05.png')}}" alt="shape">
        </div>
        <div class="elepsis">
            <img src="{{asset($activeTemplateTrue.'images/footer/elepsis.png')}}" alt="profit">
        </div>
        <div class="man-coin">
            <img src="{{asset($activeTemplateTrue.'images/footer/man-coin.png')}}" alt="profit">
        </div>
        <div class="coin-only">
            <img src="{{asset($activeTemplateTrue.'images/footer/profit-coin.png')}}" alt="profit">
        </div>
        <div class="man-only">
            <img src="{{asset($activeTemplateTrue.'images/footer/profit-man.png')}}" alt="profit">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="title">{{__(@$calculationCaption->data_values->heading)}}</h2>
                        <p>{{@$calculationCaption->data_values->sub_heading}}</p>
                    </div>
                </div>
            </div>
            <form class="profit-form row justify-content-center">
                <div class="form-group col-sm-6 col-md-4 col-lg-3">
                    <h6 class="profil-title">@lang('Plan')</h6>
                    <select class="select-bar" id="changePlan">
                        <option value="">@lang('Choose Plan')</option>
                        @foreach($planList as $k => $data)
                        <option value="{{$data->id}}" >{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6 col-md-4 col-lg-3">
                    <h6 class="profil-title">@lang('Invest Amount')</h6>
                    <input type="text" placeholder="0.00" class="invest-input"
                           onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                </div>
                <div class="form-group col-sm-6 col-md-4 col-lg-3">
                    <h6 class="profil-title">@lang('Profit')</h6>
                    <input type="text" placeholder="0.00" class="profit-input" readonly>
                    <code class="period"></code>
                </div>
            </form>
        </div>
    </section>
    <!-- ========Profit-Section Ends Here ========-->

@endif




@push('script')
<script>

    (function ($) {
        "use strict";
        $(document).ready(function () {
            $("#changePlan").on('change', function () {
                var planId = $("#changePlan option:selected").val();
                var investInput = $('.invest-input').val();
                var profitInput = $('.profit-input').val('');

                $('.period').text('');

                if (investInput != '' && planId != null) {
                    ajaxPlanCalc(planId, investInput)
                }
            });

            $(".invest-input").on('change', function () {
                var planId = $("#changePlan option:selected").val();
                var investInput = $(this).val();
                var profitInput = $('.profit-input').val('');
                $('.period').text('');
                if (investInput != '' && planId != null) {
                    ajaxPlanCalc(planId, investInput)
                }
            });
        });
    })(jQuery);

    function ajaxPlanCalc(planId, investInput) {
        $.ajax({
            url: "{{route('planCalculator')}}",
            type: "post",
            data: {
                planId,
                investInput
            },
            success: function (response) {

                var alertStatus = "{{$general->alert}}";
                if (response.errors) {
                    if (alertStatus == '1') {
                        iziToast.error({message: response.errors, position: "topRight"});
                    } else if (alertStatus == '2') {
                        toastr.error(response.errors);
                    }
                }

                $('.profit-input').val(response.interest_amount);
                $('.period').text(response.interestValidity);


            }
        });
    }
</script>
@endpush

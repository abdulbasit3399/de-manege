@php
    $callToActionCaption = getContent('call_to_action.content',true);
@endphp
@if($callToActionCaption)
    <div class="call-to-action-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="call-to-action-content">
                        <h2 class="title">{{__(@$callToActionCaption->data_values->heading)}}</h2>
                        <p>{{__(@$callToActionCaption->data_values->sub_heading)}}</p>
                        <div class="call-to-action-btn">
                            <a href="{{@$callToActionCaption->data_values->button_link}}" class="btn btn-danger">{{__(@$callToActionCaption->data_values->button_name)}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sec-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec"></div>
                </div>
            </div>
        </div>
    </div>
@endif

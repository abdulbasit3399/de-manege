@php
    $callToActionCaption = getContent('call_to_action.content',true);
@endphp
@if($callToActionCaption)
<section class="call-in-action bg-6 padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call-wrapper">
                    <div class="call-area">
                        <h3 class="title">{{__(@$callToActionCaption->data_values->heading)}}</h3>
                        <p>{{__(@$callToActionCaption->data_values->sub_heading)}}</p>
                        <a href="{{@$callToActionCaption->data_values->button_link}}" class="custom-button bg-3">{{__(@$callToActionCaption->data_values->button_name)}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

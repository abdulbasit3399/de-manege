@if(\App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first())
    <div class="form-group row">
        <div class="col-md-12">
            @php echo  getCustomCaptcha() @endphp
        </div>
        <div class="col-md-12 mt-4">
            <input type="text" name="captcha" placeholder=" Enter Code">
        </div>
    </div>
@endif

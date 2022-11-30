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

          <div id="what-is" class="card">
            <div class="card-header">

            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row justify-content-center">
                    <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                          <label for="CurrentPassword" class="col-form-label">@lang('Huidig wachtwoord:')</label>
                          <input type="password" class=" form-control  form-control-lg" id="CurrentPassword" name="current_password" placeholder="@lang('Huidig wachtwoord')">
                        </div>

                        <div class="form-group">
                          <label for="password" class="col-form-label">@lang('Nieuw wachtwoord:')</label>
                          <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="@lang('Nieuw wachtwoord')">
                        </div>
                        <div class="form-group ">
                          <label for="password_confirmation" class="col-form-label">@lang('Bevestig wachtwoord:')</label>
                          <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="@lang('Bevestig wachtwoord')">

                        </div>

                        <div class="form-group ">
                          <button type="submit" class="btn btn-primary custom-button bg-3 text-center mt-3">@lang('Wachtwoord veranderen')</button>

                        </div>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Simple Card-->
        </div>
      </section>

    </div>
  </div>
</div>


@endsection

@section('script')

@endsection

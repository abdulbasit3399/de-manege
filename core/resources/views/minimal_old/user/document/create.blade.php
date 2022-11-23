@extends($activeTemplate .'layouts.user')
@section('content')

    @include($activeTemplate.'partials.breadcrumb')

    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9" >
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">
                                <li>
                                    <a href="#0" class="log-out d-lg-none">

                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon" style="display: block; height: unset;"></span>

                                            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">


                       <form  action="{{route('document.create')}}" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                        <input type="hidden" name="id" value="{{ $general->id }}">
                         <div class="form-row">
                            <div class="form-group col-md-6">    
                              <strong>Document Type</strong>
                                <select name="type" class="form-control" required>
                                    <option value="">Select Document Type</option>
                                    <option value="0">Tax</option>
                                    <option value="1"> Account</option>
                                    <option value="2">Investment</option>
                                </select>
                            </div>
                        </div>
                            <div class="form-row">
                                 <div class="form-group col-md-6">
                                  <strong>Upload Document</strong>
                                    <div class="custom-file">
                                        <input type="file" required name="doc_file[]" class="custom-file-input" id="chooseFile" multiple>
                                        <label class="custom-file-label" for="chooseFile">Select file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <button type="submit" class="btn btn-primary btn-block">Save</button>

                        </div>
                    </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->


@endsection



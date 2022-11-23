@extends('admin.layouts.app')

@section('panel')
    <div class="card">
        <form action="" method="post">
            @csrf

            <div class="card-body">
                <div class="row">


                    @foreach($templates as $temp)

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header bg-dark"><h4
                                        class="card-title"> {{inputTitle($temp['name'])}} </h4></div>
                                <div class="card-body">
                                    <img src="{{$temp['image']}}" alt="*" style="width: 100%;">
                                </div>
                                <div class="card-footer">

                                    @if($general->active_template == $temp['name'])

                                        <button type="submit" name="name" value="{{$temp['name']}}" class="btn btn-dark btn-block">
                                            SELECTED
                                        </button>
                                        @else


                                    <button type="submit" name="name" value="{{$temp['name']}}" class="btn btn-success btn-block">
                                        Select As Active
                                    </button>
                                        @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                    @if($extra_templates)
                    @foreach($extra_templates as $temp)

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header bg-primary"><h4
                                        class="card-title"> {{inputTitle($temp['name'])}} </h4></div>
                                <div class="card-body">
                                    <img src="{{$temp['image']}}" alt="*" style="width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <a href="{{$temp['url']}}" target="_blank" class="btn btn-primary btn-block">Get
                                        This</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    @endif


                </div>


            </div>

        </form>
    </div>
@endsection 

@extends('admin.layouts.master')

@section('content')
<section class="error-section">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 content text-center">
        <img src="{{ asset('assets/images/error-404.png') }}" alt="error-image">
        <span class="sub-title">Oeps, deze pagina bestaat niet (meer)..</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg mt-3">Naar home</a>
    </div>
</section>
@endsection
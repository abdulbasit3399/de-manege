@extends($activeTemplate .'layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.pinlogin.css') }}"/>
<style>
    body{
        background-color: red;
    }
</style>
@endpush
@section('content')
    <section class="faq-section padding-top padding-bottom">
        <div class="text-center text-white">
            Uw saldo is te laag, ga op uw telefoon naar <a class="text-white" href="{{ route('user.login') }}">de-manege.nl/inloggen</a> om op te waarderen.
            <br>
            <br>
            <a href="{{ route('home') }}" class="btn btn-dark">Terug naar homepage</a>
        </div>

    </section>
@endsection

@extends($activeTemplate .'layouts.user')

@section('content')
    <a href="{{ route('user.logout') }}" class="btn btn-primary">Logout</a>
@endsection

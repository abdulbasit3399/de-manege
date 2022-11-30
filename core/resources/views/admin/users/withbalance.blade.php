@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive table-responsive-xl">
                <table class="table align-items-center table-light">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Gebruikersnaam</th>
                            <th scope="col">Balance Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Profiel</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($users as $user)
                        <tr>
                            <td scope="row">
                                <div class="media align-items-center">
                                    <a href="{{ route('admin.users.detail', $user->user->id) }}" class="avatar avatar-sm rounded-circle mr-3">
                                        <img src="{{ get_image(config('constants.user.profile.path') .'/'. $user->user->image) }}" alt="image">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ route('admin.users.detail', $user->user->id) }}"><span class="name mb-0">{{ $user->user->fullname }}</span></a>
                                    </div>

                                </div>
                            </td>
                            <td><a href="{{ route('admin.users.detail', $user->user->id) }}">{{ $user->user->username }}</a></td>
                            <td>{{ $user->wallet_type }}</td>
                            <td>{{ $user->balance+0 }} {{$general->cur_text}}</td>
                            <td><a href="{{ route('admin.users.detail', $user->user->id) }}" class="btn btn-rounded btn-primary text-white"><i class="fa fa-fw fa-desktop"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav aria-label="...">
                    {{ $users->links() }}
                </nav>
            </div>

        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
    <form action="{{ route('admin.users.search', $scope ?? str_replace('admin.users.', '', request()->route()->getName())) }}" method="GET" class="form-inline">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="Username or email" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush

@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.register') }}" class="btn btn-light pull-right">Alle leden</a>
            </div>
            <div class="table-responsive table-responsive-xl">
                <table class="table align-items-center table-light">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Gebruikersnaam</th>
                            <th scope="col">Email</th>
                             <th scope="col">Toestand</th>
                            <th scope="col">Actie</th>
                            <th scope="col">Verwijderen</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($users as $user)
                        <tr>
                            <td scope="row">
                                <div class="media align-items-center">
                                    <a href="{{ route('admin.users.detail', $user->id) }}" class="avatar avatar-sm rounded-circle mr-3">
                                        <img src="{{ get_image(config('constants.user.profile.path') .'/'. $user->image) }}" alt="image">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ route('admin.users.detail', $user->id) }}"><span class="name mb-0">{{ $user->fullname }}</span></a>
                                    </div>

                                </div>
                            </td>
                            <td><a href="{{ route('admin.users.detail', $user->id) }}">{{ $user->username }}</a></td>
                            <td>{{ $user->email }}</td>
                             <td>
                                {!! $user->status == 1 ? '<span class="badge badge-success">Actief</span>' : '<span class="badge badge-danger">Inactief</span>' !!}
                             </td>
                            <td><a href="{{ route('admin.users.detail', $user->id) }}" class="btn btn-rounded btn-primary text-white"><i class="fa fa-fw fa-desktop"></i></a></td>
                            <td><a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-rounded btn-danger"><i class="fa fa-fw fa-trash"></i></a> </td>
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

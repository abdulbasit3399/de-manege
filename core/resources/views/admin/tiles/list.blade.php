@extends('admin.layouts.app')

@section('panel')
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive table-responsive-xl">
                <table class="table align-items-center table-light">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Prijs</th>
                            <th scope="col">Actie</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                    @forelse($tiles as $gateway)
                        <tr>
                            <td scope="row">
                                <div class="media align-items-center">
                                    <a href="{{ route('admin.tiles.edit', $gateway->id) }}" class="avatar avatar-sm rounded-circle mr-3">
                                        <img src="{{ get_image(config('constants.deposit.gateway.path') .'/'. $gateway->image) }}" alt="image">
                                    </a>
                                    <div class="media-body">
                                        <span class="name ml-2 mb-0">{{ $gateway->name }}</span>
                                    </div>
                                </div>
                            </td>

                            <td scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0">${{ $gateway->price }}</span>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <a href="{{ route('admin.tiles.edit', $gateway->id) }}" class="btn btn-info btn-icon editGatewayBtn"><i class="fa fa-fw fa-pencil"></i></a>
                                {{--  @if($gateway->status == 0)
                                    <button class="btn btn-success activateBtn" data-code="{{ $gateway->id }}" data-name="{{ $gateway->name }}" data-toggle="modal" data-target="#activateModal"><i class="fa fa-fw fa-eye"></i></button>
                                @else
                                    <button class="btn btn-danger deactivateBtn" data-code="{{ $gateway->id }}" data-name="{{ $gateway->name }}" data-toggle="modal" data-target="#deactivateModal"><i class="fa fa-fw fa-eye-slash"></i></button>
                                @endif  --}}
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        {{ $tiles->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- ACTIVATE METHOD MODAL --}}
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Method Activation Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.deposit.manual.activate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="code">
                    <div class="modal-body">
                        <p>Are you sure to activate <span class="font-weight-bold method-name"></span> method?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Activate</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATE METHOD MODAL --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Method Disable Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.deposit.manual.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="code">
                    <div class="modal-body">
                        <p>Are you sure to disable <span class="font-weight-bold method-name"></span> method?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Disable</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
<a class="btn btn-success" href="{{ route('admin.tiles.create') }}"><i class="fa fa-fw fa-plus"></i>Add New</a>
@endpush

@push('script')
<script>
    $('.activateBtn').on('click', function() {
        var modal = $('#activateModal');
        modal.find('.method-name').text($(this).data('name'));
        modal.find('input[name=code]').val($(this).data('code'));
    });

    $('.deactivateBtn').on('click', function() {
        var modal = $('#deactivateModal');
        modal.find('.method-name').text($(this).data('name'));
        modal.find('input[name=code]').val($(this).data('code'));
    });
</script>
@endpush

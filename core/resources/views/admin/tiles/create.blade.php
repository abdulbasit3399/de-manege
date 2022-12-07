@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.tiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body" >
                    <div class="payment-method-item">
                        <div class="payment-method-header d-flex flex-wrap">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview"></div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" name="image" class="profilePicUpload" id="image" accept=".png, .jpg, .jpeg" />
                                    <label for="image" class="bg-primary"><i class="fa fa-pencil"></i
                                    ></label>
                                </div>
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between">

                                </div>
                                <div class="row mr-1">
                                    <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Naam" name="name" value="{{ old('name') }}" />
                                    </div>

                                    <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Prijs" name="price" value="{{ old('price') }}" />
                                    </div>

                                    <div class="col-12 mt-4">
                                        <textarea name="description" id="description" class="form-control" rows="3" value="{{ old('description') }}"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Product opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('breadcrumb-plugins')
<a href="{{ route('admin.tiles.index') }}" class="btn btn-dark"><i class="fa fa-fw fa-backward"></i> Ga terug </a>
@endpush

@push('script')
<script>
$('input[name=currency]').on('input', function() {
    $('.currency_symbol').text($(this).val());
});
$('.addUserData').on('click', function() {
    var html =  `<div class="col-md-4 user-data mt-2">
                    <div class="input-group has_append">
                        <input class="form-control border-radius-5" name="ud[]" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger removeBtn"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>`;

    $('#userData').append(html);
});

$(document).on('click', '.removeBtn', function() {
    $(this).parents('.user-data').remove();
});
@if(old('currency'))
$('input[name=currency]').trigger('input');
@endif
</script>
@endpush

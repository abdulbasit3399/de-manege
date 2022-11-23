@extends('admin.layouts.app')
@section('panel')
@if(@$section->content)
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.frontend.sections.content', $key) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="type" value="content">
                        @foreach($section->content as $k => $type)
                        @if($k != 'image_property')
                        @if($type == 'image')

                        <div class="col-md-4">
                            <input type="hidden" name="has_image" value="1">
                            <div class="form-group">
                                <label>{{inputTitle($k)}}</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ get_image('assets/images/frontend/' . $key .'/'. @$content->data_values->$k) }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                            <label for="profilePicUpload1" class="bg-primary"> image</label>
                                            <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>.
                                                @if(@$section->content->image_property->size)
                                                | Will be resized to: <b>{{$section->content->image_property->size}}</b> px.
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">

                            @push('divend')
                        </div>
                        @endpush

                        @elseif($type == 'icon')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{inputTitle($k)}}</label>
                                <div class="input-group has_append">
                                    <input type="text" class="form-control" name="icon" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary iconPicker" data-icon="fas fa-home" role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @elseif($type == 'textarea')

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{inputTitle($k)}}</label>
                                <textarea rows="10" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" required>{{ @$content->data_values->$k}}</textarea>
                            </div>
                        </div>

                        @elseif($type == 'textarea-nic')

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{inputTitle($k)}}</label>
                                <textarea rows="10" class="form-control nicEdit" placeholder="{{inputTitle($k)}}" name="{{$k}}">{{ @$content->data_values->$k}}</textarea>
                            </div>
                        </div>

                        @else
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{inputTitle($k)}}</label>
                                <input type="text" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" value="{{ @$content->data_values->$k }}" required/>
                            </div>
                        </div>

                        @endif
                        @endif
                        @endforeach
                        @stack('divend')
                    </div> <!-- form row     -->
                </div>
                <div class="card-footer">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-block btn-primary mr-2">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if(@$section->element)

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="table-responsive table-responsive-xl">
                <table class="table align-items-center table-light">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            @if(@$section->element->icon)
                            <th scope="col">Icon</th>
                            @endif
                            @if(@$section->element->image)
                            <th scope="col">Image</th>
                            @endif
                            @foreach($section->element as $k => $type)
                            @if($type=='text' && $k !='modal')
                            <th scope="col">{{inputTitle($k)}}</th>
                            @endif
                            @endforeach
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse($elements as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @if(@$section->element->icon)
                            <td>@php echo $data->data_values->icon; @endphp</td>
                            @endif
                            @if(@$section->element->image)
                            <td scope="row">
                                <div class="media align-items-center">
                                    <img src="{{ get_image('assets/images/frontend/' . $key .'/'. @$data->data_values->image) }}" alt="image">
                                </div>
                            </td>
                            @endif
                            @foreach($section->element as $k => $type)
                            @if($type=='text' && $k !='modal')
                            <td>{{$data->data_values->$k}}</td>
                            @endif
                            @endforeach
                            <td>
                                @if($section->element->modal)
                                <button class="btn btn-primary updateBtn" data-id="{{$data->id}}" data-all="{{json_encode($data->data_values)}}"><i class="fa fa-pencil"></i></button>
                                @else
                                <a href="{{route('admin.frontend.sections.element',[$key,$data->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                @endif
                                <button class="btn btn-danger removeBtn" data-id="{{ $data->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




{{-- Add METHOD MODAL --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New {{inputTitle($key)}} Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.frontend.sections.content', $key) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="element">
                <div class="modal-body">
                    @foreach($section->element as $k => $type)
                    @if($k != 'image_property' && $k != 'modal')
                    @if($type == 'icon')

                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <div class="input-group has_append">
                            <input type="text" class="form-control" name="icon" required>

                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary iconPicker" data-icon="fas fa-home" role="iconpicker"></button>
                            </div>
                        </div>
                    </div>

                    @elseif($type == 'image')

                    <input type="hidden" name="has_image" value="1">
                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" style="background-image: url({{ get_image('/') }})">
                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload2" accept=".png, .jpg, .jpeg">
                                    <label for="profilePicUpload2" class="bg-primary"> image</label>
                                    <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>.
                                       @if(@$section->element->image_property->size)
                                       | Will be resized to: <b>{{@$section->element->image_property->size}}</b> px.
                                       @endif
                                   </small>
                               </div>
                           </div>
                       </div>
                   </div>

                   @elseif($type == 'textarea')

                   <div class="form-group">
                    <label>{{inputTitle($k)}}</label>
                    <textarea rows="4" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" required></textarea>
                </div>

                @elseif($type == 'textarea-nic')

                <div class="form-group">
                    <label>{{inputTitle($k)}}</label>
                    <textarea rows="4" class="form-control nicEdit" placeholder="{{inputTitle($k)}}" name="{{$k}}"></textarea>
                </div>

                @else

                <div class="form-group">
                    <label>{{inputTitle($k)}}</label>
                    <input type="text" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" required/>
                </div>

                @endif
                @endif
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>




{{-- Update METHOD MODAL --}}
<div id="updateBtn" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Update  {{inputTitle($key)}} Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.frontend.sections.content', $key) }}" class="edit-route" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="element">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    @foreach($section->element as $k => $type)
                    @if($k != 'image_property' && $k != 'modal')
                    @if($type == 'icon')

                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <div class="input-group has_append">
                            <input type="text" class="form-control" name="icon" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary iconPicker" data-icon="fas fa-home" role="iconpicker"></button>
                            </div>
                        </div>
                    </div>

                    @elseif($type == 'image')

                    <input type="hidden" name="has_image" value="1">
                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <div class="image-upload">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview imageModalUpdate">
                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload3" accept=".png, .jpg, .jpeg">
                                    <label for="profilePicUpload3" class="bg-primary"> image</label>
                                    <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>.
                                        @if(@$section->element->image_property->size)
                                        | Will be resized to: <b>{{@$section->element->image_property->size}}</b> px.
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    @elseif($type == 'textarea')

                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <textarea rows="4" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" required></textarea>
                    </div>

                    @elseif($type == 'textarea-nic')

                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <textarea rows="4" class="form-control nicEdit" placeholder="{{inputTitle($k)}}" name="{{$k}}"></textarea>
                    </div>

                    @else
                    <div class="form-group">
                        <label>{{inputTitle($k)}}</label>
                        <input type="text" class="form-control" placeholder="{{inputTitle($k)}}" name="{{$k}}" required/>
                    </div>

                    @endif
                    @endif
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- REMOVE METHOD MODAL --}}
<div id="removeModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.frontend.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>Are you sure you want to delete this item? Once deleted can not be undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('breadcrumb-plugins')
@if($section->element->modal)
<a href="javascript:void(0)" class="btn btn-success addBtn"><i class="fa fa-fw fa-plus"></i>Add New</a>
@else
<a href="{{route('admin.frontend.sections.element',$key)}}" class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add New</a>
@endif
@endpush
@endif
{{-- if section element end --}}
@endsection


@push('style-lib')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-iconpicker.min.css') }}">
@endpush
@push('script-lib')
<script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush


@push('script')

<script>
    $('.removeBtn').on('click', function() {
        var modal = $('#removeModal');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });

    $('.addBtn').on('click', function() {
        var modal = $('#addModal');
        modal.modal('show');
    });


    $('.updateBtn').on('click', function() {
        var modal = $('#updateBtn');
        modal.find('input[name=id]').val($(this).data('id'));

        var obj = $(this).data('all');
        if(obj.image){
            var imgloc = '{{ asset('assets/images/frontend/') }}/{{$key}}/' + obj.image;
            $(".imageModalUpdate").css("background-image", "url("+ imgloc +")"); 
        }
        $.each(obj, function(index, value) {
            modal.find('[name='+index+']').val(value);
        }); 

        modal.modal('show');
    });

    $('#updateBtn').on('shown.bs.modal', function (e) { $(document).off('focusin.modal'); });
    $('#addModal').on('shown.bs.modal', function (e) { $(document).off('focusin.modal'); });
    
    $('.iconPicker').iconpicker({
            align: 'center', // Only in div tag
            arrowClass: 'btn-danger',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 10,
            footer: true,
            header: true,
            icon: 'fas fa-bomb',
            iconset: 'fontawesome5',
            labelHeader: '{0} of {1} pages',
            labelFooter: '{0} - {1} of {2} icons',
            placement: 'bottom', // Only in button tag
            rows: 5,
            search: false,
            searchText: 'Search icon',
            selectedClass: 'btn-success',
            unselectedClass: ''
        }).on('change', function(e){
            $(this).parent().siblings('input[name=icon]').val(`<i class="${e.icon}"></i>`);
        });
    </script>

    @endpush

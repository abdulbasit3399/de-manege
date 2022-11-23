@extends($activeTemplate .'layouts.user')
@section('content')


    <div class="row">

        <div class="col-md-12">
            <div class="card">


                <div class="card-body">

                    <form method="post" class="form-horizontal" action="{{route('document.update', $document->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-body">

                            <div class="form-row">

                            
                                
                                <div class="form-group col-md-3">
                                  <div class="image-upload">
                                    <strong>Plan Image</strong>
                                     <div class="image-preview">
                                      @php $img=json_decode($document->document) @endphp
                                      @if(isset($img))
                                        @foreach($img as $i)
                                        <img src="{{ get_document(config('constants.user.document.path').'/'. $i) }}" class="" style="height: 50px;width: 50px;margin:auto;">
                                        @endforeach
                                    @endif
                                    </div>
                                      <div class="image-edit">
                                    <input type="file" name="doc_file[]" class="form-control" multiple>
                                   
                                    </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary btn-block">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('breadcrumb-plugins')
   
@endpush

@push('script')

@endpush

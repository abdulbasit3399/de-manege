<style>


.amrut-test{
    display:flex;
}

</style>


@extends('admin.layouts.app')

@section('panel')


<div class="row">

    <div class="col-md-12">
        <div class="card text-center">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>Invest Min-Max Amount</td>
                        <td>Interest</td>
                        <td>Capital Back</td>
                        <td>Life Time Status</td>
                        <td>Status</td>
                        <td>Featured</td>
                        <td>Investment Plan Types</td>
                        <td>Action</td>
                    </tr>
                    @foreach($plan as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->fixed_amount == 0 ? $general->cur_sym.number_format($data->minimum,2).' - '.$general->cur_sym.number_format($data->maximum,2) : $general->cur_sym.number_format($data->maximum,2) }}</td>
                        <td>
                            {{$data->interest}} @if($data->interest_status == 1)
                            % @else {{$general->cur_text}} @endif
                        </td>
                        <td>
                            <p>@if($data->capital_back_status == 1)
                          <span
                          class="badge badge-success">Yes</span> @elseif($data->capital_back_status == 0)
                          <span class="badge badge-danger">No</span>@endif</p>
                        </td>
                        <td>
                            <p>@if($data->lifetime_status == 1)
                            <span
                            class="badge badge-success">Active</span> @elseif($data->lifetime_status == 0)
                            <span class="badge badge-danger">Inactive</span>@endif</p>
                        </td>
                        <td>
                            <p>@if($data->status == 1) <span
                              class="badge badge-success">Active</span> @elseif($data->status == 0)
                              <span class="badge badge-danger">Disable</span>@endif </p>
                        </td>
                        <td>
                            <p>@if($data->featured == 1) <span
                                class="badge badge-success">Yes</span> @else <span
                                class="badge badge-danger">No</span>@endif </p>
                        </td>
                        <td>{{$data->interest_plan_type}}</td>
                        <td style="display:flex;">
                            <a href="{{route('admin.plan-edit',$data->id)}}"
                               class="btn btn-primary mx-1"><i class="fa fa-pencil "></i></a> 
                            <a href="{{route('admin.plan-delete',$data->id)}}" onclick="return confirm('You want to delete this plan?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-footer py-4">
                <nav aria-label="...">
                    {{ $plan->links() }}
                </nav>
            </div>
        </div>

    </div>

</div>

@endsection

@push('breadcrumb-plugins')

<a href="{{route('admin.plan-create')}}" class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add New</a>
@endpush

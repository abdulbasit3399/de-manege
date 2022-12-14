<style>


  .amrut-test{
    display:flex;
  }
  .owl-prev, .owl-next{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    display:flex;
    align-items:center;
    justify-content:center;
  }


  .owl-prev{
    left:10px;
    right:auto;
    width:20px;
    height:20px;
    font-size:0px;
    background:#000;
    border-radius:50%;
  }

  .owl-next{
    left:auto;
    right:10px;
    width:20px;
    height:20px;
    font-size:0px;
    background:#000;
    border-radius:50%;
  }

  .owl-next::before, .owl-prev::before{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 16px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color:#fff;
    line-height:normal;
    
  }

  .owl-prev::before{
    content: "\f104";
  }

  .owl-next::before{
    content: "\f105";
  }

  @media (max-width: 575px)
  .owl-nav {
    display: block;
  }

</style>


@extends('admin.layouts.app')

@section('panel')


<div class="row">

  @foreach($plan as $data)
  <div class="col-md-4 amrut-test">
    <div class="card text-center">
      <div class="card-header">
        <h5>{{$data->name}}</h5>
        <div class="image-preview owl-carousel owl-theme">
         @php $img=json_decode($data->plan_image) @endphp
         @if(isset($img))
         @foreach($img as $i)
         <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item" style="height: auto;width: 265px;margin:auto;">
         @endforeach
         @endif
       </div>
       
     </div>
     <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group">
            @if($data->fixed_amount == 0)
            <li class="list-group-item"><p>Invest Min-Max Amount:
              <strong> {{$general->cur_sym}} {{number_format($data->minimum,2)}}
                - {{$general->cur_sym}} {{number_format($data->maximum,2)}}</strong></p></li>
                @else
                <li class="list-group-item"><p>Fixed Invest Amount:
                  <strong> {{$general->cur_sym}} {{number_format($data->maximum,2)}}</strong></p></li>
                  @endif

                  <li class="list-group-item"><p>Interest :
                    <strong>{{$data->interest}} @if($data->interest_status == 1)
                      % @else {{$general->cur_text}} @endif</strong></p></li>
                      <li class="list-group-item">Repeat will every {{$data->times}} Hours
                        After @if($data->lifetime_status == 0) {{$data->repeat_time}} Times @endif</li>

                        <li class="list-group-item"><p> Capital Back: @if($data->capital_back_status == 1)
                          <span
                          class="badge badge-success">Yes</span> @elseif($data->capital_back_status == 0)
                          <span class="badge badge-danger">No</span>@endif</p></li>
                          <li class="list-group-item"><p>Life Time Status: @if($data->lifetime_status == 1)
                            <span
                            class="badge badge-success">Active</span> @elseif($data->lifetime_status == 0)
                            <span class="badge badge-danger">Inactive</span>@endif</p></li>
                            <li class="list-group-item"><p>Status: @if($data->status == 1) <span
                              class="badge badge-success">Active</span> @elseif($data->status == 0)
                              <span class="badge badge-danger">Disable</span>@endif </p></li>
                              <li class="list-group-item"><p>Featured: @if($data->featured == 1) <span
                                class="badge badge-success">Yes</span> @else <span
                                class="badge badge-danger">No</span>@endif </p></li>
                                <li class="list-group-item"><p>Investment Plan Types: {{$data->interest_plan_type}} </p></li>
                                <li class="list-group-item"><p>Investment Sectors & Investment Category: {{ $data->investment_sectors_and_category }}</p></li>
                              </ul>
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-12">
                              <a href="{{route('admin.plan-edit',$data->id)}}"
                               class="btn btn-primary btn-block">Edit</a>
                             </div>
                           </div>
                         </div>
                       </div>

                     </div>
                     @endforeach

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

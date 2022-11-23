@extends('templates.crypto.layouts.user')

@section('content')
<div class="page-body">
<div class="container-fluid">
    <section class="row">
        <div class="col-sm-12">
            <!-- What is-->
            <div id="what-is" class="card mt-4">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="entry-content">
                        <div class="part-text pranto-ul">
                            <ul style="width: 100%">
                            <li class="container"><p><strong>{{Auth::user()->username}}</strong>
                            </p>
                            <ul>
                                @php   echo  showBelowUser(Auth::id()) @endphp
                            </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <input type="text" name="text" class="form-control"
                        id="referralURL"
                        value="{{route('refer.register',[Auth::user()->username])}}"
                        readonly>
                        <div class="input-group-append">
                            <span class="input-group-text copytext" id="copyBoard"
                            onclick="myFunction()"> <i
                            class="fa fa-copy"></i> </span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div id="what-is" class="card">
                <div class="row">
                    <div class="table-responsive table-responsive--md">
                        <table class="table table-bordernone rounded">
                            <thead class="table-primary">
                            <tr>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('Commission Via')</th>
                            <th scope="col">@lang('Description')</th>

                            <th scope="col">@lang('Level Commission')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('After Balance')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($trans)==0)
                            <tr>
                            <td colspan="6" class="text-center">@lang('No Data Available')</td>
                            </tr>
                            @endif

                            @foreach($trans as $data)
                            <tr @if($data->amount < 0) style="background-color: #e4afaf" @endif>
                            <td data-label="@lang('Date')">{{date('d M, Y h:i:s A', strtotime($data->created_at))}}</td>
                            <td data-label="@lang('Commission Via')"><strong>{{$data->bywho->username}}</strong></td>
                            <td data-label="@lang('Description')">{{__($data->title)}}</td>
                            <td data-label="@lang('Level Commission')">{{__($data->level)}}</td>
                            <td data-label="@lang('Amount')">{{__($general->cur_sym)}} {{formatter_money($data->amount)}}</td>
                            <td data-label="@lang('After Balance')">{{__($general->cur_sym)}} {{formatter_money($data->main_amo)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    {{$trans->links()}}
                </div>
            </div>
            <!-- Simple Card-->
        </div>
    </section>
</div>
</div>

@endsection

@section('scripts')
<script>
  function myFunction() {
    var copyText = document.getElementById("referralURL");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    /*For mobile devices*/
    document.execCommand("copy");
    var alertStatus = "{{$general->alert}}";
    if (alertStatus == '1') {
      iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
    } else if (alertStatus == '2') {
      toastr.success("Copied: " + copyText.value);
    }
  }
</script>
@endsection

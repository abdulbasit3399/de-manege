
<style>

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: black;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}


.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
@extends($activeTemplate .'layouts.user')
@section('content')

    @include($activeTemplate.'partials.breadcrumb')

    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9" >
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">
                                <li>
                                    <a href="{{route('document.create')}}" class="btn btn-sm btn-rounded btn-success float-right"><i class="fa fa-plus">Add Document</i></a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">
                                <div class="tab">
                                  <button class="tablinks active" style="max-width: 190px;" onclick="openDocument(event, 'Tax')">Tax Document</button>
                                  <button class="tablinks" style="max-width: 380px;" onclick="openDocument(event, 'Account')">Account Document</button>
                                  <button class="tablinks" style="max-width: 274px;" onclick="openDocument(event, 'Investment')">Investment Document</button>
                                </div>
                                
                                <div id="Tax" class="tabcontent">
                                 <div class="table-responsive table-responsive-xl">
                                    <table class="table align-items-center table-light">
                                        <thead>
                                         <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Document Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($document as $k => $data)
                                        @php $doc=json_decode($data->document); @endphp
                                        <div class="image-preview">
                                        @if($data->type==0)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>
                                                @foreach($doc as $row)
                                                <a href="{{ get_image(config('constants.user.document.path').'/'. $row) }}" target="_blank">{{ $row }}</a><br>
                                                @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                        </div>
                                    @endforeach       
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                
                                <div id="Account" class="tabcontent">
                                 <div class="table-responsive table-responsive-xl">
                                    <table class="table align-items-center table-light">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Document Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach($document as $k => $data)
                                   
                                    @php $doc=json_decode($data->document); @endphp
                                        <div class="image-preview">
                                        @if($data->type==1)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>
                                                @foreach($doc as $row)
                                                <a href="{{ get_image(config('constants.user.document.path').'/'. $row) }}" target="_blank">{{ $row }}</a><br>
                                                @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                        </div>
                                    @endforeach    
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                                
                                <div id="Investment" class="tabcontent">
                                 <div class="table-responsive table-responsive-xl">
                                    <table class="table align-items-center table-light">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Document Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($document as $k => $data)
                                   
                                    @php $doc=json_decode($data->document); @endphp
                                        <div class="image-preview">
                                        @if($data->type==2)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>
                                                @foreach($doc as $row)
                                                <a href="{{ get_image(config('constants.user.document.path').'/'. $row) }}" target="_blank">{{ $row }}</a><br>
                                                @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                        </div>
                                    @endforeach    
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                              
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->
<script>
function openDocument(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

@endsection




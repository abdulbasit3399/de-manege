@extends('admin.layouts.app')

@section('panel')

<div class="row">

  <div class="col-md-12">
    <div class="card">


      <div class="card-body">

        <form method="post" class="form-horizontal" action="{{route('admin.plan-store')}}" enctype="multipart/form-data">
          @csrf

          <div class="form-body">

            <div class="form-row">

              <div class="form-group col-md-3">
                <strong>Plan Name</strong>
                <input type="text" class="form-control" name="name" required>
              </div>


              <div class="form-group col-md-3">
                <strong>Amount Type</strong>
                <input data-toggle="toggle" id="amount" class="amount" data-onstyle="success"  data-offstyle="info" data-on="Fixed" data-off="Range" data-width="100%" type="checkbox" name="amount_type" >
              </div>
              <div class="form-group offman col-md-3">
                <strong>Share Price</strong>
                <div class="input-group">
                  <input type="text" class="form-control"  name="share_price">
                  <div class="input-group-append">
                    <div class="input-group-text">{{$general->cur_sym}}</div>
                  </div>
                </div>
              </div>
              <div class="form-group offman col-md-3">
                <strong>Total Supply</strong>
                <div class="input-group">
                  <input type="number" min="1" class="form-control" name="total_supply">

                </div>
              </div>
              <div class="form-group offman col-md-3">
                <strong>Minimum Amount</strong>
                <div class="input-group">
                  <input type="text" class="form-control" name="minimum" required>
                  <div class="input-group-append">
                    <div class="input-group-text">{{$general->cur_sym}}</div>
                  </div>
                </div>
              </div>

              <div class="form-group offman col-md-3" >
                <strong>Maximum Amount</strong>
                <div class="input-group">
                  <input type="text" class="form-control" name="maximum" required>
                  <div class="input-group-append">
                    <div class="input-group-text">{{$general->cur_sym}}</div>
                  </div>
                </div>
              </div>

              <div class="form-group onman col-md-3" style="display: none">
                <strong> Amount</strong>
                <div class="input-group">
                  <input type="text" class="form-control"  name="amount">
                  <div class="input-group-append">
                    <div class="input-group-text">{{$general->cur_sym}}</div>
                  </div>
                </div>
              </div>


              <div class="form-group col-md-3">
                <strong>Return /Interest</strong>
                <div class="input-group">
                  <input type="text" class="form-control"  name="interest"  required>
                  <div class="input-group-append" style="height: 45px">
                    <div class="input-group-text">
                      <select name="interest_status" class="form-control" style="height: 35px !important;">
                        <option value="%">%</option>
                        <option value="{{$general->cur_sym}}">{{$general->cur_sym}}</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group col-md-3">
                <strong>Every</strong>
                <select class="form-control" name="times">
                  @foreach($time as $data)
                  <option value="{{$data->time}}">{{$data->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-3">
                <strong>Return For</strong>
                <input data-toggle="toggle" id="lifetime" class="lifetime" data-onstyle="success"  data-offstyle="danger" data-on="Period" data-off="Lifetime" data-width="100%" type="checkbox" name="lifetime_status" >
              </div>


              <div class="form-group return col-md-3" style="display: none">
                <div class="form-group">
                  <strong>How Many Times</strong>
                  <input type="text" class="form-control" name="repeat_time">
                </div>
              </div>

              <div class="form-group col-md-3" id="capitalBack">
                <strong>Capital Back</strong>
                <input data-toggle="toggle" data-onstyle="success"  data-offstyle="danger" data-on="Yes" data-off="No" data-width="100%" type="checkbox" name="capital_back_status" >
              </div>


              <div class="form-group col-md-3" >
                <strong>Status</strong>
                <input data-toggle="toggle" data-onstyle="success"  data-offstyle="danger"
                data-on="Active" data-off="Disable" data-width="100%" type="checkbox" name="status" >
              </div>

              <div class="form-group col-md-3" >
                <strong>Featured</strong>
                <input data-toggle="toggle" data-onstyle="success"  data-offstyle="danger"
                data-on="Yes" data-off="No" data-width="100%" type="checkbox" name="featured" >
              </div>

              <div class="form-group col-md-3">
                <div class="image-upload">
                  <strong>Plan Image</strong>

                  <div class="image-edit">
                    <input type="file" name="plan_images[]" class="form-control" multiple>
                  </div>
                </div>
              </div>

              <div class="form-group col-md-3">
                <strong>File Upload</strong>
                <div class="custom-file">
                  <input type="file" name="doc_file[]" class="custom-file-input" id="chooseFile" multiple>
                  <label class="custom-file-label" for="chooseFile">Select file</label>
                </div>
              </div>

              <div class="form-group col-md-4">
                <strong>Investment Plan Types</strong>
                <select name="interest_plan_type" class="form-control" style="height: 35px !important;" required>
                  <option value="">Select Plan Types</option>
                  <option value="Venture Capital">Venture Capital</option>
                  <option value="Buyout (LBO)"> Buyout (LBO)</option>
                  <option value="Equity"> Equity</option>
                  <option value="Debt"> Debt</option>
                  <option value="Mezzanine">Mezzanine</option>
                  <option value="Investment by Sector"> Investment by Sector</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <strong>Investment Sectors & Investment Category</strong>
                <select name="investment_sectors_and_category" class="form-control" style="height: 35px !important;" required>
                  <option value="">Select Plan Types</option>
                  <option value="Healthcare">Healthcare</option>
                  <option value="Real Estate">Real Estate</option>
                  <option value="IT">IT</option>
                  <option value="Financial Services">Financial Services</option>
                  <option value="Energy">Energy</option>
                  <option value="B2B">B2B</option>
                  <option value="B2C">B2C</option>
                  <option value="Retail"> Retail</option>
                  <option value="Materials & Resources"> Materials & Resources</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <strong>Address</strong>
                <div id="locationField">
                  <input type="text" name="address" id="autocomplete" class="form-control"  onFocus="geolocate()" id="address" required>
                </div>
              </div>
              <div class="form-group col-md-6" >
                <strong>Overview</strong>
                <textarea name="overview" id="overview" required></textarea>
                <script>
                  CKEDITOR.replace( 'overview' );
                </script>
              </div>
              <div class="form-group col-md-6" >
                <strong>Investment Highlights</strong>
                <textarea name="investment_highlights" id="investment_highlights" required></textarea>
                <script>
                  CKEDITOR.replace( 'investment_highlights' );
                </script>
              </div>
              <div class="form-group col-md-6" >
                <strong>Sponsor</strong>
                <textarea name="sponsor" id="sponsor" required></textarea>
                <script>
                  CKEDITOR.replace( 'sponsor' );
                </script>
              </div>
              <div class="form-group col-md-6" >
                <strong>Transaction History </strong>
                <textarea name="transaction_history" id="transaction_history"></textarea>
                <script>
                  CKEDITOR.replace( 'transaction_history' );
                </script>
              </div>

              <div class="form-group col-md-6" >
                <strong>Risk Disclosures</strong>
                <textarea name="risk_disclosures" id="risk_disclosures" required></textarea>
                <script>
                  CKEDITOR.replace( 'risk_disclosures' );
                </script>
              </div>
              <div class="form-group col-md-6" >
              </div>
                                {{-- <div class="form-group col-md-12">
                                  <table class="table align-items-center table-light table-responsive">
                                    <thead>
                                        <tr>
                                            <td>Tenent</td>
                                            <td>Unit</td>
                                            <td>Type</td>
                                            <td>Trem</td>
                                            <td>Sf</td>
                                            <td>Start Date</td>
                                            <td>End Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Habit Burger</td>
                                              <td><input type="number" name="property_details[0][unit]"></td>
                                              <td><input type="text" name="property_details[0][Type]"></td>
                                              <td><input type="number" name="property_details[0][Trem]" id="property_details_Trem_0"></td>
                                              <td><input type="text" name="property_details[0][sf]" readonly id="property_details_sf_0"></td>
                                              <td><input type="date" name="property_details[0][startdate]" id="startdate_0"></td>
                                              <td><input type="date" name="property_details[0][enddate]" readonly id="enddate_0"></td>
                                        </tr>
                                         <tr>
                                            <td>Whealthy</td>
                                              <td><input type="number" name="property_details[1][unit]"></td>
                                              <td><input type="text" name="property_details[1][Type]"></td>
                                              <td><input type="number" name="property_details[1][Trem]" id="property_details_Trem_1"></td>
                                              <td><input type="text" name="property_details[1][sf]" readonly  id="property_details_sf_1"></td>
                                              <td><input type="date" name="property_details[1][startdate]" id="startdate_1"></td>
                                              <td><input type="date" name="property_details[1][enddate]" readonly id="enddate_1"></td>
                                        </tr>
                                         <tr>
                                            <td>Taqueria Zamora</td>
                                             <td><input type="number" name="property_details[2][unit]"></td>
                                              <td><input type="text" name="property_details[2][Type]"></td>
                                              <td><input type="number" name="property_details[2][Trem]" id="property_details_Trem_2"></td>
                                              <td><input type="text" name="property_details[2][sf]" readonly id="property_details_sf_2"></td>
                                              <td><input type="date" name="property_details[2][startdate]" id="startdate_2"></td>
                                              <td><input type="date" name="property_details[2][enddate]" readonly id="enddate_2"></td>
                                        </tr>
                                         <tr>
                                              <td>Vacant Retail</td>
                                              <td><input type="number" name="property_details[3][unit]"></td>
                                              <td><input type="text" name="property_details[3][Type]"></td>
                                              <td><input type="number" name="property_details[3][Trem]" id="property_details_Trem_3"></td>
                                              <td><input type="text" name="property_details[3][sf]" readonly id="property_details_sf_3"></td>
                                              <td><input type="date" name="property_details[3][startdate]" id="startdate_3"></td>
                                              <td><input type="date" name="property_details[3][enddate]" readonly id="enddate_3"></td>
                                        </tr>
                                         <tr>
                                               <td>Chase Bank</td>
                                              <td><input type="number" name="property_details[4][unit]"></td>
                                              <td><input type="text" name="property_details[4][Type]"></td>
                                              <td><input type="number" name="property_details[4][Trem]" id="property_details_Trem_4"></td>
                                              <td><input type="text" name="property_details[4][sf]" readonly id="property_details_sf_4"></td>
                                              <td><input type="date" name="property_details[4][startdate]" id="startdate_4"></td>
                                              <td><input type="date" name="property_details[4][enddate]" readonly id="enddate_4"></td>
                                        </tr>
                                         <tr>
                                            <td>Med Office 1- Vacant</td>
                                              <td><input type="number" name="property_details[5][unit]"></td>
                                              <td><input type="text" name="property_details[5][Type]"></td>
                                              <td><input type="number" name="property_details[5][Trem]" id="property_details_Trem_5"></td>
                                              <td><input type="text" name="property_details[5][sf]" readonly id="property_details_sf_5"></td>
                                              <td><input type="date" name="property_details[5][startdate]" id="startdate_5"></td>
                                              <td><input type="date" name="property_details[5][enddate]" readonly id="enddate_5"></td>
                                        </tr>
                                          <tr>
                                            <td>Med Office 2- Vacant</td>
                                             <td><input type="number" name="property_details[6][unit]"></td>
                                              <td><input type="text" name="property_details[6][Type]"></td>
                                              <td><input type="number" name="property_details[6][Trem]" id="property_details_Trem_6"></td>
                                              <td><input type="text" name="property_details[6][sf]" readonly id="property_details_sf_6"></td>
                                              <td><input type="date" name="property_details[6][startdate]" id="startdate_6"></td>
                                              <td><input type="date" name="property_details[6][enddate]" readonly id="enddate_6"></td>
                                        </tr>

                                    </tbody>
                                  </table>
                                </div> --}}
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="table-responsive">
                <form method="post" action="{{route('admin.plans-store')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="dynamic_field">
                        <tr>
                            <td><strong>Price History</strong>
                                <input type="text" name="price[]" placeholder="Price History" class="form-control name_list" /></td>

                            <td><strong>Date</strong>
                                <input type="date" name="date[]" placeholder="date" class="form-control name_list" /></td>

                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" id="submit" class="btn btn-info m-4" value="Submit" />
                </form>

                </div>
                  @endsection

                  @push('breadcrumb-plugins')
                  <a href="{{route('admin.plan-setting')}}"  class="btn btn-success"><i class="fa fa-fw fa-eye"></i>Plan List</a>
                  @endpush

                  @push('script')

                <script type="text/javascript">
                    $(document).ready(function(){
                        var postURL = "<?php echo url('addmore'); ?>";
                        var i=1;
                        $('#add').click(function(){
                            i++;
                            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><strong>Price History</strong><input type="text" name="price[]" placeholder="Price History" class="form-control name_list" /></td><td><strong>Date</strong><input type="date" name="date[]" placeholder="date" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                        });

                        $(document).on('click', '.btn_remove', function(){
                            var button_id = $(this).attr("id");
                            $('#row'+button_id+'').remove();
                        });

                    });
                </script>

                  <script>
                    $(document).ready(function () {
                      $('#amount').on('change', function () {
                        var isCheck = $(this).prop('checked');
                        if (isCheck == false)
                        {
                          $('.offman').css('display', 'block');
                          $('.onman').css('display', 'none');
                        }else {
                          $('.offman').css('display', 'none');
                          $('.onman').css('display', 'block');
                        }
                      });

                      $('#lifetime').on('change', function () {
                        var isCheck = $(this).prop('checked');
                        if (isCheck == true)
                        {
                          $('.return').css('display', 'block');
                        }else {
                          $('.return').css('display', 'none');

                        }
                      });

                    })
                  </script>
                  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJHSWe8AqvVnLqGpV6B84WH7wNttdKqiU&libraries=places&callback=initAutocomplete">
                  </script>
                  <script>
                    $(document).on("input keyup paste change", "#property_details_Trem_0", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_0").val(b);
                      } else {
                        $("#property_details_sf_0").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#startdate_0", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_0").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_0").val(newdate);
                      }else
                      {
                       $("#enddate_0").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_1", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_1").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_1").val(newdate);
                      }else
                      {
                       $("#enddate_1").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_2", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_2").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_2").val(newdate);
                      }else
                      {
                       $("#enddate_2").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_3", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_3").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_3").val(newdate);
                      }else
                      {
                       $("#enddate_3").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_4", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_4").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_4").val(newdate);
                      }else
                      {
                       $("#enddate_4").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_5", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_5").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_5").val(newdate);
                      }else
                      {
                       $("#enddate_5").val('');
                     }
                   });

                    $(document).on("input keyup paste change", "#startdate_6", function () {
                      var a = $(this).val();
                      var pd= parseInt($("#property_details_Trem_6").val());
                      console.log(a);
                      var d=new Date(a.split("/").reverse().join("-"));
                      var dd=d.getDate();
                      var mm=d.getMonth()+1;
                      var yy=d.getFullYear();
                      var newdate=yy+"/"+mm+"/"+dd;
                      if(a)
                      {
                        var b= d.getFullYear() + pd;
                        var newdate=b+"-"+mm+"-"+dd;
                        var newdate = getDateYMD(newdate.split(' - ')[0]);
                        console.log(newdate);
                        $("#enddate_6").val(newdate);
                      }else
                      {
                       $("#enddate_6").val('');
                     }
                   });


                    function getDateYMD(range) {
                      var date = new Date(range)
                      yr = date.getFullYear(),
                      month = ( '0' + (date.getMonth()+1) ).slice( -2 ),

                      day = ( '0' + (date.getDate()) ).slice( -2 ),
                      newDate = yr + '-' + month + '-' + day;
                      return newDate;
                    }

                    $(document).on("input keyup paste change", "#property_details_Trem_1", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_1").val(b);
                      } else {
                        $("#property_details_sf_1").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#property_details_Trem_2", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_2").val(b);
                      } else {
                        $("#property_details_sf_2").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#property_details_Trem_3", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_3").val(b);
                      } else {
                        $("#property_details_sf_3").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#property_details_Trem_4", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_4").val(b);
                      } else {
                        $("#property_details_sf_4").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#property_details_Trem_5", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_5").val(b);
                      } else {
                        $("#property_details_sf_5").val('');
                      }
                    });

                    $(document).on("input keyup paste change", "#property_details_Trem_6", function () {
                      var a = $(this).val();
                      console.log(a);
                      if(a) {
                        var b = a*365;
                        $("#property_details_sf_6").val(b);
                      } else {
                        $("#property_details_sf_6").val('');
                      }
                    });



                    var placeSearch, autocomplete;
                    function initAutocomplete() {
                      autocomplete = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                        {types: ['geocode']});
                      autocomplete.addListener('place_changed', fillInAddress);
                    }
                    function fillInAddress() {
                      var place = autocomplete.getPlace();
                      console.log(place);
                      var address='';
                      var city='';
                      var state='';
                      var country='';
                      var zip='';
                      var lat='';
                      var lng ='';
                      console.log(place.address_components);
                      $.each(place.address_components,function(index,component){
                        $.each(component.types,function (i,value) {
                          if(value=="street_number"){
                            address+= component.long_name;
                          }
                          if(value=="route"){
                            address+= component.long_name;
                          }
                          if(value=="neighborhood"){
                            address+= component.long_name;
                          }
                          if(value=="sublocality_level_2"){
                            address+= component.long_name;
                          }
                          if(value=="sublocality_level_1"){
                            address+= component.long_name;
                          }
                          if(value=="locality"){
                            city+= component.long_name;
                          }
                          if(value=="administrative_area_level_1"){
                            state+= component.long_name;
                          }
                          if(value=="country"){
                            country+= component.long_name;
                          }
                          if(value=="postal_code"){
                            zip+= component.long_name;
                          }
                          if(value=="lat"){
                            lat+= component.long_name;
                          }
                          if(value=="lng"){
                            lng += component.long_name ;
                          }
                        })
                      });
                      document.getElementById('autocomplete').value=address;
                      document.getElementById('city').value=city;
                      document.getElementById('state').value=state;
                      document.getElementById('country').value=country;
                      document.getElementById('zip').value=zip;
                      document.getElementById('lat').value = place.geometry.location.lat();
                      document.getElementById('lng').value = place.geometry.location.lng();
                    }
                    function geolocate() {
                      if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                          var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                          };
                          var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                          });
                          autocomplete.setBounds(circle.getBounds());
                        });
                      }
                    }
                  </script>

                  @endpush

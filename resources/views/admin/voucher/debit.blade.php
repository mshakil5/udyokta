@extends('admin.layouts.admin')

@section('content')
@php
    $coas = \App\Models\ChartOfAccount::orderby('id','DESC')->get();
@endphp
<div class="container-xxl container-p-y">
    <div class="row" id="newBtnSection">
      <!-- Sales Overview -->
      <div class="col-lg-2 col-sm-6 mb-4">
        <button id="newBtn" type="button" class="btn btn-outline-primary waves-effect">Add New</button>
      </div>
    </div>
    

    <div class="card mb-4" id="addThisFormContainer">
        <h5 class="card-header">Add new debit voucher</h5>
        <div class="row">
          <div class="ermsg"></div>
        </div>
        <form class="card-body" id="createThisForm">
            @csrf

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="date">Date</label>
                <input type="date" id="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" />
              </div>
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="voucher_type">Voucher Type</label>
                <input type="text" id="voucher_type" class="form-control" name="voucher_type" value="Debit" readonly />
                <input type="hidden" id="codeid" class="form-control" name="codeid" />
              </div>
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="transaction_method_id">Credit Account Head</label>
                <select name="transaction_method_id" id="transaction_method_id" class="form-control">
                  <option value="">Select</option>
                  @foreach ($methods as $method)
                  <option value="{{$method->id}}">{{$method->name}}</option>
                  @endforeach
                  
                </select>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="description">Remarks</label>
                  <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
              </div>
            </div>

            


          <div class="row g-3">
            <div class="col-md-12">

              <table class="table">
                <thead>
                  <tr>
                    <th>Account Name</th>
                    <th>Ledger Comment</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="inner">
                  <tr>
                    <td>
                      <select name="chart_of_account_id" id="chart_of_account_id" class="form-control">
                        <option value=""></option>
                        @foreach ($coa as $coa)
                        <option value="{{$coa->id}}">{{$coa->account_name}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td><input type="text" id="comment" name="comment" class="form-control"></td>
                    <td><input type="text" id="amount" name="amount" class="form-control"></td>
                    <td><div style="color: white;  user-select:none;  padding: 5px;    background: red;    width: 45px;    display: flex;    align-items: center; margin-right:5px;   justify-content: center;    border-radius: 4px;   left: 4px;    top: 8px;" onclick="removeRow(event)" >X</div></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td><button id="addRowBtn" type="button" class="btn btn-outline-primary waves-effect addRowBtn">Add Row</button></td>
                    <td>Total</td>
                    <td><input type="text" id="total_amount" name="total_amount" class="form-control" readonly></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
              


            </div>
          </div>
          


          <div class="pt-4">
            <button type="button" id="addBtn" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="button" id="FormCloseBtn" class="btn btn-label-secondary">Cancel</button>
          </div>
        </form>
      </div>

    <div class="row"  id="contentContainer">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Debit Voucher</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Account Head</th>
                        <th>Sub Account Head</th>
                        <th>Account Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $data)
                    <tr>
                      <td style="text-align: center">{{ $key + 1 }}</td>
                      <td style="text-align: center">{{$data->account_head}}</td>
                      <td style="text-align: center">{{$data->sub_account_head}}</td>
                      <td style="text-align: center">{{$data->account_name}}</td>
                      <td style="text-align: center">{{$data->description}}</td>
                      
                      <td style="text-align: center">
                        <a id="EditBtn" rid="{{$data->id}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                          <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                          <path d="M16 5l3 3"></path>
                       </svg></a>
                        <a id="deleteBtn" rid="{{$data->id}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" stroke-width="0" fill="currentColor"></path>
                          <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                       </svg></a>

                      </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>


</div>

@endsection
@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
  $(document).ready(function () {
      $("#addThisFormContainer").hide();
      $("#newBtn").click(function(){
          clearform();
          $("#newBtn").hide(100);
          $("#newBtnSection").hide(100);
          $("#addThisFormContainer").show(300);

      });
      $("#FormCloseBtn").click(function(){
          $("#addThisFormContainer").hide(200);
          $("#newBtn").show(100);
          $("#newBtnSection").show(100);
          clearform();
      });

      function removeRow(event) {
          event.target.parentElement.parentElement.remove();
      }


        function clearfield(){
            $('#income_description').val('');
            $('#account_name').val('');
        }



      //header for csrf-token is must in laravel
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
      //
      var url = "{{URL::to('/admin/chart-of-account')}}";
      var upurl = "{{URL::to('/admin/chart-of-account-update')}}";
      // console.log(url);
      $("#addBtn").click(function(){
      //   alert("#addBtn");
          if($(this).val() == 'Create') {

              var form_data = new FormData();
              form_data.append("account_head", $("#account_head").val());
              form_data.append("sub_account_head", $("#sub_account_head").val());
              form_data.append("account_name", $("#account_name").val());
              form_data.append("description", $("#description").val());

              $.ajax({
                url: url,
                method: "POST",
                contentType: false,
                processData: false,
                data:form_data,
                success: function (d) {
                    if (d.status == 303) {
                        $(".ermsg").html(d.message);
                    }else if(d.status == 300){
                          $(".ermsg").html(d.message);
                          pagetop();
                          window.setTimeout(function(){location.reload()},2000)
                    }
                },
                error: function (d) {
                    console.log(d);
                }
            });
          }
          //create  end
          //Update
          if($(this).val() == 'Update'){

              var form_data = new FormData();
              form_data.append("account_head", $("#account_head").val());
              form_data.append("sub_account_head", $("#sub_account_head").val());
              form_data.append("account_name", $("#account_name").val());
              form_data.append("description", $("#description").val());
              form_data.append("codeid", $("#codeid").val());

              $.ajax({
                  url:upurl,
                  type: "POST",
                  dataType: 'json',
                  contentType: false,
                  processData: false,
                  data:form_data,
                  success: function(d){
                      console.log(d);
                      if (d.status == 303) {
                          $(".ermsg").html(d.message);
                          pagetop();
                      }else if(d.status == 300){
                          $(".ermsg").html(d.message);
                          window.setTimeout(function(){location.reload()},2000)
                      }
                  },
                  error:function(d){
                      console.log(d);
                  }
              });
          }
          //Update
      });
      //Edit
      $("#contentContainer").on('click','#EditBtn', function(){
          //alert("btn work");
          codeid = $(this).attr('rid');
          //console.log($codeid);
          info_url = url + '/'+codeid+'/edit';
          //console.log($info_url);
          $.get(info_url,{},function(d){
              populateForm(d);
              pagetop();
          });
      });
      //Edit  end

      
      //Delete
      $("#contentContainer").on('click','#deleteBtn', function(){
                if(!confirm('Sure?')) return;
                codeid = $(this).attr('rid');
                info_url = url + '/'+codeid;
                $.ajax({
                    url:info_url,
                    method: "GET",
                    type: "DELETE",
                    data:{
                    },
                    success: function(d){
                        if(d.success) {
                            alert(d.message);
                            location.reload();
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
            });
            //Delete


      function populateForm(data){
          $("#account_head").val(data.account_head);

          if( data.account_head == "Assets"){
                  $("#sub_account_head").html("<option value=''>Please Select</option><option value='Current Asset'>Current Asset</option><option value='Fixed Asset'>Fixed Asset</option>");
              } else if(data.account_head == "Expenses"){
                  $("#sub_account_head").html("<option value=''>Please Select</option><option value='Cost Of Good Sold'>Cost Of Good Sold</option><option value='Overhead Expense'>Overhead Expense</option>");
              }else if(data.account_head == "Income"){
                  $("#sub_account_head").html("<option value=''>Please Select</option><option value='Direct Income'>Direct Income</option><option value='Indirect Income'>Indirect Income</option>");
              }else if(data.account_head == "Liabilities"){
                  $("#sub_account_head").html("<option value=''>Please Select</option><option value='Current Liabilities'>Current Liabilities</option><option value='Long Term Liabilities'>Long Term Liabilities</option>");
              }else if(data.account_head == "Equity"){
                  $("#sub_account_head").html("<option value=''>Please Select</option><option value='Equity Capital'>Equity Capital</option><option value='Retained Earnings'>Retained Earnings</option>");
              }else{
                
              }
          $("#sub_account_head").val(data.sub_account_head);
          $("#account_name").val(data.account_name);
          $("#description").val(data.description);
          $("#codeid").val(data.id);
          $("#addBtn").val('Update');
          $("#addThisFormContainer").show(300);
          $("#newBtn").hide(100);
          $("#newBtnSection").hide(100);
      }
      function clearform(){
          $('#createThisForm')[0].reset();
          $("#addBtn").val('Create');
      }
      
  });

  $(document).ready(function () {
      $('#exdatatable').DataTable();
  });

      
</script>




@endsection
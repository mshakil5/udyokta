@extends('admin.layouts.admin')

@section('content')

<div class="container-xxl container-p-y">
    <div class="row">
      <!-- Sales Overview -->
      <div class="col-lg-2 col-sm-6 mb-4">
        <button type="button" class="btn btn-outline-primary waves-effect" id="newBtn">Add</button>
      </div>
    </div>
    <div class="row">
      <div class="ermsg"></div>
    </div>

    <div class="card mb-4" id="addThisFormContainer">
        <h5 class="card-header">Add new type</h5>
        <form class="card-body" id="createThisForm">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="name">Type</label>
              <input type="text" id="name" class="form-control" name="name" />
            </div>
          </div>
          <hr class="my-4 mx-n4" />
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
              <h3 class="card-title">All information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th style="text-align: center">ID</th>
                      <th style="text-align: center">Name</th>
                      <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $data)
                  <tr>
                      <td style="text-align: center">{{ $key+1 }}</td>
                      <td style="text-align: center">{{$data->name}}</td>
                      <td style="text-align: center">
                      <a id="deleteBtn" rid="{{$data->id}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 7h16"></path>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        <path d="M10 12l4 4m0 -4l-4 4"></path>
                     </svg></a>


                      {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                     </svg> --}}

                     

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

  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

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
          $("#addThisFormContainer").show(300);

      });
      $("#FormCloseBtn").click(function(){
          $("#addThisFormContainer").hide(200);
          $("#newBtn").show(100);
          clearform();
      });
      //header for csrf-token is must in laravel
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
      //
      var url = "{{URL::to('/admin/expense-type')}}";
      // console.log(url);
      $("#addBtn").click(function(){
      //   alert("#addBtn");
          if($(this).val() == 'Create') {
              var form_data = new FormData();
              form_data.append("name", $("#name").val());

              $.ajax({
                url: url,
                method: "POST",
                contentType: false,
                processData: false,
                data:form_data,
                success: function (d) {
                    if (d.status == 303) {
                      pagetop();
                        $(".ermsg").html(d.message);
                    }else if(d.status == 300){
                        $(".ermsg").html(d.message);
                      window.setTimeout(function(){location.reload()},2000)
                    }
                },
                error: function (d) {
                    console.log(d);
                }
            });
          }
          //create  end
          
      });
      
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
      
      function clearform(){
          $('#createThisForm')[0].reset();
          $("#addBtn").val('Create');
      }
  });

</script>
<script type="text/javascript">
  $(document).ready(function() {
      $("#account").addClass('active');
  });
</script>
@endsection
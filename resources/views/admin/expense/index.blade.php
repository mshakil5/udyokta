@extends('admin.layouts.admin')

@section('content')

<div class="container-xxl container-p-y">
    <div class="row">
      <!-- Sales Overview -->
      <div class="col-lg-2 col-sm-6 mb-4">
        <button type="button" class="btn btn-outline-primary waves-effect">Primary</button>
      </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Add new admin</h5>
        <form class="card-body">
            
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="multicol-username">Username</label>
              <input type="text" id="multicol-username" class="form-control" placeholder="john.doe" />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="multicol-email">Email</label>
              <div class="input-group input-group-merge">
                <input type="text" id="multicol-email" class="form-control" placeholder="john.doe"/>
              </div>
            </div>
          </div>
          <div class="pt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
          </div>
        </form>
      </div>

    <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
                
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
@endsection
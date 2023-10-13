@extends('admin.layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    

    <!-- Sales Overview -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <small class="d-block mb-1 text-muted">Sales Overview</small>
            <p class="card-text text-success">+18.2%</p>
          </div>
          <h4 class="card-title mb-1">$42.5k</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <div class="d-flex gap-2 align-items-center mb-2">
                <span class="badge bg-label-info p-1 rounded"
                  ><i class="ti ti-shopping-cart ti-xs"></i
                ></span>
                <p class="mb-0">Order</p>
              </div>
              <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
              <small class="text-muted">6,440</small>
            </div>
            <div class="col-4">
              <div class="divider divider-vertical">
                <div class="divider-text">
                  <span class="badge-divider-bg bg-label-secondary">VS</span>
                </div>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                <p class="mb-0">Visits</p>
                <span class="badge bg-label-primary p-1 rounded"><i class="ti ti-link ti-xs"></i></span>
              </div>
              <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">25.5%</h5>
              <small class="text-muted">12,749</small>
            </div>
          </div>
          <div class="d-flex align-items-center mt-4">
            <div class="progress w-100" style="height: 8px">
              <div
                class="progress-bar bg-info"
                style="width: 70%"
                role="progressbar"
                aria-valuenow="70"
                aria-valuemin="0"
                aria-valuemax="100"></div>
              <div
                class="progress-bar bg-primary"
                role="progressbar"
                style="width: 30%"
                aria-valuenow="30"
                aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Sales Overview -->
    

    
  </div>
</div>
<!-- / Content -->
@endsection

@section('script')


<script>
    
</script>

@endsection

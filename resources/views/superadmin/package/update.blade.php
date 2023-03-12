@include("superadmin.include.header");
@include("superadmin.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">Update Package</h4>
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>     
    @endif

    @if ($errors->any())
    <div class="alert alert-danger p-1 mt-2">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{url('/superadmin/package/'.$package->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <div class="row gy-4">
                                   
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Package Name*</label>
                                                <input type="text" class="form-control" name="package_name" placeholder="Package Name" value="{{ $package->package_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Duration (in Days)*</label>
                                                <input type="number" class="form-control" name="duration" placeholder="Duration (in Days)" value="{{ $package->duration }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Price*</label>
                                                <input type="number" step="any" class="form-control" name="price" placeholder="Enter Price" value="{{ $package->price }}"  required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">User's Limit*</label>
                                                <input type="number" class="form-control" name="user_limit" placeholder="User's Limit" value="{{ $package->user_limit }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Maximum No of Projects*</label>
                                                <input type="number" class="form-control" name="max_project" placeholder="Maximum No of Projects" value="{{ $package->max_project }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="placeholderInput" class="form-label">Active Permission*</label>
                                                <select class="form-control" name="active_status" required>
                                                    <option value="YES" {{ $package->active_status=='YES'?'selected':'' }}>YES</option>
                                                    <option value="NO" {{ $package->active_status=='NO'?'selected':'' }}>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-3 col-md-6 pt-4">
                                            <div class="form-floating">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include("superadmin.include.footer");
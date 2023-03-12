@include("backlinkmanager.include.header");
@include("backlinkmanager.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Backlink</h4>
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
                                <form action="{{ url('/backlinkmanager/backlink') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row gy-4">
                                   
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Project*</label>
                                            <Select class="form-control" name="project_id" required>
                                                <option value="">Select Project</option>
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Type*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter Type" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Keyword*</label>
                                            <Select class="form-control" name="keyword_id" required>
                                                <option value="">Select Keyword</option>
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Number of backlinks created for Keyword*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Number of backlinks created for Keyword" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Target URL*</label>
                                            <Select class="form-control" name="keyword_id" required>
                                                <option value="">Select Target URL</option>
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Number of backlinks created for Target URL*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Number of backlinks created for Target URL" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Backlink Website*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Backlink Website" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Number of Times backlink website used*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Number of Times backlink website used" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">DA*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter DA" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Email*</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Username*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter Username" required>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="placeholderInput" class="form-label">Password*</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input type="password" class="form-control pe-5 password-input" onpaste="return false" name="password"  placeholder="Create Password" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Backlink URL*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter Backlink URL" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Status*</label>
                                            <select class="form-control" name="status" required>
                                                <option value="YES">Select Status</option>
                                                <option value="YES">Approved</option>
                                                <option value="NO">Pending</option>
                                                <option value="NO">Indexed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Instructions*</label>
                                            <textarea id="editor" class="form-control" name="description" required> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Issues*</label>
                                            <textarea id="editor2" class="form-control" name="description" required> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Limitation*</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter Number of maximum backlinks" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <div>
                                            <label for="placeholderInput" class="form-label">How to Use*</label>
                                            <textarea id="editor3" class="form-control" name="description" required> </textarea>
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
@include("backlinkmanager.include.footer");
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
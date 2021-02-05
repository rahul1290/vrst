<!-- Begin page -->
<div id="layout-wrapper">

    <?php if(isset($topheader)){ print_r($topheader); }?>
    <!-- ========== Left Sidebar Start ========== -->
    <?php if(isset($sidebar_nav)) { print_r($sidebar_nav); }?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Task List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                    <li class="breadcrumb-item active">Task List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Upcoming</h4>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 60px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Skote Dashboard UI</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member">
                                                            <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
    
                                                        <a href="javascript: void(0);" class="team-member">
                                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-secondary font-size-11">Waiting</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                                                        <label class="custom-control-label" for="customCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a New Landing UI</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
    
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                        
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    3 +
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-primary font-size-11">Approved</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Skote Logo</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    F
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-secondary font-size-11">Waiting</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">In Progress</h4>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 60px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                                                        <label class="custom-control-label" for="customCheck4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Brand logo design</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-success font-size-11">Complete</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Blog Template UI</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    S
                                                                </span>
                                                            </div>
                                                        </a>

                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
    
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-warning font-size-11">Pending</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Completed</h4>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 60px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Redesign - Landing page</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    F
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-success font-size-11">Complete</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                                                        <label class="custom-control-label" for="customCheck7"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Multipurpose Landing</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-success font-size-11">Complete</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                        <label class="custom-control-label" for="customCheck8"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Blog Template UI</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
    
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    S
                                                                </span>
                                                            </div>
                                                        </a>

                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <span class="badge badge-pill badge-soft-success font-size-11">Complete</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Tasks</h4>

                                <div id="task-chart" class="apex-charts"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Recent Tasks</h4>

                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Brand logo design</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Blog Template UI</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    S
                                                                </span>
                                                            </div>
                                                        </a>

                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
    
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Redesign - Landing page</a></h5>
                                                </td>
                                                <td>
                                                    <div class="team">
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                        <a href="javascript: void(0);" class="team-member d-inline-block">
                                                            <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table responsive -->
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

    
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
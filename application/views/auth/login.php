<div class="home-btn d-none d-sm-block">
    <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary" style="background-color: rgb(22 245 7 / 25%)!important">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to VRST.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <!--<img src="assets/images/profile-img.png" alt="" class="img-fluid">-->
                                <img src="assets/images/logo.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div>
                            <a href="index.html">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/vnr-logo.png" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="<?= base_url('login');?>">

                                <div class="form-group">
                                    <label for="username">Identity</label>
                                    <input type="text" class="form-control" id="identity" name="identity" placeholder="Enter Identity" value="<?php echo set_value('identity'); ?>">
                                    <?php echo form_error('identity'); ?>
                                </div>
        
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    <?php echo form_error('password'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">User Type</label>
                                    <select class="form-control" id="usertype" name="usertype">
                                        <option value="">Select user type</option>
                                        <option value="distributor" <?php if(set_value('usertype') == 'distributor'){ echo 'selected'; }?>>Distributor</option>
                                        <option value="sale-agent" <?php if(set_value('usertype') == 'sale-agent'){ echo 'selected'; }?>>Sale Agent</option>
                                    </select>
                                    <?php echo form_error('usertype'); ?>
                                </div>
         
                                <div class="pt-2 mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
    
                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>
                    <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>

            </div>
        </div>
    </div>
</div>
    
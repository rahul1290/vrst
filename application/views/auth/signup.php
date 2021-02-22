<div class="home-btn d-none d-sm-block">
    <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<input type="hidden" id="base_url" value="<?php echo base_url();?>" />
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary" style="background-color: rgb(22 245 7 / 25%)!important">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Hello User !</h5>
                                    <p>Sign in to continue to VRST.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <!--<img src="assets/images/profile-img.png" alt="" class="img-fluid">-->
                                <img src="<?php echo  base_url(); ?>assets/images/logo.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div>
                            <a href="index.html">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="<?php echo  base_url(); ?>assets/images/vnr-logo.png" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2" id="userCheckForm">
                            <form class="form-horizontal" method="POST" action="#">
								<div class="form-group">
                                    <label for="userpassword">User Type</label>
                                    <select class="form-control" id="usertype" name="usertype">
                                        <option value="">Select user type</option>
                                        <option value="distributor" <?php if(set_value('usertype') == 'distributor'){ echo 'selected'; }?>>Distributor</option>
                                        <option value="sale-agent" <?php if(set_value('usertype') == 'sale-agent'){ echo 'selected'; }?>>Sale Agent</option>
                                    </select>
                                    <?php echo form_error('usertype'); ?>
                                </div>
								
                                <div class="form-group">
                                    <label for="username">Identity</label>
                                    <input type="text" class="form-control" id="identity" name="identity" placeholder="Enter Identity" value="<?php echo set_value('identity'); ?>">
                                    <?php echo form_error('identity'); ?>
                                </div>
        
         
                                <div class="pt-2 mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" id="submit" type="button">Check Eligibility</button>
                                </div>
                            </form>
                        </div>
						
						
						<div class="p-2" id="generatepasswordForm" style="display:none;">
                            <form class="form-horizontal" method="POST" action="<?= base_url('signup');?>">
								<div class="form-group">
                                    <label for="userpassword">Create Password</label>
                                    <input type="password" name="password" class="form-control" id="password" />
                                </div>
								
                                <div class="form-group">
                                    <label for="userpassword">Re-enter Password</label>
                                    <input type="password" name="repassword" class="form-control" id="repassword" />
                                </div>
        
         
                                <div class="pt-2 mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" id="resubmit" type="button">Generate Password</button>
                                </div>
                            </form>
                        </div>
						
    
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
        
		var baseUrl = $('#base_url').val();
		var identity;
		$(document).on('click','#submit',function(){
            if($('#usertype').val() != '' && $('#identity').val() != ''){
                $.ajax({
                    type: 'POST',
                    url : baseUrl + 'Auth/checkuser',
                    data : {
                        'usertype' : $('#usertype').val(),
                        'identity' : $('#identity').val()
                    },
                    dataType : 'json',
                    
                    success: function(response){
                        if(response.status == 200){
                            identity = response.data[0]['DealerId'];
                            $('#userCheckForm').hide(200);
                            $('#generatepasswordForm').show();
                        }
                        else {
                            alert(response.msg);
                        }
                    },
                });
            } else {
                alert('Please fill the all fields.');
            }
		});
		
		
		$(document).on('click','#resubmit',function(){
            if($('#password').val() == $('#repassword').val()){
                $.ajax({
                    type: 'POST',
                    url : baseUrl + 'Auth/generate_password',
                    data : {
                        'usertype' : $('#usertype').val(),
                        'identity' : $('#identity').val(),
                        'password' : $('#password').val(),
                        'userId' : identity
                    },
                    dataType : 'json',
                    
                    success: function(response){
                        if(response.status == 200){
                        	alert('You successfully generate your password. \n please login with same credentials.');
                            window.location.href = baseUrl + 'Auth/';
                        }
                        else {
                            alert(response.msg);
                        }
                    },
                });
            } else {
                alert('Password and Re-enter password not matched.\n please try again.');
            }
		});
		
		
	});
</script>
    
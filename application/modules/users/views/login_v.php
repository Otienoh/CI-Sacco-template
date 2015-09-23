<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
		<title>AdiSacco</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/fonts/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/theme_light.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/print.css" type="text/css" media="print"/>
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<style type="text/css">
	.alert{
		    padding-left: 15px;
		    padding-right: 15px;
		    padding-top: 8px;
		    padding-bottom: 8px;
		    margin-top: 0px;
	}
	</style>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example2">
		<div class="main-login col-sm-4 col-sm-offset-4">
			<div class="logo">ADI <i class="clip-network"></i> Sacco
			</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<center><?php echo $this->session->flashdata('success');?></center>
				<h3>Sign in to your account</h3>
				<p>
					Please enter your name and password to log in.
				</p>
				<form class="form-login" action="<?php echo base_url();?>users/authenticate"  method="post">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i>
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" id="username" placeholder="Username">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">

								<input type="password" class="form-control password" name="password" id="password" placeholder="Password">
								<i class="fa fa-lock"></i>
								<a class="forgot" href="<?php echo base_url();?>users/login/box-forgot">
									I forgot my password
								</a> </span>
						</div>
						<div class="form-actions">
							<label for="remember" class="checkbox-inline">
								<input type="checkbox" class="grey remember" id="remember" name="remember">
								Keep me signed in
							</label>
							<button type="submit" class="btn btn-bricky pull-right">
								Login <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<p style="color: red;"><?php if($this->session->flashdata('error')){echo $this->session->flashdata('error'); }?></p>
						<div class="new-account">
							Don't have an account yet?
							<a href="<?php echo base_url();?>users/login/box-register" class="register">
								Create an account
							</a>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: LOGIN BOX -->
			<!-- start: FORGOT BOX -->
			<div class="box-forgot">
				<h3>Forget Password?</h3>
				<p>
					Enter your e-mail address below to reset your password.
				</p>
				<form class="form-forgot">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" placeholder="Email">
								<i class="fa fa-envelope"></i> </span>
						</div>
						<div class="form-actions">
							<a href="<?php echo base_url();?>users/login/box-login" class="btn btn-light-grey go-back">
								<i class="fa fa-circle-arrow-left"></i> Back
							</a>
							<button type="submit" class="btn btn-bricky pull-right">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: FORGOT BOX -->
			<!-- start: REGISTER BOX -->
			<div class="box-register">
				<h3>Sign Up</h3>
				<p>
					Enter your personal details below:
				</p>
				<form class="form-register" method="post" action="<?php echo base_url();?>users/registration">
					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<input type="text" class="form-control" name="first_name" placeholder="First Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="ID_number" placeholder="ID Number">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="town" placeholder="Town">
						</div>
						<div class="form-group">
							<div>
								<label class="radio-inline">
									<input type="radio" class="grey" value="Male" name="gender">
									Male
								</label>
								<label class="radio-inline">
									<input type="radio" class="grey" value="Female" name="gender">
									Female
								</label>
							</div>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" id="email_registration" placeholder="Email">
								<i class="fa fa-envelope"></i>
								<div class="alert alert-danger" id="email_alert">
									<i class="fa fa-times-circle"></i> Email address already in use.
								</div>
							</span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" name="password_again" placeholder="Password Again">
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<div>
								<label for="agree" class="checkbox-inline">
									<input type="checkbox" class="grey agree" id="agree" name="agree">
									I agree to the Terms of Service and Privacy Policy
								</label>
							</div>
						</div>
						<div class="form-actions">
							<a href="<?php echo base_url();?>users/login/box-login" class="btn btn-light-grey go-back">
								<i class="fa fa-circle-arrow-left"></i> Back
							</a>
							<button type="submit" class="btn btn-bricky pull-right" id="registration_button">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- end: REGISTER BOX -->
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2015 &copy; Sacco System.
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?php echo base_url();?>assets/admin/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url();?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/less/less-1.5.0.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo base_url();?>assets/admin/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url();?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/js/login.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
				//Added function for the email use alert.
			    $('#email_alert').hide();
			    $('#email_registration').focusout(function(){
			        em = $(this).val();
			        $.get('<?php echo base_url();?>users/check_existing_email/'+em, function (data) {
			            obj = jQuery.parseJSON(data);
			            if (jQuery.isEmptyObject(obj)) {
			                $('#email_alert').hide();
			                $('#registration_button').removeAttr('disabled');
			            } else{
			                $('#email_alert').show();
			                $('#registration_button').attr('disabled', 'true');
			            }
			        });
			    }); 
			});
		</script>
	</body>
	


</html>
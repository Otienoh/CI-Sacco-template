<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
  .alert{
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 8px;
        padding-bottom: 8px;
        margin-top: 0px;
  }
  </style>
<div class="row">
	<div class="col-sm-12">
		<!-- start: FORM WIZARD PANEL -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Add New Manager Below
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
					</a>
					<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
						<i class="fa fa-wrench"></i>
					</a>
					<a class="btn btn-xs btn-link panel-refresh" href="#">
						<i class="fa fa-refresh"></i>
					</a>
					<a class="btn btn-xs btn-link panel-expand" href="#">
						<i class="fa fa-resize-full"></i>
					</a>
					<a class="btn btn-xs btn-link panel-close" href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url();?>admin/manager_registration" method="post" role="form" class="form-horizontal" id="form">
					
							<div class="form-group">
								<label class="col-sm-3 control-label">
									First Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Middle Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Last Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
								</div>
							</div>
							<div class="form-group">
								<div>
									<label class="col-sm-3 control-label">
										Gender <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
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
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									ID Number <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="ID_No" name="ID_No" placeholder="ID Number" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Title <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Email <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								</div>
								<div class="alert alert-danger" id="email_alert">
									<i class="fa fa-times-circle"></i> Email address already in use.
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Phone Number <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone NUmber" required>
								</div>
							</div>
						
							
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-8">
									<button type="submit" class="btn btn-blue next-step btn-block" id="registration_button">
										Add Manager <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</div>
				</form>
			</div>
		</div>
		<!-- end: FORM WIZARD PANEL -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#email_alert').hide();
          $('#email').focusout(function(){
              em = $(this).val();
              console.log(em);
              $.get('<?php echo base_url();?>users/check_existing_email/'+em, function (data) {
                  obj = jQuery.parseJSON(data);
                  console.log(obj);
                  if (jQuery.isEmptyObject(obj)) {
                      jQuery('#email_alert').hide();
                      jQuery('#registration_button').removeAttr('disabled');
                  } else{
                      jQuery('#email_alert').show();
                      jQuery('#registration_button').attr('disabled', 'true');
                  }
              });
          }); 
	});
</script>


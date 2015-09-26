<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
	<div class="col-sm-12">
		<!-- start: FORM WIZARD PANEL -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Form Wizard
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
				<form action="<?php echo base_url();?>users/complete_profile" method="post" role="form" class="smart-wizard form-horizontal" id="form">
					<div id="wizard" class="swMain">
						<ul>
							<li>
								<a href="#step-1">
									<div class="stepNumber">
										1
									</div>
									<span class="stepDesc"> Step 1
										<br />
										<small>Personal Information</small> </span>
								</a>
							</li>
							<li>
								<a href="#step-2">
									<div class="stepNumber">
										2
									</div>
									<span class="stepDesc"> Step 2
										<br />
										<small>Contact Information</small> </span>
								</a>
							</li>
							<li>
								<a href="#step-3">
									<div class="stepNumber">
										3
									</div>
									<span class="stepDesc"> Step 3
										<br />
										<small>Residence Information</small> </span>
								</a>
							</li>
							<li>
								<a href="#step-4">
									<div class="stepNumber">
										4
									</div>
									<span class="stepDesc"> Step 4
										<br />
										<small>Preview</small> </span>
								</a>
							</li>
						</ul>
						<div class="progress progress-striped active progress-sm">
							<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
								<span class="sr-only"> 0% Complete (success)</span>
							</div>
						</div>
						<div id="step-1">
							<h2 class="StepTitle">Personal Information</h2>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									First Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_details['first_name'];?>" disabled="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Middle Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $user_details['middle_name'];?>" disabled="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Last Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_details['last_name'];?>" disabled="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									ID Number <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="ID_No" name="ID_No" value="<?php echo $user_details['ID_No'];?>" disabled="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Occupation <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation">
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-8">
									<button class="btn btn-blue next-step btn-block">
										Next <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</div>
						</div>
						<div id="step-2">
							<h2 class="StepTitle">Contact Information</h2>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Email <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $user_details['email'];?>" disabled="true">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Phone Number <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Phone Number">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-3">
									<button class="btn btn-light-grey back-step btn-block">
										<i class="fa fa-circle-arrow-left"></i> Back
									</button>
								</div>
								<div class="col-sm-2 col-sm-offset-3">
									<button class="btn btn-blue next-step btn-block">
										Next <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</div>
						</div>
						<div id="step-3">
							<h2 class="StepTitle">Residence Information</h2>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									County <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="county" name="county" placeholder="County">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Town <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="town" name="town" placeholder="Town">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Residence <span class="symbol required"></span>
								</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="residence" name="residence" placeholder="Residence">
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-3">
									<button class="btn btn-light-grey back-step btn-block">
										<i class="fa fa-circle-arrow-left"></i> Back
									</button>
								</div>
								<div class="col-sm-2 col-sm-offset-3">
									<button class="btn btn-blue next-step btn-block">
										Next <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</div>
						</div>
						<div id="step-4">
							<h2 class="StepTitle">Details Preview</h2>
							<h3>Account</h3>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Email:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="email"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Phone Number:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="mobile_number"></p>
								</div>
							</div>
							<h3>Personal Information</h3>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									First Name:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="first_name"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Middle Name:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="middle_name"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Last Name:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="last_name"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									ID Number:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="ID_No"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Occupation:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="occupation"></p>
								</div>
							</div>
							<h3>Residence</h3>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									County:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="county"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Town:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="town"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Residence:
								</label>
								<div class="col-sm-7">
									<p class="form-control-static display-value" data-display="residence"></p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-8">
									<button type="submit" class="btn btn-success btn-block">
										Finish <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end: FORM WIZARD PANEL -->
	</div>
</div>


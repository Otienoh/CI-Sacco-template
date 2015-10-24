<div class="row">
	<div class="col-sm-12">
		<!-- start: SELECT BOX PANEL -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Fill in the Deposit details below
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
				<form action="<?php echo base_url();?>savings/add" method="post" role="form" class="form-horizontal" id="form">
					<div class="form-group">
						<label class="col-sm-2 symbol required" for="form-field-select-1">
							Method of Transfer
						</label>
						<div class="col-sm-9">
							<select name="client" id="form-field-select-1" class="form-control">
								<option value="" selected="true" disabled="true">Select Method of Transfer</option>
								<?php echo $saving_methods; ?>
							</select>
						</div>
					</div>
					<div class="form-group" id="bank-transfer">
						<label class="col-sm-2 symbol required" for="amount">
							Enter Account Number
						</label>
						<div class="col-sm-9">
							<input type="text" name="code_identifier_bank" id="code_identifier_bank" placeholder="Enter Account Number" class="form-control">
						</div>
					</div>
					<div id="mobile-transfer">
						<label class="col-sm-2 symbol required" for="form-field-select-1"></label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<div class="tabbable">
										<ul id="myTab" class="nav nav-tabs tab-bricky">
											<li class="active">
												<a href="#panel_mpesa" data-toggle="tab">
													<i class="green fa fa-home"></i> M-Pesa
												</a>
											</li>
											<li>
												<a href="#panel_airtel" data-toggle="tab">
													Airtel Money
												</a>
											</li>
											<li>
												<a href="#panel_orange" data-toggle="tab">
													Orange Money
												</a>
											</li>
																				
										</ul>
										<div class="tab-content">
											<div class="tab-pane in active" id="panel_mpesa">
												<p>
													Follow this to pay with M-PESA.
												</p>
												<div class="alert alert-info">
													<ol>
														<li>Go to M-PESA Menu</li>
														<li>Select <strong>Pay Bill</strong></li>
														<li>Enter <strong>530100</strong> as the <strong>Business Number</strong></li>
														<li>Enter <strong>613526</strong> as the <strong>Account Number</strong></li>
														<li>Enter the value amount to pay (NO COMMAS) e.g.: 3000 </li>
														<li>Enter your <strong>M-PESA PIN</strong></li>
														<li>Send the request</li>
														<li>Then Enter the confirmation code that you receive</li>
													</ol>
												</div>
											</div>
											<div class="tab-pane" id="panel_airtel">
												<p>
													Follow this to pay with Airtel-Money.
												</p>
												<div class="alert alert-info">
													<p>
														Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
													</p>
													<p>
														Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
													</p>
												</div>
											</div>
											<div class="tab-pane" id="panel_orange">
												<p>
													Follow this to pay with Orange-Money.
												</p>
												<div class="alert alert-info">
													<ol>
														<li>Go to Orange-Money Menu</li>
														<li>Select <strong>Payments</strong></li>
														<li>Select <strong>Pay Bill</strong></li>
														<li>Enter <strong>530100</strong> as the <strong>Business Number</strong></li>
														<li>Enter <strong>613526</strong> as the <strong>Bill Reference Number</strong></li>
														<li>Enter the value amount to pay (NO COMMAS) e.g.: 3000 </li>
														<li>Accept the confirmation dialog</li>
														<li>Enter your <strong>Orange-Money PIN</strong></li>
														<li>Send the request</li>
														<li>Then Enter the confirmation code that you receive</li>
													</ol>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 symbol required" for="amount">
							Enter Confirmation Code:
						</label>
						<div class="col-sm-9">
							<input type="text" name="code_identifier_moblie" id="code_identifier_mobile" placeholder="Enter Confirmation Code" class="form-control">
						</div>
					</div>
					</div>
					<br />
					<div class="form-group" id="amount">
						<label class="col-sm-2 symbol required" for="amount">
							Enter Amount
						</label>
						<div class="col-sm-9">
							<input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-9">
							<button type="submit" class="btn btn-success btn-block" id="submition">
								Complete Transaction <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end: SELECT BOX PANEL -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#mobile-transfer').hide();
		$('#bank-transfer').hide();
		$('#form-field-select-1').change(function(){
			value=$(this).val();
			if (value=='Mobile Transfer') {
				$('#mobile-transfer').show();
				$('#bank-transfer').hide();
			}else if(value=='Bank')
			{
				$('#bank-transfer').show();
				$('#mobile-transfer').hide();
			}
		});
	});
</script>
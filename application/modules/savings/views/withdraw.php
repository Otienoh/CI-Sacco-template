<div class="row">
	<div class="col-sm-12">
		<!-- start: SELECT BOX PANEL -->
		<div  class="alert alert-danger">
		<p style="color: red;"><?php if($this->session->flashdata('error')){echo $this->session->flashdata('error'); }?></p>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Fill in the Withdraw details below
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
				</div>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url();?>savings/withdraw_amount" method="post" role="form" class="form-horizontal" id="form">
					<div class="form-group">
						<label class="col-sm-2 symbol required" for="form-field-select-1">
							Method of Withdrawal
						</label>
						<div class="col-sm-9">
							<select name="client" id="form-field-select-1" class="form-control">
								<option value="" selected="true" disabled="true">Select Method of Withdrawal</option>
								<?php echo $withdrawal_methods; ?>
							</select>
						</div>
					</div>
					<div class="form-group" id="bank-transfer">
						<label class="col-sm-2 symbol required" for="code_identifier_bank">
							Enter Account Number
						</label>
						<div class="col-sm-9">
							<input type="text" name="code_identifier_bank" id="code_identifier_bank" placeholder="Enter Account Number" class="form-control">
						</div>
					</div>
					<div class="form-group" id="mobile-transfer">
						<label class="col-sm-2 symbol required" for="code_identifier_mobile">
							Enter Phone Number
						</label>
						<div class="col-sm-9">
							<input type="text" name="code_identifier_mobile" id="code_identifier_mobile" placeholder="Enter Phone Number" class="form-control">
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
								Complete Withdrawal <i class="fa fa-arrow-circle-right"></i>
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
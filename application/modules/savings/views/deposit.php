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
								<option value="Mpesa">MPesa</option>
								<option value="Bank">Bank</option>
								<option value="Cash">Cash</option>
							</select>
						</div>
					</div>
					<br />
					<div class="form-group">
						<label class="col-sm-2 symbol required" for="amount">
							Enter Amount
						</label>
						<div class="col-sm-9">
							<input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-9">
							<button type="submit" class="btn btn-success btn-block">
								Make Deposit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- end: SELECT BOX PANEL -->
	</div>
</div>
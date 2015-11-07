<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>


<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Loan Types
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
					<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
					<a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
					<a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
					<a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 space20">
						<div class="btn-group pull-right">
							<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
								Export <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu dropdown-light pull-right">
								<li>
									<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="3,4"> Save as PDF </a>
								</li>
								<li>
									<a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="3,4"> Save as CSV </a>
								</li>
								<li>
									<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4"> Export to Excel </a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
							<tr>
								<th>#</th>
								<th>Loan Type</th>
								<th>Interest Rate</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $loan_types; ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Add Loan Type
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
					<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
					<a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
				</div>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url();?>admin/add_loan_type" method="post" role="form" class="form-horizontal" id="form">
					<div class="form-group">
						
						<label class="col-sm-3 control-label">
							Loan Type Name <span class="symbol required"></span>
						</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="name" name="name" placeholder="Loan Type Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							Rate(%) <span class="symbol required"></span>
						</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="rate" name="rate" placeholder="Rate(%)" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">
							Description <span class="symbol required"></span>
						</label>
						<div class="col-sm-7">
							<textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
							<!-- <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" required> -->
						</div>
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Add Loan Type</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">Responsive</h4>
            </div>
            <form action="<?php echo base_url();?>admin/edit_loan_type" method="post" role="form" class="form-horizontal" id="form">
	            <div class="modal-body">
	                <div class="row">
	                    <div class="col-md-12">
	                    	<div class="form-group">
								<input type="hidden" id="edit_id" name="edit_id">
								<label class="col-sm-3 control-label">
									Loan Type Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="edit_name" name="edit_name" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Rate(%) <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="edit_rate" name="edit_rate" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Description <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<textarea type="text" class="form-control" id="edit_description" name="edit_description" rows="5"></textarea>
									<!-- <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" required> -->
								</div>
							</div>
						</div>
	                </div>
	            </div>
	            <div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-light-grey">
						Close
					</button>
					<button type="submit" class="btn btn-blue">
						Edit Loan Type
					</button>
				</div>
            </form>
        </div>
<!-- end: PAGE CONTENT-->
<script type="text/javascript">
// edit_loan_type(2,"Development",4.36,"This is a development loan as the name goes.");
	function edit_loan_type(id,name,rate,description)
	{
		
		$('#edit_id').val(id);
		$('#edit_name').val(name);
		$('#edit_rate').val(rate);
		$('#edit_description').val(description);
	}
</script>

<div class="row">
	<div class="col-md-12">
		<?php if($this->session->flashdata('block')){
		echo '<div  class="alert alert-danger">
					<p style="color: red;">'.$this->session->flashdata('block').'</p>
				</div>';
		}?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				List of Loans
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
								<th>Loan Amount</th>
								<th>Amount Repayable</th>
								<th>Amount Balance</th>
								<th>Loan Purpose</th>
								<th>Guarantor 1</th>
								<th>Guarantor 2</th>
								<th>Loan Status</th>
								<th>Paid Status</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $loans; ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
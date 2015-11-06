<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
  #button {
    padding-bottom: 0.5em;
  }
</style>

          <!-- start: PAGE CONTENT -->

          <div class="row">
            <div class="col-sm-9">
            
            </div>
             <!-- <button class="btn btn-danger">Decline Loan</button> -->
            <div class="col-sm-3" id="button">
              <?php echo $button;?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="clip-users"></i>
                  Loan Details
                  <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                      <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                      <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="">
                    <h4>Applicant`s Persoanal Information</h4>
                    <div>
                      <label>Applicant`s Number: </label>
                      <label><?php echo $loan_details[0]['member_id'];?></label>
                    </div>
                    <div>
                      <label>Applicant`s Name: </label>
                      <label><?php echo $loan_details[0]['middle_name']." ".$loan_details[0]['first_name']." ".$loan_details[0]['last_name'];?></label>
                    </div>
                    <div>
                      <label>Applicant`s Contact: </label>
                      <label><?php echo $loan_details[0]['mobile_number'];?></label>
                    </div>
                    <div>
                      <label>Applicant`s Town: </label>
                      <label><?php echo $loan_details[0]['town'];?></label>
                    </div>
                    <div>
                      <label>Applicant`s Income: </label>
                      <label><?php echo $loan_details[0]['month_income'];?></label>
                    </div>
                    <h4>Applicant`s Loan Information</h4>
                    <div>
                      <label>Loan Type: </label>
                      <label><?php echo $loan_details[0]['loan_type'];?></label>
                    </div>
                    <div>
                      <label>Loan Purpose: </label>
                      <label><?php echo $loan_details[0]['loan_purpose'];?></label>
                    </div>
                    <div>
                      <label>Date of Application: </label>
                      <label><?php echo $loan_details[0]['date_of_application'];?></label>
                    </div>
                    <div>
                      <label>Loan Amount: </label>
                      <label><?php echo $loan_details[0]['loan_amount'];?></label>
                    </div>
                    <div>
                      <label>Loan Repayment Installments: </label>
                      <label><?php echo $loan_details[0]['instalments'];?></label>
                    </div>
                    <?php
                      $class = '';
                      if ($loan_details[0]['status'] == 0) {
                        $class = 'label label-warning';
                        $text = 'PENDING';
                      } else if ($loan_details[0]['status'] == 1) {
                        $class = 'label label-success';
                        $text = 'APPROVED';
                      } else if ($loan_details[0]['status'] == 2) {
                        $class = 'label label-danger';
                        $text = 'REJECTED';
                      }
                    ?>
                    <div>
                      <label>Loan Status: <span class="<?php echo $class;?>"><?php echo $text;?></span></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-bars"></i>
                      Applicant Guarantors Information
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="">
                        <h4>Guarantor One</h4>
                        <div>
                          <label>Guarantor`s Name: </label>
                          <label><?php echo $guarantor_affirmation[0]['middle_name']." ".$guarantor_affirmation[0]['first_name']." ".$guarantor_affirmation[0]['last_name'];?></label>
                        </div>
                        <div>
                          <label>Contact Information: </label>
                          <label><?php echo $guarantor_affirmation[0]['mobile_number'];?></label>
                        </div>
                        <div>
                          <label>Savings Information: </label>
                          <label><?php echo $guarantor_affirmation[0]['current_savings'];?></label>
                        </div>
                        <div>
                          <label>Guarantor Status: </label>
                          <label><?php echo $guarantor_affirmation[0]['status'];?></label>
                        </div>
                        <h4>Guarantor Two</h4>
                        <div>
                          <label>Guarantor`s Name: </label>
                          <label><?php echo $guarantor_affirmation[1]['middle_name']." ".$guarantor_affirmation[1]['first_name']." ".$guarantor_affirmation[1]['last_name'];?></label>
                        </div>
                        <div>
                          <label>Contact Information: </label>
                          <label><?php echo $guarantor_affirmation[1]['mobile_number'];?></label>
                        </div>
                        <div>
                          <label>Savings Information: </label>
                          <label><?php echo $guarantor_affirmation[1]['current_savings'];?></label>
                        </div>
                        <div>
                          <label>Guarantor Status: </label>
                          <label><?php echo $guarantor_affirmation[1]['status'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="clip-pie"></i>
                      Applicant Savings Information
                      <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                          <i class="fa fa-wrench"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                          <i class="fa fa-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-close" href="#">
                          <i class="fa fa-times"></i>
                        </a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="flot-mini-container">
                        <div>
                          <label>Applicant`s Current Savings Amount: </label>
                          <label><?php //echo $savings[0]['savings'];?></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          </style>

          <div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">Repay Loan</h4>
            </div>
            <form action="<?php echo base_url();?>member/repay_loan/<?php echo $loan_details[0]['loan_id'];?>" method="post" role="form" class="form-horizontal" id="form">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                <label class="col-sm-3 control-label">
                  Loan Number: <span class="symbol required"></span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="edit_id" name="edit_id" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">
                  Amount Payable <span class="symbol required"></span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="amount_payable" name="amount_payable" disabled="true">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">
                  Amount to Repay: <span class="symbol required"></span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="edit_amount" name="edit_amount" placeholder="Enter Repayment Amount" required>
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
            Repay Loan
          </button>
        </div>
            </form>
        </div>
<!-- end: PAGE CONTENT-->
       <script>
        function repay(id,amount)
          {
            $('#edit_id').val(id);
            $('#amount_payable').val(amount);
          }
      </script>
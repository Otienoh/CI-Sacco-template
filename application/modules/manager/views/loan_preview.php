<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


         
          <!-- start: PAGE CONTENT -->
          <div class="row">
            <div class="col-sm-9"></div>
             <!-- <button class="btn btn-danger">Decline Loan</button> -->
            <div class="col-sm-3">
            <?php
              if($loan_details[0]['status']!=1){?>
              <a href="<?php echo base_url();?>manager/loan_clearance/<?php echo $loan_details[0]['loan_id'];?>/1"><button class="btn btn-success">Accept Loan</button></a>
            <?php
              } if($loan_details[0]['status']!=2){?>
              <a href="<?php echo base_url();?>manager/loan_clearance/<?php echo $loan_details[0]['loan_id'];?>/2"><button class="btn btn-danger">Reject Loan</button></a>
              <?php
                }
              ?>
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
       
          <!-- end: PAGE CONTENT-->
       <script>
      jQuery(document).ready(function() {
        Main.init();
        Index.init();
      });
    </script>
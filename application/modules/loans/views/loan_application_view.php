  <?php defined('BASEPATH') OR exit('No direct script access allowed');

   $array = array();
      
      foreach($maloantype as $row ){
      $array[$row->loan_type_id] = $row->name;

      }

  ?>
 
    <div class="row">
      <div class="col-sm-12">
        <!-- start: FORM WIZARD PANEL -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Loan Application
            <div class="panel-tools">
              <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
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
           <?php echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>',' </b></div>'); ?>
            <?php echo form_open('loans/submit',array('class'=>'smart-wizard form-horizontal','id'=>'form','role'=>'form'));?>
            <!-- <form action="#" role="form" class="smart-wizard form-horizontal" id="form"> -->
              <div id="wizard" class="swMain">
                <ul>
                  <li>
                    <a href="#step-1">
                      <div class="stepNumber">
                        1
                      </div>
                      <span class="stepDesc"> Step 1
                        <br />
                        <small>Loan Details</small> </span>
                      </a>
                    </li>
                    <li>
                      <a href="#step-2">
                        <div class="stepNumber">
                          2
                        </div>
                        <span class="stepDesc"> Step 2
                          <br />
                          <small>Loan Security</small> </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-3">
                          <div class="stepNumber">
                            4
                          </div>
                          <span class="stepDesc"> Step 3
                            <br />
                            <small>Confirmation</small> </span>
                          </a>
                        </li>
                      </ul>
                      <div class="progress progress-striped active progress-sm">
                        <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
                          <span class="sr-only"> 0% Complete (success)</span>
                        </div>
                      </div>
                      <div id="step-1">
                        <h2 class="StepTitle">Loan Details</h2>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Loan Amount <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                            <!-- <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Enter Loan Amount"> -->
                         <?php echo form_input(['name' => 'loan_amount', 'id' => 'loan_amount',  'value' => $loan_amount ,'class' => 'form-control', 'placeholder' => 'Enter Loan Amount']); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Loan Purpose <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                           <?php echo form_input(['name' => 'loan_purpose', 'id' => 'loan_purpose',  'value' => $loan_purpose ,'class' => 'form-control', 'placeholder' => 'Enter Loan Purpose']); ?>
                            <!-- <input type="text" class="form-control" id="loan_purpose" name="loan_purpose" placeholder="Enter Loan Purpose"> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Loan Type <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                           <!--  <select class="form-control" id="loan_type" name="loan_type">
                              <option value="">&nbsp;</option>
                              <option value="Development">Development Loan</option>
                              <option value="Emergency">Emergency Loan</option>
                            </select> -->
                          <?php echo form_dropdown('loan_type',$array , $loan_type, 'id="loan_type" class="form-control"');  ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Repayment Months <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                            <?php echo form_dropdown('months',$repayment_periods , $months, 'id="months" class="form-control"');  ?>
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
                        <h2 class="StepTitle">Loan Security</h2>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Monthly Net Income <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                            <?php echo form_input(['name' => 'month_income', 'id' => 'month_income',  'value' => $month_income ,'class' => 'form-control', 'placeholder' => 'Enter Monthly Net Income']); ?>
                            <!-- <input type="text" class="form-control" id="month_income" name="month_income" placeholder="Enter Monthly Net Income "> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Guarantor One <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                              <?php echo form_input(['name' => 'guarantor1', 'id' => 'guarantor1',  'value' => $guarantor1 ,'class' => 'form-control', 'placeholder' => 'Enter Member ID Guarantor', 'required' => 'true']); ?>
                              <div class="alert alert-danger" id="error1">
                                <button data-dismiss="alert" class="close">
                                  &times;
                                </button>
                                <i class="fa fa-times-circle"></i>
                                <strong>Error!</strong> Guarantor Entered above does not exist.
                              </div><!-- <input type="text" class="form-control" id="guarantor1" name="guarantor1" placeholder="Enter Guarantor One "> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Guarantor Two <span class="symbol required"></span>
                          </label>
                          <div class="col-sm-7">
                             <?php echo form_input(['name' => 'guarantor2', 'id' => 'guarantor2',  'value' => $guarantor2 ,'class' => 'form-control', 'placeholder' => 'Enter Member ID Guarantor', 'required' => 'true']); ?>
                            <div class="alert alert-danger" id="error2">
                                <button data-dismiss="alert" class="close">
                                  &times;
                                </button>
                                <i class="fa fa-times-circle"></i>
                                <strong>Error!</strong> Guarantor Entered above does not exist.
                              </div>
                              <div class="alert alert-danger" id="error3">
                                <button data-dismiss="alert" class="close">
                                  &times;
                                </button>
                                <i class="fa fa-times-circle"></i>
                                <strong>Error!</strong> You have entered similar Guarantor Numbers.
                              </div><!-- <input type="text" class="form-control" id="guarantor2" name="guarantor2" placeholder="Enter Guarantor Two "> -->
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-2 col-sm-offset-3">
                            <button class="btn btn-light-grey back-step btn-block">
                              <i class="fa fa-circle-arrow-left"></i> Back
                            </button>
                          </div>
                          <div class="col-sm-2 col-sm-offset-3">
                            <button class="btn btn-blue next-step btn-block" id="proceed2">
                              Next <i class="fa fa-arrow-circle-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle">Confirmation</h2>
                        <h3>Loan Details</h3>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Loan Amount:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="loan_amount"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Type:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="loan_type"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Purpose:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="loan_purpose"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Repayment Months:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="months"></p>
                          </div>
                        </div>
                        <h3>Loan Security</h3>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Monthly Income:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="month_income"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Guarantor 1:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="guarantor1"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            Guarantor 2:
                          </label>
                          <div class="col-sm-7">
                            <p class="form-control-static display-value" data-display="guarantor2"></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-2 col-sm-offset-8">
                          
                            <button class="btn btn-success btn-block" name="submit" type="submit">SUBMIT REQUEST <i class="fa fa-arrow-circle-right"></i></button>
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
          <script type="text/javascript">
          $(document).ready(function(){
            $('#error1').hide();
            $('#error2').hide();
            $('#error3').hide();

            $('#guarantor1').keyup(function(){
              id=$(this).val();
              if (id) {
                $.get('<?php echo base_url();?>loans/confirm_guarantor/'+id, function(data){
                obj = jQuery.parseJSON(data);
                if (obj[0]) {
                  $('#error1').hide();
                }else {
                  $('#error1').show();
                }
              });
              }             
            });
            $('#guarantor2').keyup(function(){
              id2=$(this).val();
              if (id2) {
                if (id2==id) {
                  $('#error3').show();
                  $('#proceed2').attr('disabled','true');
                }else{
                  $('#error3').hide();
                  $('#proceed2').removeAttr('disabled');
                }

                $.get('<?php echo base_url();?>loans/confirm_guarantor/'+id2, function(data){
                obj = jQuery.parseJSON(data);
                if (obj[0]) {
                  $('#error2').hide();
                }else {
                  $('#error2').show();
                }
              });
              }
            });

          });
          </script>
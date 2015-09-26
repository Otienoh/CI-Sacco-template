<?php 
	if ($this->session->userdata('user_type')==3 || $this->session->userdata('user_type')==2) {
	$path = $user_details['passport_images'];
	}?>
<style type="text/css">
    .image-holder
    {
        width: 100%;
        /*padding: 40px;*/
    }

    #imagePreview
    {
        margin: 0px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
        background-image: url('<?php if(isset($path)){echo $path;}?>');
    }
</style>
<div class="row">
	<div class="col-sm-12">
		
			<div class="tab-content">
				<!--  -->
				<div id="#" class="">
					<form action="<?php echo base_url();?>users/update_profile" method="post" role="form" id="form">
						<div class="row">
							<div class="col-md-12">
								<h3>Account Info</h3>
								<hr>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										First Name
									</label>
									<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_details['first_name']?>">
								</div>
								<div class="form-group">
									<label class="control-label">
										Middle Name
									</label>
									<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $user_details['middle_name']?>">
								</div>
								<div class="form-group">
									<label class="control-label">
										Last Name
									</label>
									<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_details['last_name']?>">
								</div>
								<div class="form-group">
									<label class="control-label">
										Email Address
									</label>
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $user_details['email']?>">
								</div>
								<?php if ($this->session->userdata('user_type')==3 || $this->session->userdata('user_type')==2) {?>
								<div class="form-group">
									<label class="control-label">
										Phone
									</label>
									<input type="text" class="form-control" id="phone" name="phone"  value="<?php echo $user_details['mobile_number']?>">
								</div>
								<?php } ?>
							</div>
							<div class="col-md-6">
								
								<?php 
									if($user_details['gender'] == 'Male'){$male_check = 'checked="checked"';$female_check = '';}
									else{$male_check = '';$female_check = 'checked="checked"';}
								?>
								<div class="form-group">
									<label class="control-label">
										Gender
									</label>
									<div>
										<label class="radio-inline">
											<input type="radio" class="grey" value="" name="gender" id="Female" <?php echo $female_check?>>
											Female
										</label>
										<label class="radio-inline">
											<input type="radio" class="grey" value="" name="gender"  id="Male" <?php echo $male_check?>>
											Male
										</label>
									</div>
								</div>
								<?php if ($this->session->userdata('user_type')==3) {?>
									<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label class="control-label">
												Occupation
											</label>
											<input class="form-control tooltips" name="occupation" id="occupation" placeholder="London (UK)" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top">
										</div>
									</div>
								</div>
								<?php } ?>
								<?php if ($this->session->userdata('user_type')==3 || $this->session->userdata('user_type')==2) {?>
								<div class="form-group">
									<label>
										Cover Photo:
									</label>
									<div class = "image-holder" id = 'imagePreview' style=""></div>
                                    <div class="col-sm-9"><input type = "file" class = "form-control" name = "cover" id = "uploadImage" required/></div>
                                </div>
                                <?php } ?>
							</div>
							</div>
						</div>
						<?php echo $additional_info;?>
						
						<div class="row">
							<div class="col-md-6">
								<p>
									By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
								</p>
							</div>
							<div class="col-md-4">
								<button class="btn btn-teal btn-block" type="submit">
									Update <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
				<!--  -->
			</div>
			<script type="text/javascript">

			</script>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		width = $('.image-holder').width();
        height = width - 300;
        width = height;
        // console.log(height);
        $('.image-holder').height(height);
        $('.image-holder').width(width);

        $(function() {
            $("#uploadImage").on("change", function()
            {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)  return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadstart = function(){
                        $("#imagePreview").text('Please Wait...');
                        $("#imagePreview").css("background-color", "rgba(0,0,0,0.8)");
                    }
                    reader.onloadend = function(){ // set image data as background of div
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").text('');
                    }
                }
            });
        });
	})
</script>
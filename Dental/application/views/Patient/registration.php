			

<div class="container">
	<div class="col-md-12">
					<div class="col-md-12">

						<ul class="breadcrumb">
							<li><a href="#">Patient</a>
							</li>
							<li>Registration</li>
						</ul>

					</div>
					<?php $this->load->view('SideBar'); ?>
                <div class="col-md-9">
                    <div class="box">
                        <h1>Patient</h1>


                        <hr>

                        <h3>Personal details</h3>
                        <form id ='patient' method=POST action="<?php echo base_url('index.php/Patient/treatment')?>">
                            <div class="row">
								<div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <select class="form-control" name='title'>
											<option value='select' <?php echo  set_select('title', 'select'); ?>>Select</option>
											<option value='Mr' <?php echo  set_select('title', 'Mr'); ?>>Mr</option>
											<option value='Ms' <?php echo  set_select('title', 'Ms'); ?>>Ms</option>
											<option value='Mrs' <?php echo  set_select('title', 'Mrs'); ?>>Mrs</option>
										</select>
                                    </div>
                                </div>
							</div>
							<div class='row'>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('firstname'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('lastname'); ?></span></label>
                                    </div>
                                </div>
								
                            </div>
							<div class="row">
                                
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="date">Date of Birth</label>
                                        <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dob" name='dob' value="<?php echo set_value('dob'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('dob'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="email">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name='occupation' value="<?php echo set_value('occupation'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('occupation'); ?></span></label>
                                    </div>
                                </div>
                                
								<div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <div class="radio">
										  <label><input type="radio" name="gender" value='Male' <?php echo  set_radio('gender', 'Male'); ?>>Male</label>
										
										  <label><input type="radio" name="gender" value='Female' <?php echo  set_radio('gender', 'Female'); ?>>Female</label>
										</div>
										<label > <span style="color:#d9534f;"><?php echo form_error('gender'); ?></span></label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="date" class='required'>Telephone</label>
                                        <input type="number" maxlength='10' class="form-control" id="phone" name='phone' value="<?php echo set_value('phone'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('phone'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name='email' value="<?php echo set_value('email'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('email'); ?></span></label>
                                    </div>
                                </div>
								<div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" rows="5" id="address" name='address' required><?php echo set_value('address'); ?></textarea>
										<label > <span style="color:#d9534f;"><?php echo form_error('Address'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
									<button type="reset" class="btn btn-primary"> Reset</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>		
				
	</div>
</div>
<script >
function getfunctiondetails(){
	var id=document.getElementById('searchid').value.toLowerCase();
	
	var res=id.split('p');
	//alert(parseInt(res[1]));
	$.post('<?php echo base_url('index.php/Patient/ajaxPatientDetails');?>',{postid:parseInt(res[1])},
		function(data)
		{
			if(data!='<label > <span style="color:#d9534f;">No result found</span></label>'){
				document.getElementById('pid').value=id;
			}	
			else{
				document.getElementById('pid').value='';
			}
					//alert('class deleted Successfully');
					document.getElementById('divpatientdetails').innerHTML = data;
									
		}
		);
	
}


function checkcauseot(ele){
	//alert(ele.value);
	var element=document.getElementById('othercause');
	if(ele.value=='other'){
		
		element.style.display = 'block'; 
	}else{
		
		element.style.display = 'none'; 
	}
	
	var divmotor=document.getElementById('divmotor');
	if(ele.value=='RTA:Motor bike'){
		
		divmotor.style.display = 'block'; 
	}else{
		
		divmotor.style.display = 'none'; 
	}
	
	var divvehicle=document.getElementById('divvehicle');
	if(ele.value=='RTA:Other vehicles'){
		
		divvehicle.style.display = 'block'; 
	}else{
		
		divvehicle.style.display = 'none'; 
	}
	
}

function showdrugall(ele){
	var txt=document.getElementById('txtda');
	if(ele.value=='yes'){
		
		txt.style.display = 'block'; 
	}else{
		
		txt.style.display = 'none'; 
	}
	
}
function showsmokingamt(ele){
	var txt=document.getElementById('smokingamt');
	if(ele.value=='yes'){
		
		txt.style.display = 'block'; 
	}else{
		
		txt.style.display = 'none'; 
	}
	
}
function showhealthy(ele){
	var txt=document.getElementById('txthealthy');
	if(ele.value=='no'){
		
		txt.style.display = 'block'; 
	}else{
		
		txt.style.display = 'none'; 
	}
	
}
</script>			

<div class="container">
	<div class="col-md-12">
					<div class="col-md-12">

						<ul class="breadcrumb">
							<li><a href="#">Patient</a>
							</li>
							<li><a href="#">Registration</a>
							</li>
							<li>Dental Trauma Assessment Form</li>
						</ul>

					</div>
					
                <div class="col-md-12">
                    <div class="box">
                        <h1>Dental Trauma Assessment Form</h1>


                        <hr>

                        <h3>Personal details</h3>
						<div class="clearfix" >

							
									<label for="title">Patient ID:</label>
									<div class="input-group col-sm-4">
										
										<input type="text" id='searchid' class="form-control" placeholder="Search P123456">
										<span class="input-group-btn">

										<button  class="btn btn-primary" onclick='getfunctiondetails()' id='btnsearch'><i class="fa fa-search"></i></button>

										</span>	
									</div>
				

						</div>
						<div  id='divpatientdetails'></div>
						
						<h3>Trauma details</h3>
						
                        <form id ='patient' method=POST action="<?php echo base_url('index.php/TraumaTreatment/formpage2')?>">
                            
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Patient ID</label>
                                        <input type="text"  class="form-control" id='pid' name='pid' readonly value="<?php echo set_value('pid'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('pid'); ?></span></label>
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Date of Trauma</label>
                                        <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dot" name='dot' value="<?php echo set_value('dot'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('dot'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tot">Time of Trauma</label>
                                        <input type="time" class="form-control" id="tot" name='tot' value="<?php echo set_value('tot'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('tot'); ?></span></label>
                                    </div>
                                </div>
                                
								<div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Cause of Trauma</label>
                                        <div class="radio">
										  <label><input type="radio" name="causeot" onclick='checkcauseot(this)' value='RTA:Motor bike' <?php echo  set_radio('causeot', 'RTA:Motor bike'); ?>>RTA:Motor bike</label>
										  <label><input type="radio" name="causeot" onclick='checkcauseot(this)' value='RTA:Other vehicles' <?php echo  set_radio('causeot', 'RTA:Other vehicles'); ?> >RTA:Other vehicles</label>
										  <label><input type="radio" name="causeot" onclick='checkcauseot(this)' value='Assaulted' <?php echo  set_radio('causeot', 'Assaulted'); ?> >Assaulted</label>
										  <label><input type="radio" name="causeot" onclick='checkcauseot(this)' value='Fallen' <?php echo  set_radio('causeot', 'Fallen'); ?> >Fallen</label>
										  <label><input type="radio" name="causeot" onclick='checkcauseot(this)' value='Hit over object' <?php echo  set_radio('causeot', 'Hit over object'); ?>>Hit over object</label>
										  <label><input type="radio" name="causeot"  onclick='checkcauseot(this)' value='other' <?php echo  set_radio('causeot', 'other'); ?>  >Other</label>
										</div>
										<textarea class="form-control" rows="5" id="othercause" name='othercause'  maxlength="150" style='display:none;'><?php echo set_value('othercause'); ?></textarea>
										<label > <span style="color:#d9534f;"><?php echo form_error('othercause').form_error('causeot').form_error('causeoth').form_error('causeotsb'); ?></span></label>
                                    </div>
									<div class="form-group" id= 'divmotor' style='display:none;'>
                                        <label>RTA: Helmet worn</label>
                                        <div class="radio">
										  <label><input type="radio" name="causeoth" value='yes' <?php echo  set_radio('causeoth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="causeoth"  value='no' <?php echo  set_radio('causeoth', 'no'); ?>>No</label>
										</div>										
                                    </div>
									<div class="form-group" id='divvehicle' style='display:none;'>
                                        <label>RTA: Seat belt worn</label>
                                        <div class="radio">
										  <label><input type="radio" name="causeotsb" value='yes' <?php echo  set_radio('causeotsb', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="causeotsb"  value='no' <?php echo  set_radio('causeotsb', 'no'); ?>>No</label>
										  
										</div>
                                    </div>
									<div class="form-group" id='divbit' style='display:block;'>
                                        <label>Bite disturbance</label>
                                        <div class="radio">
										  <label><input type="radio" name="causeotdb" value='yes' <?php echo  set_radio('causeotdb', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="causeotdb"  value='no' <?php echo  set_radio('causeotdb', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('causeotdb'); ?></span></label>
										  
										</div>
                                    </div>
                                </div>
							</div>	
							<h3>Medical History</h3>
							<div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="form-group" id= 'divhealthy' style='display:block;'>
                                        <label>Healthy :</label>
                                        <div class="radio">
										  <label><input type="radio" name="healthy" onchange='showhealthy(this)'  value='yes' <?php echo  set_radio('healthy', 'yes'); ?> >Yes</label>
										  <label><input type="radio" name="healthy" onchange='showhealthy(this)' value='no' <?php echo  set_radio('healthy', 'no'); ?>>No</label>
										</div>	
										<label > <span style="color:#d9534f;"><?php echo form_error('healthy').form_error('txthealthy'); ?></span></label>
										<textarea class="form-control" rows="5" id="txthealthy" name='txthealthy'  maxlength="150" style='display:none;'><?php echo set_value('txthealthy'); ?></textarea>
                                    </div>
                                </div>
								<div class="col-sm-4">
                                    <div class="form-group" id= 'divmotor' style='display:block;'>
                                        <label>Durg Allergies :</label>
                                        <div class="radio">
										  <label><input type="radio" name="drug" onchange='showdrugall(this)' value='yes'<?php echo  set_radio('drug', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="drug" onchange='showdrugall(this)' value='no'<?php echo  set_radio('drug', 'no'); ?>>No</label>
										</div>	
										<label > <span style="color:#d9534f;"><?php echo form_error('drug').form_error('txtda'); ?></span></label>
										<textarea class="form-control" rows="5" id="txtda" name='txtda'  maxlength="500" style='display:none;'><?php echo set_value('txtda'); ?> </textarea>
                                    </div>
                                </div>
								<div class="col-sm-4">
                                    <div class="form-group" id= 'divmotor' style='display:block;'>
                                        <label>Smoking :</label>
                                        <div class="radio">
										  <label><input type="radio" name="smoking" onchange='showsmokingamt(this)' value='yes' <?php echo  set_radio('smoking', 'yes'); ?>  >Yes</label>
										  <label><input type="radio" name="smoking" onchange='showsmokingamt(this)'  value='no' <?php echo  set_radio('smoking', 'no'); ?>  >No</label>
										</div>							
										<label > <span style="color:#d9534f;"><?php echo form_error('smoking').form_error('smokingamt'); ?></span></label>
										 <input type="number"  class="form-control"  id="smokingamt" name='smokingamt' placeholder='Amount' style='display:none;' value="<?php echo set_value('smokingamt'); ?>">
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
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
							<li><a href="#">Dental Trauma Assessment Form</a></li>
							<li>Examination</li>
						</ul>

					</div>
					
                <div class="col-md-12">
                    <div class="box">
                        <h1>Dental Trauma Assessment Form Page 2</h1>


                        <hr>

                 
						
						<div  id='divpatientdetails'></div>
						
						<h3>Avulsed Teeth</h3>
						
                        <form id ='patient' method=POST action="<?php echo base_url('index.php/TraumaTreatment/formpage2')?>">
                            
							<div class="row">
                            
                                
								<div class="col-sm-8">
                                    <input type="number"  class="form-control"  id="smokingamt" name='smokingamt' placeholder='Amount' style='display:none;' value="<?php echo set_value('smokingamt'); ?>">
									<div class="form-group" id= 'divavulsedteeeth'>
                                        <label>Avulsed Teeth</label>
                                        <div class="radio">
										  <label><input type="radio" name="avulsedteeeth" value='yes' <?php echo  set_radio('avulsedteeeth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="avulsedteeeth"  value='no' <?php echo  set_radio('avulsedteeeth', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('avulsedteeeth'); ?></span></label>
										</div>										
                                    </div>
									
									
									<div class="form-group" >
                                        <label>Where were the teeth found?</label>
                                        <div class="radio">
										  <label><input type="radio" name="causeotsb" value='yes' <?php echo  set_radio('causeotsb', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="causeotsb"  value='no' <?php echo  set_radio('causeotsb', 'no'); ?>>No</label>
										  
										</div>
                                    </div>
									<div class="form-group" style='display:block;'>
                                        <label>Where the teeth drity?</label>
                                        <div class="radio">
										  <label><input type="radio" name="drityteeth" value='yes' <?php echo  set_radio('drityteeth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="drityteeth"  value='no' <?php echo  set_radio('drityteeth', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('drityteeth'); ?></span></label>
										  
										</div>
                                    </div>
									<div class="form-group" style='display:block;'>
                                        <label>Storage medium</label>
                                        <div class="radio">
										  <label><input type="radio" name="storagemedium" value='milk' <?php echo  set_radio('storagemedium', 'milk'); ?>>Milk</label>
										  <label><input type="radio" name="storagemedium" value='saliva' <?php echo  set_radio('storagemedium', 'saliva'); ?>>Saliva</label>
										  <label><input type="radio" name="storagemedium" value='saline' <?php echo  set_radio('storagemedium', 'saline'); ?>>Saline</label>
										  <label><input type="radio" name="storagemedium" value='water' <?php echo  set_radio('storagemedium', 'water'); ?>>Water</label>
										  <label><input type="radio" name="storagemedium" value='dry' <?php echo  set_radio('storagemedium', 'dry'); ?>>Dry</label>
										  <label><input type="radio" name="storagemedium" value='insocket' <?php echo  set_radio('storagemedium', 'insocket'); ?>>In Socket</label>
										  
										  <label > <span style="color:#d9534f;"><?php echo form_error('storagemedium'); ?></span></label>
										  
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
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
var teeth = new Array();

function getteeth(id){
	
	var a=document.getElementById(id).innerHTML;
	for (i = 0; i < teeth.length; i++) { 
			if(teeth[i]==a){
				teeth.splice(i, 1);
				document.getElementById(id).className = "btn btn-success";
				document.getElementById('teeth').value=teeth.toString();
				return ;
			}
		}
		teeth.push(a);
		document.getElementById(id).className = "btn btn-danger";
		document.getElementById('teeth').value=teeth;
	//alert(document.getElementById('teeth').value);

}

function showteeth(id){
	var val=document.getElementById(id).value;
	//alert(val);
	if(val=='yes'){
		document.getElementById('divteeth').style.display='block';
	}
	else{
		document.getElementById('divteeth').style.display='none';
	}
}

$( document ).ready(function() {
    
    var str='<?php echo set_value('teeth'); ?>';
    var tooth=str.split(',');
    for(i=0; i<tooth.length; i++){
    	document.getElementById('btn'+tooth[i]).className = "btn btn-danger";
    	teeth.push(tooth[i]);
    	document.getElementById('divteeth').style.display='block';
    }

   // alert(tooth);
});

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
						
                        <form id ='patient' method=POST action="<?php echo base_url('index.php/TraumaTreatment/formpage3')?>" enctype="multipart/form-data">
						
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Patient ID</label>
                                        <input type="text"  class="form-control" id='pid' name='pid' readonly value="<?php echo $pid; ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('pid'); ?></span></label>
                                    </div>
                                </div>
							</div>
							<div class="row">                 
								<div class="col-sm-4">
                                    
									<div class="form-group" id= 'divavulsedteeeth'>
                                        <label>Avulsed Teeth</label>
                                        <div class="radio">
										  <label><input type="radio" name="avulsedteeeth" id='avulsedteeeth' onclick='showteeth(this.id)' value='yes' <?php echo  set_radio('avulsedteeeth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="avulsedteeeth" id='avulsedteeeth1' onclick='showteeth(this.id)' value='no' <?php echo  set_radio('avulsedteeeth', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('avulsedteeeth'); ?></span></label>
										</div>										
                                    </div>
								</div>
								<div class="col-sm-4">	
									
									<div class="form-group" >
                                        <label>Where were the teeth found?</label>
                                        <div class="radio">
										  <label><input type="radio" name="foundteeth" value='yes' <?php echo  set_radio('foundteeth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="foundteeth"  value='no' <?php echo  set_radio('foundteeth', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('foundteeth'); ?></span></label>
										</div>
										</div>
                                    </div>
							</div>
							<div class="row" id='divteeth' style='display: none;'>
								Click the Avulsed Teeth<br/>
								<div>
								<button  class="btn btn-success" id='btn13' onclick='getteeth(this.id); return false;'>13</button>
								<button  class="btn btn-success" id='btn12' onclick='getteeth(this.id); return false;'>12</button>
								<button  class="btn btn-success" id='btn11' onclick='getteeth(this.id); return false;'>11</button>
								<button  class="btn btn-success" id='btn21' onclick='getteeth(this.id); return false;' >21</button>
								<button  class="btn btn-success" id='btn22' onclick='getteeth(this.id); return false;'>22</button>
								<button  class="btn btn-success" id='btn23' onclick='getteeth(this.id); return false;' >23</button>
								<br/>
								<button  class="btn btn-success" id='btn43' onclick='getteeth(this.id); return false;'>43</button>
								<button  class="btn btn-success" id='btn42' onclick='getteeth(this.id); return false;'>42</button>
								<button  class="btn btn-success" id='btn41' onclick='getteeth(this.id); return false;'>41</button>
								<button  class="btn btn-success" id='btn31' onclick='getteeth(this.id); return false;'>31</button>
								<button  class="btn btn-success" id='btn32' onclick='getteeth(this.id); return false;'>32</button>
								<button  class="btn btn-success" id='btn33' onclick='getteeth(this.id); return false;'>33</button>
								<input type="hidden" name="teeth"  value='<?php echo set_value('teeth'); ?>' id='teeth'>
								</div>
							</div>	
							<div class="row">
                                
								<div class="col-sm-4">
								<label>Medications</label>
								<textarea class="form-control" rows="5" id="Medications" name='Medications'  maxlength="150" ><?php echo set_value('Medications'); ?></textarea>
								<label > <span style="color:#d9534f;"><?php echo form_error('Medications'); ?></span></label>
                                </div>
                                
                            </div>
							<div class="row">  
								<div class="col-sm-4">	
									<div class="form-group" style='display:block;'>
                                        <label>Where the teeth drity?</label>
                                        <div class="radio">
										  <label><input type="radio" name="drityteeth" value='yes' <?php echo  set_radio('drityteeth', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="drityteeth"  value='no' <?php echo  set_radio('drityteeth', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('drityteeth'); ?></span></label>
										  
										</div>
                                    </div>
								</div>
								<div class="col-sm-6 ">	
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
							<div class="row">
								<div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="tot">Extra oral dry time</label>
                                        <input type="number"  style='width:50px;' id="drytimehrs" name='drytimehrs' value="<?php echo set_value('drytimehrs'); ?>">:
                                        <input type="number"  style='width:50px;' id="drytimemin" name='drytimemin' value="<?php echo set_value('drytimemin'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('drytimehrs').form_error('drytimemin'); ?></span></label>
                                    </div>
                                </div>
								<div class="col-sm-4">	
									<div class="form-group" style='display:block;'>
                                        <label>Replanted ?</label>
                                        <div class="radio">
										  <label><input type="radio" name="replanted" value='yes' <?php echo  set_radio('replanted', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="replanted"  value='no' <?php echo  set_radio('replanted', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('replanted'); ?></span></label>
										  
										</div>
                                    </div>
								</div>
								
							</div>
							<h3>Extra Oral Examination</h3>
							<div class="row">
                                <div class="col-sm-4">
								<label>Image of Face</label>
								<input type="file" name="pic" class="form-control" accept="image/*">
								
								</div>
								<div class="col-sm-4">
								<label>Extra Oral Examination Description</label>
								<textarea class="form-control" rows="5" id="imagediscription" name='imagediscription'  maxlength="150" ><?php echo set_value('imagediscription'); ?></textarea>
								<label > <span style="color:#d9534f;"><?php echo form_error('imagediscription'); ?></span></label>
                                </div>
                                
                            </div>
							
							<h3>Intra oral Examinatiom</h3>
							<div class="row">
                                <div class="col-sm-4">
									<div class="form-group" style='display:block;'>
                                        <label>Oral Hygiene</label>
                                        <div class="radio">
										  <label><input type="radio" name="oralhygiene" value='good' <?php echo  set_radio('oralhygiene', 'good'); ?>>Yes</label>
										  <label><input type="radio" name="oralhygiene" value='fair' <?php echo  set_radio('oralhygiene', 'fair'); ?>>Yes</label>
										  <label><input type="radio" name="oralhygiene"  value='poor' <?php echo  set_radio('oralhygiene', 'poor'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('oralhygiene'); ?></span></label>
										  
										</div>
                                    </div>
								
								</div>
								<div class="col-sm-4">
									<div class="form-group" style='display:block;'>
                                        <label>Actice periodontal disease</label>
                                        <div class="radio">
										  <label><input type="radio" name="periodontald" value='yes' <?php echo  set_radio('periodontald', 'yes'); ?>>Yes</label>
										  <label><input type="radio" name="periodontald"  value='no' <?php echo  set_radio('periodontald', 'no'); ?>>No</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('periodontald'); ?></span></label>
										  
										</div>
                                    </div>
								
                                </div>
                                
                            </div>
							<div class="row">
							<div class="col-sm-8 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>     
									<button type="reset" class="btn btn-primary"> Reset</button>

                             </div>
                             </div>
                        </form>
                    </div>
                </div>		
				
	</div>
</div>
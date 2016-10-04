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
var teeth = new Array(0,0,0,0,0,
					0,0,0,0,0,
					0,0,0,0,0,
					0,0,0,0,0);
var current='-1';
var currentid=0;
function getteeth(id){
	currentid=id;
	var tee=document.getElementById(id).value
	current= --tee;
	//alert(current);
	$('#myModal').modal('show');
	


}
function setteeth(ele){
 	var digo=ele.innerHTML;
 	var di=digo.split('.');
 	
 	teeth[current]=di[0];
 	alert(teeth);
 	if(di[0]=='0'||di[0]==0){
 		document.getElementById(currentid).className = "btn btn-default  col-sm-1";
 		document.getElementById(currentid).innerHTML = currentid.substring(3);
 		//document.getElementById(currentid).innerHTML = currentid.split('btn')[1] + di[0];
 	}else{
 		document.getElementById(currentid).className = "btn btn-warning  col-sm-1";
 		document.getElementById(currentid).innerHTML = currentid.substring(3)+'('+di[0]+')';
 	}
	document.getElementById('teeth').value=teeth;
	//	document.getElementById('teeth').value=teeth;
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
    submitform();
    var str='<?php echo set_value('teeth'); ?>';
    var tooth=str.split(',');
    for(i=0; i<tooth.length; i++){
    	//document.getElementById('btn'+tooth[i]).className = "btn btn-danger  col-sm-1";
    	//	teeth.push(tooth[i]);
    	document.getElementById('divteeth').style.display='block';
    }

   // alert(tooth);
});

</script>
<script type="text/javascript">
 
function submitform(){

	$('#patient').submit(function(e){
		e.preventDefault();
		

		var me =$(this);
		$.ajax({
			url:me.attr('action'),
			type:'post',
			data:new FormData(this),
			dataType:'json',
			async: false,
			cache: false,
      		contentType: false,
      		processData: false,
			success: function(response){
				if(response.success==true){
					$('#modelmsg').modal('show')  ; 
					$('.form-group').removeClass('has-error').removeClass('has-success');
					$('.text-danger').remove();
					me[0].reset();//loadAssignmenttable();
					window.location.replace("<?php echo base_url('index.php/TraumaTreatment/trauma_profile/')?>"+1);

				}
				else{
					
					$.each(response.messages, function(key,value){
						var element = $ ('#'+ key);
						element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length >0 ? 'has-error':'has-success')
						.find('.text-danger').remove();
						element.after(value);
					});
				}


			}
		})

		}

	);
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
                        <h1>Dental Trauma Assessment Form Page 3</h1>
                        <hr>

						<div  id='divpatientdetails'></div>
						
						<h3>TRAUMATIZED Teeth</h3>
						
                        <form id ='patient' method=POST action="<?php echo base_url('index.php/TraumaTreatment/vaildatepage3')?>" enctype="multipart/form-data">
						
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Patient ID</label>
                                        <input type="text"  class="form-control" id='pid' name='pid' readonly value="<?php echo $pid; ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('pid'); ?></span></label>
                                    </div>
                                </div>
							</div>

							<div class="row" id='divteeth' >
								Teeth<br>
								<button  class="btn btn-default col-sm-1" id='btn15' value='1' onclick='getteeth(this.id); return false;'>15</button>
								<button  class="btn btn-default col-sm-1" id='btn14' value='2' onclick='getteeth(this.id); return false;'>14</button>
								<button  class="btn btn-default col-sm-1" id='btn13' value='3' onclick='getteeth(this.id); return false;'>13</button>
								<button  class="btn btn-default col-sm-1" id='btn12' value='4' onclick='getteeth(this.id); return false;'>12</button>
								<button  class="btn btn-default col-sm-1" id='btn11' value='5' onclick='getteeth(this.id); return false;'>11</button>
								<button  class="btn btn-default col-sm-1" id='btn21' value='6' onclick='getteeth(this.id); return false;' >21</button>
								<button  class="btn btn-default col-sm-1" id='btn22' value='7' onclick='getteeth(this.id); return false;'>22</button>
								<button  class="btn btn-default col-sm-1" id='btn23' value='8' onclick='getteeth(this.id); return false;' >23</button>
								<button  class="btn btn-default col-sm-1" id='btn24' value='9' onclick='getteeth(this.id); return false;' >24</button>
								<button  class="btn btn-default col-sm-1" id='btn25' value='10' onclick='getteeth(this.id); return false;' >25</button>
								<br><br>
								<button  class="btn btn-default col-sm-1" id='btn45' value='11' onclick='getteeth(this.id); return false;'>44</button>
								<button  class="btn btn-default col-sm-1" id='btn44' value='12' onclick='getteeth(this.id); return false;'>45</button>
								<button  class="btn btn-default col-sm-1" id='btn43' value='13' onclick='getteeth(this.id); return false;'>43</button>
								<button  class="btn btn-default col-sm-1" id='btn42' value='14' onclick='getteeth(this.id); return false;'>42</button>
								<button  class="btn btn-default col-sm-1" id='btn41' value='15' onclick='getteeth(this.id); return false;'>41</button>
								<button  class="btn btn-default col-sm-1" id='btn31' value='16' onclick='getteeth(this.id); return false;'>31</button>
								<button  class="btn btn-default col-sm-1" id='btn32' value='17' onclick='getteeth(this.id); return false;'>32</button>
								<button  class="btn btn-default col-sm-1" id='btn33' value='18' onclick='getteeth(this.id); return false;'>33</button>
								<button  class="btn btn-default col-sm-1" id='btn34' value='19' onclick='getteeth(this.id); return false;'>34</button>
								<button  class="btn btn-default col-sm-1" id='btn35' value='20' onclick='getteeth(this.id); return false;'>35</button>
								<br>
								
								        <label class="  col-sm-4"   > 1.Infaction</label>
								        <label class="col-sm-4"    > 2.Enamel</label>
								        <label class=" col-sm-4"    > 3.Enamel Dentin</label>
								        <label class="col-sm-4"     > 4.Enamel Dentin Pulp</label>
								        <label class="col-sm-4"     > 5.Enamel Dentin Pulp</label>
								        <label class=" col-sm-4"     > 6.Crown-root (uncomplicated)</label>
								        <label class="col-sm-4"     > 7.Crown-root (complicated)</label>
								        <label class="col-sm-4"     > 8.Root apical/mid coronal</label>
								        <label class="col-sm-4"     > 9.Dento alveolar</label>
								        <label class="col-sm-4"     > 10.Concussion</label>
								        <label class="col-sm-4"     > 11.Sub-luxation</label>
								        <label class="col-sm-4"     > 12.Extrusion</label>
								        <label class="col-sm-4"     > 13.Lateral Luxation</label>
								        <label class="col-sm-4"     > 14.Intrusion</label>
								        <label class="col-sm-4"     > 15.Avulsion</label>
								        <label class="col-sm-4"     > 16.Other</label>
								        <label class="col-sm-4"  > 0.none</label>
								<input type="text" name="teeth"  value='<?php echo set_value('teeth'); ?>' id='teeth'>
								
							</div>	

							<h3>Radiographic Examinations</h3>
							<div class="row">
                                <div class="col-sm-4 form-group">
								<label>X ray</label>
								<input type="file" name="pic" class="form-control" accept="image/*">
								<div class="form-group">
									  <label><input type="checkbox"  name ='xrayissues[] ' value="IOPA">IOPA</label>
									  <label><input type="checkbox"  name ='xrayissues[] ' value="Bite wing">Bite wing</label>
									  <label><input type="checkbox"  name ='xrayissues[] ' value="U.S Occlusal">U.S Occlusal</label>
									  <label><input type="checkbox"  name ='xrayissues[] ' value="L.S Occlusal">L.S Occlusal</label>
									  <label><input type="checkbox"  name ='xrayissues[] ' value="Soft tissue">Soft tissue</label>
								</div>
								
								</div>
								<div class="col-sm-4">
								<label>Finding</label>
								<textarea class="form-control" rows="5" id="finding" name='finding'  maxlength="150" ><?php echo set_value('finding'); ?></textarea>
								<label > <span style="color:#d9534f;"><?php echo form_error('finding'); ?></span></label>
                                </div>
                                
								<div class="col-sm-4">
								<label>Diagnosis</label>
								<textarea class="form-control" rows="5" id="diagnosis" name='diagnosis'  maxlength="150" ><?php echo set_value('diagnosis'); ?></textarea>
								<label > <span style="color:#d9534f;"><?php echo form_error('diagnosis'); ?></span></label>
                                </div>
                                
                            </div>
							
							<h3>Plan</h3>
							<div class="row">
                                <div class="col-sm-4">
									<div class="form-group" style='display:block;'>
                                        <label>Prognosis</label>
                                        <div class="form-group">
										  <label><input type="radio" name="prognosis" value='good' <?php echo  set_radio('prognosis', 'good'); ?>>Good</label>
										  <label><input type="radio" name="prognosis" value='fair' <?php echo  set_radio('prognosis', 'fair'); ?>>Fair</label>
										  <label><input type="radio" name="prognosis"  value='poor' <?php echo  set_radio('prognosis', 'poor'); ?>>Poor</label>
										  <label > <span style="color:#d9534f;"><?php echo form_error('prognosis'); ?></span></label>
										  
										</div>
                                </div>
								
								</div>
								<div class="col-sm-4">
								<label>Plan</label>
								<textarea class="form-control" rows="5" id="plan" name='plan'  maxlength="150" ><?php echo set_value('plan'); ?></textarea>
								<label > <span style="color:#d9534f;"><?php echo form_error('plan'); ?></span></label>
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




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select </h4>
      </div>
      <div class="modal-body">
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>1.Infaction</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>2.Enamel</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>3.Enamel Dentin</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>4.Enamel Dentin Pulp</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>5.Enamel Dentin Pulp</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>6.Crown-root (uncomplicated)</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>7.Crown-root (complicated)</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>8.Root apical/mid coronal</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>9.Dento alveolar</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>10.Concussion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>11.Sub-luxation</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>12.Extrusion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>13.Lateral Luxation</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>14.Intrusion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>15.Avulsion</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>16.Other</button>
        <button class="btn btn-default" data-dismiss="modal" onclick='setteeth(this)'>0.none</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="modelmsg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message </h4>
      </div>
      <div class="modal-body">
			Informatio Saved Successfully...!

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
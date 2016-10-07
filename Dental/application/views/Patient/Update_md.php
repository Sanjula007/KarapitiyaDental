<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    submitformmd();

});

  
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

    function showupmd(){

        $('#updatemd').modal('show');
        if("<?php echo $trauma_medical_details[0]->healthy;?>"=="yes"){
          radiobtn = document.getElementById("healthyyes");
        radiobtn.checked = true;
        }else if("<?php echo $trauma_medical_details[0]->healthy;?>"=="no"){
          radiobtn = document.getElementById("healthyno");
          radiobtn.checked = true;
          var txt=document.getElementById('txthealthy');
          txt.style.display = 'block';
        }

        if("<?php echo $trauma_medical_details[0]->allergies;?>"=="yes"){
          radiobtn = document.getElementById("drugyes");
          radiobtn.checked = true;
          var txt=document.getElementById('smokingamt');
           txt.style.display = 'block';
        }else if("<?php echo $trauma_medical_details[0]->allergies;?>"=="no"){
          radiobtn = document.getElementById("drugno");
        radiobtn.checked = true;
        }

        if("<?php echo $trauma_medical_details[0]->smoking;?>"=="yes"){
          radiobtn = document.getElementById("smokingyes");
          radiobtn.checked = true;
          var txt=document.getElementById('smokingamt');    
          txt.style.display = 'block';
        }else if("<?php echo $trauma_medical_details[0]->smoking;;?>"=="no"){
          radiobtn = document.getElementById("smokingno");
        radiobtn.checked = true;
        }
    }



</script>
<script type="text/javascript">
 
function submitformmd(){

  $('#upmdform').submit(function(e){
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
          //$('#modelmsg').modal('show')  ; 
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('.text-danger').remove();
          me[0].reset();//loadAssignmenttable();
         // window.location.replace("<?php echo base_url('index.php/TraumaTreatment/trauma_profile/')?>"+1);

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

 
<!-- Modal -->
<div id="updatemd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Medical History</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
			     
              
            <form id ='upmdform' method=POST action="<?php echo base_url('index.php/TraumaTreatment/updatemedicaldetails')?>">                   
                <div class="col-sm-4">
                  <div class="form-group" id= 'divhealthy' style='display:block;'>
                    <label>Healthy :</label>
                     <div class="radio">
                      <label><input type="radio" name="healthy" id="healthyyes" onchange='showhealthy(this)'  value='yes'  >Yes</label>
                      <label><input type="radio" name="healthy" id="healthyno" onchange='showhealthy(this)' value='no'>No</label>
                    </div>  
                    <textarea class="form-control" rows="5" id="txthealthy" name='txthealthy'  maxlength="150" style='display:none;'><?php echo $trauma_medical_details[0]->healthy_details;?></textarea>
                                    </div>
                                </div>
                <div class="col-sm-4">
                  <div class="form-group" id= 'divmotor' style='display:block;'>
                    <label>Durg Allergies :</label>
                      <div class="radio">
                      <label><input type="radio" name="drug" id="drugyes" onchange='showdrugall(this)' value='yes'>Yes</label>
                      <label><input type="radio" name="drug" id="drugno" onchange='showdrugall(this)' value='no'>No</label>
                    </div>  
                    <textarea class="form-control" rows="5" id="txtda" name='txtda'  maxlength="500" style='display:none;'><?php echo $trauma_medical_details[0]->allergies_details;?></textarea>
                                    </div>
                                </div>
                <div class="col-sm-4">
                  <div class="form-group" id= 'divmotor' style='display:block;'>
                    <label>Smoking :</label>
                    <div class="radio">
                      <label><input type="radio" name="smoking" id="smokingyes" onchange='showsmokingamt(this)' value='yes' >Yes</label>
                      <label><input type="radio" name="smoking" id="smokingno" onchange='showsmokingamt(this)'  value='no' >No</label>
                    </div>              
                     <input type="number"  class="form-control"  id="smokingamt" name='smokingamt' placeholder='Amount' style='display:none;' value='<?php echo $trauma_medical_details[0]->smoking_number;?>'>
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update </button>
                  <button type="reset" class="btn btn-primary"> Reset</button>

                </div></form>

      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
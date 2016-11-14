
<script type="text/javascript">
$( document ).ready(function() {
    submitformxray();

});


    function showupxray(){

        $('#updatexray').modal('show');
        var issuses='<?php echo  $trauma_teeth_details[0]->xrayissues;?>';
        var res= issuses.split(',');
        for (i = 0; i < res.length; i++) { 
            $(":checkbox[name='xrayissues[]'][value='"+res[i]+"']").attr('checked', true);
         }
          
       
        

    }



</script>
<script type="text/javascript">
 
function submitformxray(){

  $('#upxrayform').submit(function(e){
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
<div id="updatexray" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">X-ray details</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
			     
              
            <form id ='upxrayform' method=POST action="<?php echo base_url('index.php/TraumaTreatment/updatexray')?>">                   
              <div class="col-sm-12">
                <div class="col-md-12">  
                            <img src="<?php echo base_url('uploads/patientimages/'. $trauma_teeth_details[0]->xrayiamge);?>"  style="height:228px;">
                </div>
                <div class="col-sm-12 form-group">
                <label>X ray</label>
                <input type="file" name="pic" class="form-control" accept="image/*">
                <div class="form-group">
                    <label><input type="checkbox"  name ='xrayissues[]' value="IOPA">IOPA</label>
                    <label><input type="checkbox"  name ='xrayissues[]' value="Bite wing">Bite wing</label>
                    <label><input type="checkbox"  name ='xrayissues[]' value="U.S Occlusal">U.S Occlusal</label>
                    <label><input type="checkbox"  name ='xrayissues[]' value="L.S Occlusal">L.S Occlusal</label>
                    <label><input type="checkbox"  name ='xrayissues[]' value="Soft tissue">Soft tissue</label>
                </div>
                
              </div>
              <div class="col-sm-12">
                <label>Finding</label>
                <textarea class="form-control" rows="5" id="finding" name='finding'  maxlength="150" ><?php echo  $trauma_teeth_details[0]->finding;?></textarea>
                
              </div>
                                
              <div class="col-sm-12">
                <label>Diagnosis</label>
                <textarea class="form-control" rows="5" id="diagnosis" name='diagnosis'  maxlength="150" ><?php echo $trauma_teeth_details[0]->diagnosis;?></textarea>
                <input type="hidden" name="xraypid"  id='xraypid' value='<?php echo $patient[0]->id;?>' id='teeth'>
              </div>
                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update </button>
                  <button type="reset" class="btn btn-primary"> Reset</button>

                </div></form>

      </div></div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
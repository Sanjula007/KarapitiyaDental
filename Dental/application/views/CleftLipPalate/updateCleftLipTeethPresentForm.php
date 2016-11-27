<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form name="teethPresentUpdateForm" id="teethPresentUpdateForm">
    <?php foreach($teethpresent as $teethValue){ ?>
    <input type="hidden" name="recTeethPresent_id" id="recTeethPresent_id" value="<?php echo $teethValue->id;  ?>">
    <input type="hidden" name="ref_patient_id" id="ref_patient_id" value="<?php echo $teethValue->ref_patient_id;  ?>">
    <h3>Teeth Present</h3>
    <div class="row">
        <div class="col-sm-12"><h5>Enamel Caries</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="enamelup" name="enamelup" value="<?php echo $teethValue->enamel_up?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="enameldown" name="enameldown" value="<?php echo $teethValue->enamel_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Dentinal Caries</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="dentinalup" name="dentinalup" value="<?php echo $teethValue->dentinal_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="dentinaldown" name="dentinaldown" value="<?php echo $teethValue->dentinal_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Pulp Exposed</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="pulpup" name="pulpup" value="<?php echo $teethValue->pulp_exposed_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="pulpdown" name="pulpdown" value="<?php echo $teethValue->pulp_exposed_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Grossly Broken crowns</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="brokencrwnup" name="brokencrwnup" value="<?php echo $teethValue->grossly_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="brokencrwndown" name="brokencrwndown" value="<?php echo $teethValue->grossly_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Septic Roots</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="srootup" name="srootup" value="<?php echo $teethValue->septic_root_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="srootdown" name="srootdown" value="<?php echo $teethValue->septic_root_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Missing Teeth</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="mteethup" name="mteethup" value="<?php echo $teethValue->missing_teeth_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="mteethdown" name="mteethdown" value="<?php echo $teethValue->missing_teeth_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Development Anomalies</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="devanaup" name="devanaup" value="<?php echo $teethValue->dev_anamolies_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="devanadown" name="devanadown" value="<?php echo $teethValue->dev_anamolies_down;  ?>">
            </div>
        </div>
    </div> 
    
    <h3>Gingival Condition</h3>
    <div class="row">
        <div class="col-sm-12"><h5>Plaque</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="plaqueup" name="plaqueup" value="<?php echo $teethValue->plaque_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="plaquedown" name="plaquedown" value="<?php echo $teethValue->plaque_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Calculi</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="calculiup" name="calculiup" value="<?php echo $teethValue->calculi_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="calculidown" name="calculidown" value="<?php echo $teethValue->calculi_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Inflamed Gingiva</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="gingivaup" name="gingivaup" value="<?php echo $teethValue->gingiva_up;  ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="gingivadown" name="gingivadown" value="<?php echo $teethValue->gingiva_down;  ?>">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-primary"> Reset</button>
        </div>
    </div>
    <?php } ?>
</form>


<script>
$(document).ready(function() {
    $("#teethPresentUpdateForm").validate( {
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                    updateTeethPresent();
                }
            });
});
</script>


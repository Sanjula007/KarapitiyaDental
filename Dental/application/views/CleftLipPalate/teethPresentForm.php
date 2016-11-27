<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form name="teethPresentForm" id="teethPresentForm">
    <h3>Teeth Present</h3>
    <div class="row">
        <div class="col-sm-12"><h5>Enamel Caries</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="enamelup" name="enamelup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="enameldown" name="enameldown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Dentinal Caries</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="dentinalup" name="dentinalup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="dentinaldown" name="dentinaldown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Pulp Exposed</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="pulpup" name="pulpup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="pulpdown" name="pulpdown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Grossly Broken crowns</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="brokencrwnup" name="brokencrwnup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="brokencrwndown" name="brokencrwndown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Septic Roots</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="srootup" name="srootup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="srootdown" name="srootdown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Missing Teeth</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="mteethup" name="mteethup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="mteethdown" name="mteethdown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Development Anomalies</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="devanaup" name="devanaup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="devanadown" name="devanadown">
            </div>
        </div>
    </div> 
    
    <h3>Gingival Condition</h3>
    <div class="row">
        <div class="col-sm-12"><h5>Plaque</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="plaqueup" name="plaqueup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="plaquedown" name="plaquedown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Calculi</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="calculiup" name="calculiup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="calculidown" name="calculidown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12"><h5>Inflamed Gingiva</h5></div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="gingivaup" name="gingivaup">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" class="form-control" id="gingivadown" name="gingivadown">
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-primary"> Reset</button>
        </div>
    </div>
</form>


<script>
$(document).ready(function() {
    $("#teethPresentForm").validate( {
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                    saveTeethPresent();
                }
            });
});
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Great Hari
 * Date: 10/13/2016
 * Time: 5:19 PM
 */
?>
        <?php $this->load->view('sidebar'); ?>


<form name="cleftLipUpdateForm" id="cleftLipUpdateForm" action="">
    
    <h3>Medication</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_old">Medication</label>
                <input type="text" class="form-control" id="medication" name="medication"/>
                <label > <span style="color:#d9534f;"></span></label>
            </div>
        </div>
    </div>
    <h3>Habbits</h3>
    
    <h3>Family History</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Father</label>
                <input type="text" class="form-control" id="father" name="father" />
                <label > <span style="color:#d9534f;"></span></label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Mother</label>
                <input type="text" class="form-control" id="mother" name="mother" />
                <label > <span style="color:#d9534f;"></span></label>
            </div>
        </div>
    </div>
    <h3>Oral Examination</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Soft Tissues</label>
                <input type="text" class="form-control" id="stissues" name="stissues" >
                <label > <span style="color:#d9534f;"></span></label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Hard Tissues</label>
                <input type="text" class="form-control" id="htissues" name="htissues" >
                <label > <span style="color:#d9534f;"></span></label>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary" onclick="javascript:updateCleftLippalate();"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-primary"> Reset</button>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {
    $("#cleftLipUpdateForm").validate( {
                rules: {
                        medication: "required",
                        mother: "required",
                        father: "required",
                },
                messages: {
                        medication: "Medication Details Cannot Be Empty",
                        mother: "Mother Name Cannot Be Empty",
                        father: "Father Name Details Cannot Be Empty",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                        // Add the `help-block` class to the error element
                        error.addClass( "help-block" );

                        // Add `has-feedback` class to the parent div.form-group
                        // in order to add icons to inputs
                        element.parents( ".col-sm-5" ).addClass( "has-feedback" );

                        if ( element.prop( "type" ) === "checkbox" ) {
                                error.insertAfter( element.parent( "label" ) );
                        } else {
                                error.insertAfter( element );
                        }

                        // Add the span element, if doesn't exists, and apply the icon classes to it.
                        if ( !element.next( "span" )[ 0 ] ) {
                                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
                        }
                },
                success: function ( label, element ) {
                        // Add the span element, if doesn't exists, and apply the icon classes to it.
                        if ( !$( element ).next( "span" )[ 0 ] ) {
                                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
                        }
                },
                highlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                }
        } );
    });
    
    
    
    function updateCleftLippalate()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/SaveCleftLipPalate'); ?>",
            //dataType: 'json',
            data: $('#cleftLipUpdateForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");
                $(".ajax_response_result").html(responce);
            }
        });
    }

    function saveCleftLipInvestigation()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/SaveCleftLipInvestigation'); ?>",
            //dataType: 'json',
            data: $('#cleftLipInvestigationForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");investFormDiv
                $("#investFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
            }
        });
    }

    function saveCleftLipDiagnosis()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/SaveCleftLipDiagnosis'); ?>",
            //dataType: 'json',
            data: $('#cleftLipDiagnosisForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");investFormDiv
                $("#diagnosisFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
            }
        });
    }
    function saveCleftLipTreatmentPlan()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/saveCleftLipTreatmentPlan'); ?>",
            //dataType: 'json',
            data: $('#cleftLipTreatmentPlanForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");investFormDiv
                $("#treatmentPlanFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
            }
        });
    }
</script>


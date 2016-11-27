<?php
/**
 * Created by PhpStorm.
 * User: Great Hari
 * Date: 10/13/2016
 * Time: 5:19 PM
 */
?>


<form name="cleftLipUpdateForm" id="cleftLipUpdateForm" action="">
    <?php for($i=0;$i<count($cleftlipdata);$i++) { ?>
    <h3>CLeft</h3>
    <?php //print_r($cleftlipdata);?>
    <input type="hidden" name="rec_id" id="rec_id" value="<?php echo $cleftlipdata[$i]->id;  ?>">
    <input type="hidden" name="ref_patient_id" id="ref_patient_id" value="<?php echo $cleftlipdata[$i]->ref_patient_id;  ?>">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Cleft Lip</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->cleftLip == 0){?>
                        <input name="cleftLip" value="off" type="hidden">
                        <input type="checkbox" name="cleftLip" class="onoffswitch-checkbox" id="cleftLip" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="cleftLip" class="onoffswitch-checkbox" id="cleftLip" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="cleftLip">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Cleft Plate</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->cleftPlate == 0){?>
                        <input name="cleftPlate" value="off" type="hidden">
                        <input type="checkbox" name="cleftPlate" class="onoffswitch-checkbox" id="cleftPlate" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="cleftPlate" class="onoffswitch-checkbox" id="cleftPlate" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="cleftPlate">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Unliateral</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->unliateral == 0){?>
                        <input name="unliateral" value="off" type="hidden">
                        <input type="checkbox" name="unliateral" class="onoffswitch-checkbox" id="unliateral" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="unliateral" class="onoffswitch-checkbox" id="unliateral" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="unliateral">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Bilateral</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->bilateral == 0){?>
                        <input name="bilateral" value="off" type="hidden">
                        <input type="checkbox" name="bilateral" class="onoffswitch-checkbox" id="bilateral" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="bilateral" class="onoffswitch-checkbox" id="bilateral" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="bilateral">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <h3>Past Medical History</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Allergy/Asthma</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->allergy == 0){?>
                        <input name="allergy" value="off" type="hidden">
                        <input type="checkbox" name="allergy" class="onoffswitch-checkbox" id="allergy" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="allergy" class="onoffswitch-checkbox" id="allergy" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="allergy">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Bleeding Disorders</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->bleeding == 0){?>
                        <input name="bleeding" value="off" type="hidden">
                        <input type="checkbox" name="bleeding" class="onoffswitch-checkbox" id="bleeding" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="bleeding" class="onoffswitch-checkbox" id="bleeding" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="bleeding">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>CVS Disorders</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->cvs == 0){?>
                        <input name="cvs" value="off" type="hidden">
                        <input type="checkbox" name="cvs" class="onoffswitch-checkbox" id="cvs" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="cvs" class="onoffswitch-checkbox" id="cvs" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="cvs">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Diabetes</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->diabetes == 0){?>
                        <input name="diabetes" value="off" type="hidden">
                        <input type="checkbox" name="diabetes" class="onoffswitch-checkbox" id="diabetes" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="diabetes" class="onoffswitch-checkbox" id="diabetes" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="diabetes">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Others</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->others == 0){?>
                        <input name="others" value="off" type="hidden">
                        <input type="checkbox" name="others" class="onoffswitch-checkbox" id="others" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="others" class="onoffswitch-checkbox" id="others" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="others">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <h3>Medication</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_old">Medication</label>
                <input type="text" class="form-control" id="medication" name="medication" value="<?php echo $cleftlipdata[$i]->medication; ?>"/>
                <label > <span style="color:#d9534f;"><?php echo form_error('medication'); ?></span></label>
            </div>
        </div>
    </div>
    <h3>Habbits</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Night Time Feeding</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->nightFeeding == 0){?>
                        <input name="nightFeeding" value="off" type="hidden">
                        <input type="checkbox" name="nightFeeding" class="onoffswitch-checkbox" id="nightFeeding" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="nightFeeding" class="onoffswitch-checkbox" id="nightFeeding" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="nightFeeding">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Inadequate Brushing</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->inBrushing == 0){?>
                        <input name="inBrushing" value="off" type="hidden">
                        <input type="checkbox" name="inBrushing" class="onoffswitch-checkbox" id="inBrushing" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="inBrushing" class="onoffswitch-checkbox" id="inBrushing" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="inBrushing">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>High Sugar Intake</label>
                <div class="onoffswitch">
                    <?php if($cleftlipdata[$i]->highSugarTake == 0){?>
                        <input name="highSugarTake" value="off" type="hidden">
                        <input type="checkbox" name="highSugarTake" class="onoffswitch-checkbox" id="highSugarTake" unchecked>
                    <?php } else {?>
                        <input type="checkbox" name="highSugarTake" class="onoffswitch-checkbox" id="highSugarTake" checked>
                    <?php }?>
                    <label class="onoffswitch-label" for="highSugarTake">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <h3>Family History</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Father</label>
                <input type="text" class="form-control" id="father" name="father" value="<?php echo $cleftlipdata[$i]->father; ?>"/>
                <label > <span style="color:#d9534f;"><?php echo form_error('father'); ?></span></label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password_2">Mother</label>
                <input type="text" class="form-control" id="mother" name="mother" value="<?php echo $cleftlipdata[$i]->mother; ?>"/>
                <label > <span style="color:#d9534f;"><?php echo form_error('mother'); ?></span></label>
            </div>
        </div>
    </div>
    <h3>Oral Examination</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Soft Tissues</label>
                <input type="text" class="form-control" id="stissues" name="stissues" value="<?php echo $cleftlipdata[$i]->stissues; ?>">
                <label > <span style="color:#d9534f;"><?php echo form_error('stissues'); ?></span></label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Hard Tissues</label>
                <input type="text" class="form-control" id="htissues" name="htissues" value="<?php echo $cleftlipdata[$i]->htissues; ?>">
                <label > <span style="color:#d9534f;"><?php echo form_error('htissues'); ?></span></label>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-primary"> Reset</button>
        </div>
    </div>
    <?php } ?>
</form>

<style>
    .my-error-class {
        color:red;
    }
    .my-valid-class {
        color:green;
    }
</style>

<script>
    $(document).ready(function() {
        $.validator.addMethod("regx", function(value, element, regexpr) {          
        return regexpr.test(value);
        }, "Please enter a valid pasword.");
    $( "#cleftLipUpdateForm" ).validate( {
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                rules: {
                        medication: {
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        mother: {
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        father: {
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        htissues:{
                            regx: /^[a-z .,\-]+$/i,
                        },
                        stissues:{
                            regx: /^[a-z .,\-]+$/i,
                        }
                            
                },
                messages: {
                        medication: {
                            required : "Medication Details Cannot Be Empty",
                            regx: "Please Enter Only Characters to Medication Field",
                        },
                        mother: {
                            required : "Mother Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Mother Name",
                        },
                        father: {
                            required : "Father Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Father Name",
                        },
                        htissues: {
                            regx: "Please Enter Only Characters to Hard Tissues",
                        },
                        stissues: {
                            regx: "Please Enter Only Characters to Soft Tissues",
                        },
                },
//                errorElement: "em",
//                errorPlacement: function ( error, element ) {
//                        // Add the `help-block` class to the error element
//                        error.addClass( "help-block" );
//
//                        // Add `has-feedback` class to the parent div.form-group
//                        // in order to add icons to inputs
//                        element.parents( ".col-sm-5" ).addClass( "has-feedback" );
//
//                        if ( element.prop( "type" ) === "checkbox" ) {
//                                error.insertAfter( element.parent( "label" ) );
//                        } else {
//                                error.insertAfter( element );
//                        }
//
//                        // Add the span element, if doesn't exists, and apply the icon classes to it.
//                        if ( !element.next( "span" )[ 0 ] ) {
//                                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
//                        }
//                },
//                success: function ( label, element ) {
//                        // Add the span element, if doesn't exists, and apply the icon classes to it.
//                        if ( !$( element ).next( "span" )[ 0 ] ) {
//                                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
//                        }
//                },
//                highlight: function ( element, errorClass, validClass ) {
//                        $( element ).parents( ".col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
//                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
//                },
//                unhighlight: function ( element, errorClass, validClass ) {
//                        $( element ).parents( ".col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
//                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
//                },
                submitHandler: function () {
                    updateCleftLippalate();
                }
        } );
    });
    
    
    
    function updateCleftLippalate()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/UpdateCleftLipPalate'); ?>",
            data: $('#cleftLipUpdateForm').serialize(),
            success: function (responce) {
                //$(".ajax_response_result").html(responce);
                $('#update-cleft-lip').modal('hide');
                $('#success').modal('show');
            }
        });
    }
</script>


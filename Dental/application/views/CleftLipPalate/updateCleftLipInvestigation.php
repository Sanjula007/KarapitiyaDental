<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Created by PhpStorm.
 * User: Great Hari
 * Date: 10/13/2016
 * Time: 5:19 PM
 */
?>

<form id="updatecleftLipInvestigationForm">
  <?php //print_r($investigation);?>  
  <?php foreach($investigation as $invest){?>
  <div class="form-group">
    <label for="address">Investigation</label>
    <input type="hidden" name="rec_invest" id="rec_invest" value="<?php echo $invest->id;?>">
    <input type="hidden" name="ref_patient_id" id="ref_patient_id" value="<?php echo $invest->ref_patient_id;?>">
    <?php $invest_data = $invest->investigation;?>
    <textarea class="form-control" rows="6" id="update_investigation" name='update_investigation'></textarea>
    <script src="<?php echo base_url('assest/editor/ckeditor/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
            CKEDITOR.replace( 'update_investigation', {

                 filebrowserBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=files');?>',
                 filebrowserImageBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=images');?>',
                 filebrowserFlashBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=flash');?>',
                 filebrowserUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=files');?>',
                 filebrowserImageUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=images');?>',
                 filebrowserFlashUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=flash');?>',
            });
            var data = <?php echo json_encode($invest_data); ?>;
//            CKEDITOR.instances.update_investigation.setData(data,function(){
//                     this.checkDirty();
//            });
              document.getElementById("update_investigation").value = data;
    </script>
    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary" onclick="CKEDITOR.instances.update_investigation.updateElement();"><i class="fa fa-save"></i> Save </button>
        <button type="reset" class="btn btn-primary"> Reset</button>
    </div>
  </div>
  <?php }?>
</form>


<script>
    $(document).ready(function() {

        $.validator.addMethod("regx", function(value, element, regexpr) {          
        return regexpr.test(value);
        }, "Please enter a valid pasword.");
    $( "#updatecleftLipInvestigationForm" ).validate( {
                rules: {
                        update_investigation: "required",
                },
                messages: {
                        update_investigation: "Investigation Details Cannot Be Empty",
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
                        $( element ).parents( ".col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
                        $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                        $( element ).parents( ".col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
                        $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                },
                submitHandler: function () {
                    updateCleftLipInvestigation();
                }
        } );
    });
    

    
</script>




<?php
//$message = "Your Upload was successful";
if ((isset($message)) && ($message != '')):
?>
<div class="modal" id="alert-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Inserted Successfully!!</h4>
            </div>
            <div class="modal-body">
                <?php echo $message; ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $('#alert-dialog').modal('show').on('hidden.bs.modal', function () {
        //location.reload(true);
    });
});
</script>
<?php endif; ?>





<form id="cleftLipDiagnosisForm">
  <div class="form-group">
    <label for="address">Diagnosis</label>
    <textarea class="form-control" rows="6" id="diagnosis" name='diagnosis' value="<?php echo set_value('diagnosis'); ?>"></textarea>
    <label > <span style="color:#d9534f;"><?php echo form_error('diagnosis'); ?></span></label>
    <script src="<?php echo base_url('assest/editor/ckeditor/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
            CKEDITOR.replace( 'diagnosis', {

                 filebrowserBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=files');?>',
                 filebrowserImageBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=images');?>',
                 filebrowserFlashBrowseUrl: '<?php echo base_url('assest/editor/kcfinder/browse.php?type=flash');?>',
                 filebrowserUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=files');?>',
                 filebrowserImageUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=images');?>',
                 filebrowserFlashUploadUrl: '<?php echo base_url('assest/editor/kcfinder/upload.php?type=flash');?>'
            });
    </script>
    <div class="col-sm-12 text-center">
          <button type="button" class="btn btn-primary" onclick="CKEDITOR.instances.diagnosis.updateElement();saveCleftLipDiagnosis();"><i class="fa fa-save"></i> Save </button>
          <button type="reset" class="btn btn-primary"> Reset</button>
    </div>
  </div>
</form>


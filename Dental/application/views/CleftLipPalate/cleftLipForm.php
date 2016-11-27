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
                                
                                
<form name="cleftLipForm" id="cleftLipForm" action="">
<?php //echo form_open(array('id' => 'cleftLipForm'));?>
<div class="row">
  <div class="col-sm-6">
      <div class="form-group">
          <label>Cleft Lip</label>
          <div class="onoffswitch">
              <input name="cleftLip" value="off" type="hidden">
              <input type="checkbox" name="cleftLip" class="onoffswitch-checkbox" id="cleftLip" checked>
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
              <input name="cleftPlate" value="off" type="hidden">
              <input type="checkbox" name="cleftPlate" class="onoffswitch-checkbox" id="cleftPlate" checked>
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
              <input name="unliateral" value="off" type="hidden">
              <input type="checkbox" name="unliateral" class="onoffswitch-checkbox" id="unliateral" checked>
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
              <input name="bilateral" value="off" type="hidden">
              <input type="checkbox" name="bilateral" class="onoffswitch-checkbox" id="bilateral" checked>
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
              <input name="allergy" value="off" type="hidden">
              <input type="checkbox" name="allergy" class="onoffswitch-checkbox" id="allergy" checked>
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
              <input name="bleeding" value="off" type="hidden">
              <input type="checkbox" name="bleeding" class="onoffswitch-checkbox" id="bleeding" checked>
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
              <input name="cvs" value="off" type="hidden">
              <input type="checkbox" name="cvs" class="onoffswitch-checkbox" id="cvs" checked>
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
              <input name="diabetes" value="off" type="hidden">
              <input type="checkbox" name="diabetes" class="onoffswitch-checkbox" id="diabetes" checked>
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
              <input name="others" value="off" type="hidden">
              <input type="checkbox" name="others" class="onoffswitch-checkbox" id="others" checked>
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
            <input type="text" class="form-control" id="medication" name="medication" value="<?php echo set_value('medication'); ?>">
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
                <input name="nightFeeding" value="off" type="hidden">
                <input type="checkbox" name="nightFeeding" class="onoffswitch-checkbox" id="nightFeeding" checked>
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
                <input name="inBrushing" value="off" type="hidden">
                <input type="checkbox" name="inBrushing" class="onoffswitch-checkbox" id="inBrushing" checked>
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
                <input name="highSugarTake" value="off" type="hidden">
                <input type="checkbox" name="highSugarTake" class="onoffswitch-checkbox" id="highSugarTake" checked>
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
            <input type="text" class="form-control" id="father" name="father" value="<?php echo set_value('father'); ?>">
            <label > <span style="color:#d9534f;"><?php echo form_error('father'); ?></span></label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="password_2">Mother</label>
            <input type="text" class="form-control" id="mother" name="mother" value="<?php echo set_value('mother'); ?>">
            <label > <span style="color:#d9534f;"><?php echo form_error('mother'); ?></span></label>
        </div>
    </div>
  </div>
  <h3>Oral Examination</h3>
  <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Soft Tissues</label>
            <input type="text" class="form-control" id="stissues" name="stissues" value="<?php echo set_value('stissues'); ?>">
            <label > <span style="color:#d9534f;"><?php echo form_error('stissues'); ?></span></label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Hard Tissues</label>
            <input type="text" class="form-control" id="htissues" name="htissues" value="<?php echo set_value('htissues'); ?>">
            <label > <span style="color:#d9534f;"><?php echo form_error('htissues'); ?></span></label>
        </div>
    </div>
  </div>


  <div class="row">
          <div class="col-sm-12 text-center">
              <button type="button" class="btn btn-primary" onclick="javascript:saveCleftLippalate();"><i class="fa fa-save"></i> Save </button>
                <button type="reset" class="btn btn-primary"> Reset</button>
          </div>
  </div>
  </form>


<script>
function checkLeave(ele){
//alert(ele.value);


var divhalf=document.getElementById('halfday');
if(ele.value=='Half Day'){

divhalf.style.display = 'block';
}else{

divhalf.style.display = 'none';
}

var divfull=document.getElementById('fullday');
if(ele.value=='Full Day'){

divfull.style.display = 'block';
}else{

divfull.style.display = 'none';
}

var divshort=document.getElementById('shortleave');
    if(ele.value=='Short Leave'){

        divshort.style.display = 'block';
    }else{

        divshort.style.display = 'none';
    }
}

</script>

<div class="container">
    <div class="col-md-12">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Doctor</a>
                </li>
                <li><a href="#">Leave Management</a>
                </li>
                <li>Leave</li>
            </ul>

        </div>
        <?php $this->load->view('Doctors/Sidebar'); ?>
        <div class="col-md-9">
            <div class="box">
                <h1>Add New leaves</h1>


                <h3>Leave details</h3>

                <form method=POST action="<?php echo base_url('index.php/Leave/requestLeave')?>">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date">Doctor ID</label>
                                <!--<input type="text"  class="form-control" id='did' name='did' readonly value="<?php echo set_value('did'); ?>">-->
                                <input type="text"  class="form-control" id='did' name='did' value="12345">
                                <label > <span style="color:#d9534f;"><?php echo form_error('pid'); ?></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Type of Leave</label>
                                <div class="radio">
                                    <label><input type="radio" name="causeot" onclick='checkLeave(this)' value='Half Day' <?php echo  set_radio('causeot', 'Half Day'); ?>>Half Day</label>
                                    <label></label>
                                    <label><input type="radio" name="causeot" onclick='checkLeave(this)' value='Full Day' <?php echo  set_radio('causeot', 'Full Day'); ?> >Full Day</label>
                                    <label></label>
                                    <label><input type="radio" name="causeot" onclick='checkLeave(this)' value='Short Leave' <?php echo  set_radio('causeot','Short Leave'); ?>> Short Leave</label>
                                </div>
                                <label > <span style="color:#d9534f;"><?php echo form_error('causeot'); ?></span></label>
                            </div>
                            <div class="form-group" id='halfday' style='display:none;'>
                                <label>Required Date</label>

                                  <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dt1" name='dt1' value="<?php echo set_value('dt1'); ?>">

                            </div>
                            <div class="form-group" id='fullday' style='display:none;'>
                                <label>One Day leave</label>

                                    <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dt2" name='dt2' value="<?php echo set_value('dt2'); ?>">

                            </div>
                            <div class="form-group" id='shortleave' style='display:none;'>
                                <label>Start Date</label>
                                    <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dt3" name='dt3' value="<?php echo set_value('dt3'); ?>">
                                <label>End Date</label>
                                    <input type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" id="dt4" name='dt4' value="<?php echo set_value('dt4'); ?>">
                        </div>
                    </div>
                        </div>
                   <div class="row">
                      <div class="col-sm-12">
                       <label>Reason</label>
                       <textarea class="form-control" rows="5" id="reason" name="reason" required></textarea>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            </div>
                        </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                            </div>
                        </div>
                        <div class="row">
                       <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit </button>
                            <button type="reset" class="btn btn-primary"> Reset</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
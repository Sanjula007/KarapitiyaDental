<div id="content">
    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>My account</li>
            </ul>

        </div>

        <?php $this->load->view('sidebar'); ?>
        <?php //echo base_url('assest/'); ?><!--css/font-awesome.css" rel="stylesheet-->
        <script src="<?php echo base_url('assest/editor/ckeditor/ckeditor/ckeditor.js'); ?>"></script>

        <div class="col-md-9">
                    <div class="box">
                        <h1>Cleft Lip / Palate Patients</h1>
                        <p class="lead">Screening Sheet of Cleft Lip/Palate Patients</p><p class="text-muted"><?php echo date("j F Y", strtotime("Y-m-d"));?></p>
                        <p class="text-muted"></p>

                        <h3>CLeft</h3>

                        <div id="cleftFormDiv">
                            <div class="ajax_response_result">
                                <?php $this->load->view('CleftLipPalate/cleftLipForm'); ?>
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
                                                <?php echo "Patient Cleft Lip Palate Investigation Details Are Successfully Saved"; ?>
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

                            </div>
                        </div>
                        <hr>



                        <div class="panel-group" id="accordion">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#teethPresent" required>
                                            <strong>Teeth Present</strong>
                                        </a>

                                    </h4>
                                </div>
                                <div id="teethPresent" class="panel-collapse collapse">
                                    <div class="panel-body" id="testhPresentFormDiv">
                                        <?php $this->load->view('CleftLipPalate/teethPresentForm'); ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#invest" required>
                                            1. INVESTIGATIONS
                                        </a>

                                    </h4>
                                </div>
                                <div id="invest" class="panel-collapse collapse">
                                    <div class="panel-body" id="investFormDiv">
                                        <?php $this->load->view('CleftLipPalate/investForm'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#diagnos">
                                            2. DIAGNOSIS
                                        </a>

                                    </h4>
                                </div>
                                <div id="diagnos" class="panel-collapse collapse">
                                    <div class="panel-body" id="diagnosisFormDiv">
                                        <?php $this->load->view('CleftLipPalate/diagnoseForm'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#treat">
                                            3. Treatment Plan
                                        </a>

                                    </h4>
                                </div>
                                <div id="treat" class="panel-collapse collapse">
                                    <div class="panel-body" id="treatmentPlanFormDiv">
                                        <?php $this->load->view('CleftLipPalate/tratmentPlanForm'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->


                            <!-- /.panel -->

                        </div>
                        <!-- /.panel-group -->

                </div>
            </div>
    </div>
</div>
<style>
    .my-error-class {
        color:red;
    }
    .my-valid-class {
        color:green;
    }
</style>

<script>

    $('.ui-link').on('click', function () {
        if (!$(this).hasClass('active-link')) {
            $('.ui-link').removeClass('active-link');
            $('.ui-link').nextAll('.ui-box-wrp').slideUp('slow').removeClass('active');

            $(this).addClass('active-link');
            $(this).nextAll('.ui-box-wrp').slideDown('slow').addClass('active');
            ajaxLoad($(this).attr('href'));
            return false;
        } else {
            $('form-wrp').children().remove();
            $(this).removeClass('active-link');
            $(this).nextAll('.ui-box-wrp').slideUp('slow').removeClass('active');
            return false;
        }
        return false;
    });</script>


<script>
var base_url = "<?php echo base_url(); ?>";
function saveDetails()
{
  $.ajax({
    type: "POST",
    url: "http://localhost/Dental/index.php/CleftLipPalate/viewFormCleftLip",
    data:  $('#myForm').serialize(),
    cache: false,
    success: function(result){
        alert(result);
      }
  });
}

function saveCleftLippalate()
{
    $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/SaveCleftLipPalate'); ?>",
            //dataType: 'json',
            data: $('#cleftLipForm').serialize() + "&patient_id="+ <?php echo $patient_id;?>,
            success: function (responce) {
                $('#cleftLipForm')[0].reset();
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
            data: $('#cleftLipInvestigationForm').serialize() + "&patient_id="+ <?php echo $patient_id;?>,
            success: function (responce) {
                $('#cleftLipInvestigationForm')[0].reset();
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
            data: $('#cleftLipDiagnosisForm').serialize() + "&patient_id="+ <?php echo $patient_id;?>,
            success: function (responce) {
                $('#cleftLipDiagnosisForm')[0].reset();
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
            data: $('#cleftLipTreatmentPlanForm').serialize() + "&patient_id="+ <?php echo $patient_id;?>,
            success: function (responce) {
                $('#treatmentPlanFormDiv')[0].reset();
                $("#treatmentPlanFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
            }
        });
}

function saveTeethPresent()
{
    $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/saveCleftLipTeethPresent'); ?>",
            //dataType: 'json',
            data: $('#teethPresentForm').serialize() + "&patient_id="+ <?php echo $patient_id;?>,
            success: function (responce) {
                $('#teethPresentForm')[0].reset();
                $('#success').modal('show');
            }
        });
}
</script>

<div id="success" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <strong>Data has Been Successfully Added!!</strong>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>

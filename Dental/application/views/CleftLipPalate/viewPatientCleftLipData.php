<?php
/**
 * Created by PhpStorm.
 * User: great Hari
 * Date: 10/9/2016
 * Time: 3:54 PM
 */
?>
<style>
    .tickMark{
        color: darkgreen;
        font-weight: bold;
        font-size:35px;
        margin-left: 0.5em;
        vertical-align:central;
    }
    .crossMark{
        color: crimson;
        font-weight: bold;
        font-size:35px;
        margin-left: 0.5em;
        vertical-align:central;
    }
    .colorBlue{
        color: #4A7F45;
    }
    .colorlGreen{
        color: #4FBFA8;
    }
    strong{
        color : #0077CC;
    }
</style>

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
        <script src="<?php echo base_url('assest/editor/ckeditor/ckeditor/ckeditor.js'); ?>"></script>

        <!--Update Form for Cleft Lip Palate------>
        <div class="modal fade" id="update-cleft-lip">
            <div class="modal-dialog" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Patients Cleft Lip Data</h4>
                    </div>
                    <div class="modal-body">
                        <?php $data['cleftlipdata'] = $cleftlipdata;?>
                        <?php $this->load->view('CleftLipPalate/updateCleftLipForm',$data); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Form for Cleft Lip Palate-->
        
        <!--Update Form for Cleft Lip Teeth Present------>
        <div class="modal fade" id="update-cleft-lip-teethPresent">
            <div class="modal-dialog" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Patients Teeth Present Information</h4>
                    </div>
                    <div class="modal-body">
                        <?php $data['teethpresent'] = $teethpresent;?>
                        <?php $this->load->view('CleftLipPalate/updateCleftLipTeethPresentForm',$data); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Form for Cleft Lip teeth present-->
        
        <!--Update Form for Cleft Lip Investigation------>
        <div class="modal fade" id="update-cleft-lip-invest">
            <div class="modal-dialog" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Patients Cleft Lip Investigation</h4>
                    </div>
                    <div class="modal-body">
                        <?php $data['investigation'] = $investigation;?>
                        <?php $this->load->view('CleftLipPalate/updateCleftLipInvestigation',$data); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Form for Cleft Lip Investigation-->
        
        <!--Update Form for Cleft Lip Diagnosis------>
        <div class="modal fade" id="update-cleft-lip-diadnosis">
            <div class="modal-dialog" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Patients Cleft Lip Diagnosis</h4>
                    </div>
                    <div class="modal-body">
                        <?php $data['diagnosis'] = $diagnosis;?>
                        <?php $this->load->view('CleftLipPalate/updateCleftLipDiagnosis',$data); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Form for Cleft Lip Diagnosis-->
        
        <!--Update Form for Cleft Lip Treatment Plan------>
        <div class="modal fade" id="update-cleft-lip-trtPlan">
            <div class="modal-dialog" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Patients Cleft Lip Treatment Plan</h4>
                    </div>
                    <div class="modal-body">
                        <?php $data['treatmentplan'] = $treatmentplan;?>
                        <?php $this->load->view('CleftLipPalate/updateCleftLipTreatmentPlan',$data); ?>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Update Form for Cleft Lip Treatment Plan-->
        
        <div id="success" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <strong>Data has Been Successfully edited!!</strong>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        

        <div class="col-md-9">
            <div class="box">
                <h1 class="colorBlue">Patient Cleft Lip/Palate Details</h1>
                <p class="lead">Screening Sheet of Cleft Lip/Palate Patient</p>
                <p class="text-muted"><strong>Details Recored or Updated Date : </strong><?php echo date("d F Y H:i:s", strtotime($cleftlipdata[0]->date_recorded));?></p>

                <h3 class="colorBlue">CLeft</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->cleftLip == 1) {?>
                            <strong>Cleft Lip</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Cleft Lip</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->cleftPlate == 1) {?>
                            <strong>Cleft Plate</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Cleft Plate</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->unliateral == 1) {?>
                            <strong>Unliateral</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Unliateral</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->bilateral == 1) {?>
                            <strong>Bilateral</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Bilateral</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                </div>
                
                
                <h3 class="colorBlue">Past Medical History</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->allergy == 1) {?>
                            <strong>Allergy/Asthma</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Allergy/Asthma</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->bleeding == 1) {?>
                            <strong>Bleeding Disorders</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Bleeding Disorders</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->cvs == 1) {?>
                            <strong>CVS Disorders</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>CVS Disorders</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->diabetes == 1) {?>
                            <strong>Diabetes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Diabetes &emsp14;&emsp;&emsp;&emsp;&emsp;&emsp;</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->others == 1) {?>
                            <strong>Others &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Others &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                </div>
                
                
                <h3 class="colorBlue">Medication</h3>
                <div class="row">
                    <div class="col-md-2">
                        <strong>Medication : </strong>
                    </div>
                    <div class="col-md-10">
                        <p><?php echo $cleftlipdata[0]->medication; ?></p>
                    </div>
                </div>
                
                
                <h3 class="colorBlue">Habbits</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->nightFeeding == 1) {?>
                            <strong>Night Time Feeding</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Night Time Feeding</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->inBrushing == 1) {?>
                            <strong>Inadequate Brushing</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>Inadequate Brushing</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                    <div class="col-md-4">
                        <?php if($cleftlipdata[0]->highSugarTake == 1) {?>
                            <strong>High Sugar Intake</strong><span class="tickMark">&#10004;</span>
                        <?php }else {?>
                            <strong>High Sugar Intake</strong><span class="crossMark">&#10008;</span>
                        <?php }?>
                    </div>
                </div>
                
                <h3 class="colorBlue">Family History</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <strong>Father : </strong>
                        </div>
                        <div class="col-md-4">
                            <p><?php echo $cleftlipdata[0]->father; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-4">
                                <strong>Mother : </strong>
                        </div>
                        <div class="col-md-4">
                            <p><?php echo $cleftlipdata[0]->mother; ?></p>
                        </div>
                    </div>
                </div>
                
                
                <h3 class="colorBlue">Oral Examination</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <strong>Soft Tissues : </strong>
                        </div>
                        <div class="col-md-4">
                            <p><?php echo $cleftlipdata[0]->stissues; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-5">
                            <strong>Hard Tissues : </strong>
                        </div>
                        <div class="col-md-4">
                            <p><?php echo $cleftlipdata[0]->htissues; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-cleft-lip" 
                                onclick=""><i class="fa fa-edit"></i> Edit </button>
                    </div>
                </div>
                
                <h3 class="colorBlue">Teeth Present</h3>
                <div class="panel-body">
                    <?php foreach($teethpresent as $teethValue){ ?>
                    <?php // $teethValue = $teethValue;                    print_r($teethValue)?>
                    <p><strong>Last Updated Date : </strong><?php echo date("d F Y H:i:s", strtotime($teethValue->date_recorded ));?></p>
                    <div id="teethPresentDiv">
                        <h3 class="colorBlue">Teeth Present</h3>
                            <div class="row">
                                <div class="col-sm-12"><strong>Enamel Caries</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->enamel_up == "" || $teethValue->enamel_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->enamel_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->enamel_down == "" || $teethValue->enamel_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->enamel_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Dentinal Caries</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->dentinal_up == "" || $teethValue->dentinal_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->dentinal_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->dentinal_down == "" || $teethValue->dentinal_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->dentinal_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Pulp Exposed</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->pulp_exposed_up == "" || $teethValue->pulp_exposed_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->pulp_exposed_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->pulp_exposed_down == "" || $teethValue->pulp_exposed_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->pulp_exposed_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Grossly Broken crowns</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->grossly_up == "" || $teethValue->grossly_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->grossly_up;
                                        }
                                        ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                        <?php
                                        if ($teethValue->grossly_down == "" || $teethValue->grossly_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->grossly_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Septic Roots</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->septic_root_up == "" || $teethValue->septic_root_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->septic_root_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <?php
                                    if ($teethValue->septic_root_down == "" || $teethValue->septic_root_down == null) {
                                        echo "Not Proposed";
                                    } else {
                                        echo $teethValue->septic_root_down;
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Missing Teeth</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->missing_teeth_up == "" || $teethValue->missing_teeth_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->missing_teeth_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <?php
                                    if ($teethValue->missing_teeth_down == "" || $teethValue->missing_teeth_down == null) {
                                        echo "Not Proposed";
                                    } else {
                                        echo $teethValue->missing_teeth_down;
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Development Anomalies</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->dev_anamolies_up == "" || $teethValue->dev_anamolies_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->dev_anamolies_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->dev_anamolies_down == "" || $teethValue->dev_anamolies_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->dev_anamolies_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                        <h3 class="colorBlue">Gingival Condition</h3>
                            <div class="row">
                                <div class="col-sm-12"><strong>Plaque</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->plaque_up == "" || $teethValue->plaque_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->plaque_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->plaque_down == "" || $teethValue->plaque_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->plaque_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Calculi</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->calculi_up == "" || $teethValue->calculi_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->calculi_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->calculi_down == "" || $teethValue->calculi_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->calculi_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12"><strong>Inflamed Gingiva</strong></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->gingiva_up == "" || $teethValue->gingiva_up == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->gingiva_up;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php
                                        if ($teethValue->gingiva_down == "" || $teethValue->gingiva_down == null) {
                                            echo "Not Proposed";
                                        } else {
                                            echo $teethValue->gingiva_down;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-cleft-lip-teethPresent" 
                                onclick=""><i class="fa fa-edit"></i> Edit </button>
                    </div>
                </div>
                
                <h3 class="colorBlue">Investigations</h3>
                <div class="panel-body">
                    <?php for($i=0;$i < count($investigation);$i++){ ?>
                    <p><strong>Last Updated Date : </strong><?php echo date("d F Y H:i:s", strtotime($investigation[$i]->date_recorded ));?></p>
                    <?php echo $investigation[$i]->investigation; ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-cleft-lip-invest" 
                                onclick=""><i class="fa fa-edit"></i> Edit </button>
                    </div>
                </div>
                
                <h3 class="colorBlue">Diagnosis</h3>
                <div class="panel-body">
                    <?php  for($i=0;$i < count($diagnosis);$i++){ ?>
                    <p><strong>Last Updated Date : </strong><?php echo date("d F Y H:i:s", strtotime($diagnosis[$i]->recorded_date)); ?></p>
                    <?php echo $diagnosis[$i]->diagnosis; ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-cleft-lip-diadnosis" 
                                onclick=""><i class="fa fa-edit"></i> Edit </button>
                    </div>
                </div>
                
                <h3 class="colorBlue">Treatment Plan</h3>
                <div class="panel-body">
                    <?php  for($i=0;$i < count($treatmentplan);$i++){ ?>
                    <p><strong>Last Updated Date : </strong><?php echo date("d F Y H:i:s", strtotime($treatmentplan[$i]->recorded_date)); ?></p>
                    <?php echo $treatmentplan[$i]->treat_plan; ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-cleft-lip-trtPlan" 
                                onclick=""><i class="fa fa-edit"></i> Edit </button>
                    </div>
                </div>
                
                
            </div>
        </div>

    </div>
</div>







<script>
    function saveCleftLippalate()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/SaveCleftLipPalate'); ?>",
            //dataType: 'json',
            data: $('#cleftLipForm').serialize(),
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
    
    function updateCleftLipInvestigation()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/UpdateCleftLipInvestigation'); ?>",
            //dataType: 'json',
            data: $('#updatecleftLipInvestigationForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");investFormDiv
                //$("#investFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
                $('#update-cleft-lip-invest').modal('hide');
                $('#success').modal('show');
            }
        });
    }
    
    function updateTeethPresent()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('CleftLipPalate/UpdateCleftLipTeethPresent'); ?>",
            //dataType: 'json',
            data: $('#teethPresentUpdateForm').serialize(),
            success: function (responce) {
                //alert("succesfully Inserted");investFormDiv
                //$("#investFormDiv").html(responce);;
                //$('#alert-dialog').modal('toggle');
                $('#update-cleft-lip-teethPresent').modal('hide');
                $('#success').modal('show');
            }
        });
    }
</script>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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

        <div class="col-md-9">
                    <div class="box">
                        <h1>Medicine Information</h1>
                        <p class="lead">Add New Medicine Details</p>
                        <p class="text-muted"></p>

                        <h3>Fill The Medicine Details</h3>
                        <form name="addMedicineForm" id="addMedicineForm" action="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="medicine_name" name="medicine_name">
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Generic Name</label>
                                        <input type="text" class="form-control" id="medicine_gen_name" name="medicine_gen_name">
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="country">Medicine Type</label>
                                        <select class="form-control" id="med_type" name="med_type">
                                            <option value="">Please Select</option>
                                            <?php foreach ($medicineType as $row) { ?>
                                                <option value="<?php echo $row->med_type; ?>"><?php echo $row->med_type; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="country">Medicine For</label>
                                        <select class="form-control" id="med_for" name="med_for">
                                            <option value="">Please Select</option>
                                            <?php foreach ($medicineFor as $row) { ?>
                                                <option value="<?php echo $row->med_for; ?>"><?php echo $row->med_for; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Manufacturer</label>
                                        <input type="text" class="form-control" id="med_menufacturer" name="med_menufacturer">
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Quantity</label>
                                        <input type="text" class="form-control" id="med_quantity" name="med_quantity">
                                        <label > <span style="color:#d9534f;"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save </button>
                                    <button type="reset" class="btn btn-primary"> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>

    </div>
</div>

<div class="ajax_response_result">
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
                location.reload(true);
                $("#addMedicineForm")[0].reset();
            });
        });
        </script>
    <?php endif; ?>

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
    $(document).ready(function() {
        $.validator.addMethod("regx", function(value, element, regexpr) {          
        return regexpr.test(value);
        }, "Please enter a valid pasword.");
    $( "#addMedicineForm" ).validate( {
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                rules: {
                        medicine_name: {
                            remote: {
                                url: "<?php echo site_url('MedicineData/checkName')?>",
                                type: "post",
                                data: {
                                    action: function () {
                                        return "checkName";
                                    }
                                },
                            },
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        medicine_gen_name: {
                            remote: {
                                url: "<?php echo site_url('MedicineData/checkgenName')?>",
                                type: "post",
                                data: {
                                    action: function () {
                                        return "checkgenName";
                                    }
                                },
                            },
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        med_type: {
                                required: true,
                            },
                        med_for:{
                            required: true,
                        },
                        med_menufacturer: {
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        med_quantity: {
                                required: true,
                                number: true,
                                maxlength: 5
                            },
                            
                },
                messages: {
                        med_name: {
                            required : "Medicine Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Medicine Name",
                        },
                        med_gen_name: {
                            required : "Medicine Generic Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Medicine Name",
                        },
                        med_type: {
                            required : "Please Select a Medicine Type",
                        },
                        med_for: {
                            required: "Please Select Medicine Usage",
                        },
                        med_menufacturer: {
                            required : "Manufacturer Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Manufacturer Name",
                        },
                        med_quantity: {
                            required : "Medicine Quantity Cannot Be Empty",
                            number: "Please Enter Only Numbers to Medicine Quantity",
                            maxlength : "Quantity Not Valid. Enter between 1-99999",
                        },
                },
                submitHandler: function () {
                    saveMedicineData();
                }
        } );
    });
    
    function saveMedicineData()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/addNewMedicine'); ?>",
            data: $('#addMedicineForm').serialize(),
            success: function (responce) {
                $(".ajax_response_result").html(responce);
            }
        });
    }

</script>


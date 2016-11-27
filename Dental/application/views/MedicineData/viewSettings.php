<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    .my-error-class {
        color:red;
    }
    .my-valid-class {
        color:green;
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
        
        <div class="col-md-9" id="customer-orders">
            <div class="box">
                
                <h1>Settings</h1>

                <p class="lead">Change your Medicine Details Settings here</p>
                <p class="text-muted"></p>
                
                <hr>
                <h3 style="padding-right: 10px">Medicine Graph Settings</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Detail</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($medicineGraph as $settings) { ?>
                            <tr>
                                <th><?php echo $settings->id; ?></th>
                                <td><?php echo $settings->description; ?></td>
                                <td><?php echo $settings->quantity; ?></td>
                                <!--<td></td>-->
                                <!--<td><span class="label label-info">Being prepared</span>-->
                                <!--</td>-->
                                <td><button class="btn btn-primary btn-sm" title="Edit" onclick="edit_medicine_graph(<?php echo $settings->id; ?>)"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>
                                    <!--<button class="btn btn-sm btn-danger" title="Delete" onclick="delete_medicine_type(<?php echo $settings->id; ?>)"><i class="glyphicon glyphicon-trash"></i>  Delete</button>-->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <hr>
                <h3 style="padding-right: 10px">Medicine Type<button class="btn btn-primary btn-sm pull-right col-md-2" data-toggle="modal" data-target="#medicinetype_modal">Add New</button></h3>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#medtype">
                                <strong>Medicine Type</strong>
                            </a>

                        </h4>
                    </div>
                    <div id="medtype" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive" id="medicineType">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <hr>
                <h3 style="padding-right: 10px">Medicine Used For<button class="btn btn-primary btn-sm pull-right col-md-2" data-toggle="modal" data-target="#medicinefor_modal">Add New</button></h3>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#medfor">
                                <strong>Medicine Usage</strong>
                            </a>

                        </h4>
                    </div>
                    <div id="medfor" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive" id="medicineFor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function showAlert(){
        alert("hi");
    }
    $(document).ready(function(){
        loadMedicineTypeTable();
        loadMedicineForTable();
        
        jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z .,\-]+$/i.test(value);
        }, "Please Enter Characters Only");
    
        $('form').each(function () {
            $("#medicine-for-form").validate({
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                addFor();
                }
            });
            $("#medicine-type-form").validate({
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                addType();
                }
            });
            $("#medicine-type-update-form").validate({
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                updateType();
                }
            });
            $("#medicine-for-update-form").validate({
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                updateFor();
                }
            });
            $("#medicine-graph-update-form").validate({
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                submitHandler: function () {
                updateGraph();
                }
            });
        });
    });
    
    function loadMedicineTypeTable()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/getMedicineType'); ?>",
            success: function (responce) {
                $("#medicineType").html(responce);
            }
        });
    }
    
    function loadMedicineForTable()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/getMedicineFor'); ?>",
            success: function (responce) {
                $("#medicineFor").html(responce);
            }
        });
    }
    
    function addFor()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/addMedicineFor'); ?>",
            data: $('#medicine-for-form').serialize(),
            success: function (responce) {
                $('#medicinefor_modal').modal('hide');
                    $('#success').modal('show');
                    loadMedicineForTable();
                    
            }
        });
    }
    
    function addType()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/addMedicineType'); ?>",
            data: $('#medicine-type-form').serialize(),
            success: function (responce) {
                $('#medicinetype_modal').modal('hide');
                    $('#success').modal('show');
                    loadMedicineTypeTable();
            }
        });
    }
    
    function delete_medicine_type(id)
{
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('MedicineData/deleteMedicineType')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        loadMedicineTypeTable();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
         });
}

function delete_medicine_for(id)
{
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('MedicineData/deleteMedicinefor')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        loadMedicineForTable();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
         });
}

function edit_medicine_for(id)
{
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('MedicineData/editMedicineFor/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_for"]').val(data.med_id);
            $('[name="medicine_for_update"]').val(data.med_for);
            $('#medicinefor_update_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#for').text('Edit Medicine Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_medicine_type(id)
{
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('MedicineData/editMedicineType/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_type"]').val(data.med_id);
            $('[name="medicine_type_update"]').val(data.med_type);
            $('#medicinetype_update_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#type').text('Edit Medicine Type Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_medicine_graph(id)
{
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('MedicineData/editMedicineGraphSettings/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            var typeGraph = data.description;
            $('[name="id_graph"]').val(data.id);
            $('[name="medicine_graph_update"]').val(data.description);
            $('[name="medicine_quantity"]').val(data.quantity);
            $('#medicinegraph_update_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#type').text('Edit '+typeGraph+ ' Quantity'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

    function updateType()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/updateMedicineType'); ?>",
            data: $('#medicine-type-update-form').serialize(),
            success: function (responce) {
                    $("#update_type_content").html("Medicine Type details Successfully Updated..");
                    loadMedicineTypeTable();
            }
        });
    }
    
    function updateFor()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/updateMedicineFor'); ?>",
            data: $('#medicine-for-update-form').serialize(),
            success: function (responce) {
                    $("#update_for_content").html("Medicine Usage details Successfully Updated..");
                    loadMedicineForTable();
            }
        });
    }
    function updateGraph()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/updateMedicineGraphSettings'); ?>",
            data: $('#medicine-graph-update-form').serialize(),
            success: function (responce) {
                    $("#update_graph_content").html("Medicine Graph Settings Successfully Updated..");
                    //$('#update_graph_content').on('hidden.bs.modal', function () {
                        location.reload(true);
                    //}); 
            }
        });
    }
</script>


<div id="medicinetype_modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="type" class="modal-title">Medicine Type</h4>
            </div>
            <div class="modal-body">
                <form id="medicine-type-form">
                    <div class="form-group">
                        <input type="text" class="form-control required lettersonly" name="medicine_type" id="medicine_type" placeholder="Medicine Type">
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="medicinefor_modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="for" class="modal-title">Medicine Usage</h4>
            </div>
            <div class="modal-body">
                <form id="medicine-for-form">
                    <div class="form-group">
                        <input type="text" class="form-control required lettersonly" name="medicine_for" id="medicine_for" placeholder="Medicine Usage">
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="medicinegraph_update_modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="type" class="modal-title">Medicine Graph Settings</h4>
            </div>
            <div class="modal-body" id="update_graph_content">
                <form id="medicine-graph-update-form">
                    <div class="form-group">
                        <input type="hidden" name="id_graph" id="id_graph">
                        <input type="text" class="form-control required lettersonly" name="medicine_graph_update" id="medicine_graph_update" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control required number" name="medicine_quantity" id="medicine_quantity" placeholder="Medicine Quantity">
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>



<div id="medicinetype_update_modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="type" class="modal-title">Medicine Type</h4>
            </div>
            <div class="modal-body" id="update_type_content">
                <form id="medicine-type-update-form">
                    <div class="form-group">
                        <input type="hidden" name="id_type" id="id_type">
                        <input type="text" class="form-control required lettersonly" name="medicine_type_update" id="medicine_type_update" placeholder="Medicine Type">
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="medicinefor_update_modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="for" class="modal-title">Medicine Usage</h4>
            </div>
            <div class="modal-body" id="update_for_content">
                <form id="medicine-for-update-form">
                    <div class="form-group">
                        <input type="hidden" name="id_for" id="id_for">
                        <input type="text" class="form-control required lettersonly" name="medicine_for_update" id="medicine_for_update" placeholder="Medicine Usage">
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <strong>You Cannot Reverse This Action. Are You Sure Delete this Data?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
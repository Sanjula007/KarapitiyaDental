<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" href="<?php echo base_url('assest/css/dataTables.bootstrap.css'); ?>" />
<script src="<?php echo base_url('assest/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/Chart.js'); ?>"></script>
<script src="<?php // echo base_url('assest/js/Chart.min.js'); ?>"></script>
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

        <div class="col-md-9">
                    <div class="box">
                        <!-------------------------High Stock Graph------------------------------------------->
                            <h3>Medicine High Stock Graph</h3>
                            <p class="lead">Medicine With Excess Stock Will Be Shown Here.</p>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="barChart" style="height:230px"></canvas>
                                </div>
                            </div>
                            <br>
                        <!--------------------------End High Stock Graph--------------------------------------->
                        <!-------------------------------Low Stock Graph--------------------------------------->
                            <h3>Medicine Low Stock Graph</h3>
                            <p class="lead">Medicine With Less Stock Will Be Shown Here.</p>

                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="barChartLow" style="height:230px"></canvas>
                                </div>
                            </div>
                            <br>
                        <!----------------------------End Low Stock Graph------------------------------------->
                        
                        <h1>Medicine Details</h1>
                        <p class="lead">Change The Medicine details here.</p>
                        <p class="text-muted">All the Medicine Details will be shown here.</p>

                        <br>
                        <br>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Generic Name</th>
                                    <th>Type</th>
                                    <th>Medicine for</th>
                                    <th>Manufacturer</th>
                                    <th>Quantity</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                            </tbody>-->

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Generic Name</th>
                                <th>Type</th>
                                <th>Medicine for</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
        </div>

    </div>
</div>

<script type="text/javascript">

var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('MedicineData/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $.validator.addMethod("regx", function(value, element, regexpr) {          
        return regexpr.test(value);
        }, "Please enter a valid pasword.");
    $( "#medicine_update_form" ).validate( {
                errorClass: "my-error-class",
                validClass: "my-valid-class",
                rules: {
                        medicine_name: {
//                            remote: {
//                                url: "<?php echo site_url('MedicineData/checkNameEdit') ?>",
//                                type: "post",
//                                data: {
//                                    action: function () {
//                                        return "checkName";
//                                    }
//                                },
//                            },
                                required: true,
                                regx: /^[a-z .,\-]+$/i,
                            },
                        medicine_gen_name: {
//                            remote: {
//                                url: "<?php echo site_url('MedicineData/checkgenNameEdit')?>",
//                                type: "post",
//                                data: {
//                                    action: function () {
//                                        return "checkgenName";
//                                    }
//                                },
//                            },
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
                        medicine_name: {
                            required : "Medicine Name Cannot Be Empty",
                            regx: "Please Enter Only Characters to Medicine Name",
                        },
                        medicine_gen_name: {
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
                    updateMedicineData();
                }
                
        } );
    });
   

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function delete_medicine(id)
{
    //$('#confirm').modal({ backdrop: 'static', keyboard: false })
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('MedicineData/medicine_delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
         });
}

function edit_medicine(id)
{
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('MedicineData/medicine_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="medicine_name"]').val(data.med_name);
            $('[name="medicine_gen_name"]').val(data.med_generic_name);
            $('[name="med_type"]').val(data.med_type);
            $('[name="med_for"]').val(data.medicine_for);
            $('[name="med_menufacturer"]').val(data.med_manufacturer);
            $('[name="med_quantity"]').val(data.med_quantity);
            $('#modal_medicine_update_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Medicine Details'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

    function updateMedicineData()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('MedicineData/updateMedicine'); ?>",
            data: $('#medicine_update_form').serialize(),
            success: function (responce) {
                //$(".ajax_response_result").html(responce);
                    //$("#model_update_content").html("Transaction is Completed..");
                    $('#modal_medicine_update_form').modal('hide');
                    $('#success').modal('show');
                    reload_table();
            }
        });
    }
</script>

<script>
      $(function () {
        var barChartDataHighStock = {
            labels: [<?php echo $highstockgraphinfo['label']; ?>],
            datasets: [
              {
                label: "Medicine",
                fillColor: "rgba(210, 214, 222, 1)",
                strokeColor: "rgba(210, 214, 222, 1)",
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [<?php echo $highstockgraphinfo['dataset']; ?>]
              }
            ]
          };
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = barChartDataHighStock;
        barChartData.datasets[0].fillColor = "#00a65a";
        barChartData.datasets[0].strokeColor = "#00a65a";
        barChartData.datasets[0].pointColor = "#00a65a";
        var barChartOptions = {
          scaleBeginAtZero: true,
          scaleShowGridLines: true,
          scaleGridLineColor: "rgba(0,0,0,.05)",
          scaleGridLineWidth: 1,
          scaleShowHorizontalLines: true,
          scaleShowVerticalLines: true,
          barShowStroke: true,
          barStrokeWidth: 2,
          barValueSpacing: 5,
          barDatasetSpacing: 1,
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
        
        
            var barChartDataLowStock = {
            labels: [<?php echo $lowstockgraphinfo['label']; ?>],
            datasets: [
              {
                label: "Medicine",
                fillColor: "rgba(210, 214, 222, 1)",
                strokeColor: "rgba(210, 214, 222, 1)",
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [<?php echo $lowstockgraphinfo['dataset']; ?>]
              }
            ]
          };
        var barChartCanvas = $("#barChartLow").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = barChartDataLowStock;
        barChartData.datasets[0].fillColor = "#D7504C";
        barChartData.datasets[0].strokeColor = "#D7504C";
        barChartData.datasets[0].pointColor = "#D7504C";
        var barChartOptions = {
          scaleBeginAtZero: true,
          scaleShowGridLines: true,
          scaleGridLineColor: "rgba(0,0,0,.05)",
          scaleGridLineWidth: 1,
          scaleShowHorizontalLines: true,
          scaleShowVerticalLines: true,
          barShowStroke: true,
          barStrokeWidth: 2,
          barValueSpacing: 5,
          barDatasetSpacing: 1,
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
      });
      
      
</script>


<!--Bootstrap modal for Delete Confirmation------>

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
<!--End Bootstrap modal for Delete Confirmation-->

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




<!-- Bootstrap modal -->
<div class="modal fade" id="modal_medicine_update_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Medicine Details</h3>
            </div>
            <div class="modal-body form" id="model_update_content">
                <form action="#" id="medicine_update_form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Medicine Name</label>
                            <div class="col-md-9">
                                <input name="medicine_name" id="medicine_name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Generic Name</label>
                            <div class="col-md-9">
                                <input name="medicine_gen_name" id="medicine_gen_name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Medicine Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="med_type" name="med_type">
                                    <option value="">Please Select</option>
                                    <?php foreach ($medicineType as $row) { ?>
                                        <option value="<?php echo $row->med_type; ?>"><?php echo $row->med_type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Medicine For</label>
                            <div class="col-md-9">
                                <select class="form-control" id="med_for" name="med_for">
                                    <option value="">Please Select</option>
                                    <?php foreach ($medicineFor as $row) { ?>
                                        <option value="<?php echo $row->med_for; ?>"><?php echo $row->med_for; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Manufacturer</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="med_menufacturer" name="med_menufacturer">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Quantity</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="med_quantity" name="med_quantity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-primary"> Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<script>
    
</script>
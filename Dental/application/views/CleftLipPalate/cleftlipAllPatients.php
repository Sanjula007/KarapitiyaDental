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
                        <h1>Cleft Lip Palate Patient Details</h1>
                        <p class="lead">All the Patients with Cleft lip disorder will be shown here.</p>
                        <p class="text-muted"></p>

                        <br>
                        <br>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Date Recorded</th>
                                    <th style="width:130px;">Action</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                            </tbody>-->

                            <tfoot>
                            <tr>
                                <th>Patient ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Date Recorded</th>
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
            "url": "<?php echo site_url('CleftLipPalate/ajax_list')?>",
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

});
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function delete_patientCleftLip(id)
{
    //$('#confirm').modal({ backdrop: 'static', keyboard: false })
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('CleftLipPalate/cleftlipPatientDelete')?>/"+id,
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

function view_patientCleftLip(id)
{
    window.location.href = "<?php echo site_url('CleftLipPalate/viewPatientsCleftLip')?>/"+id;
}
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


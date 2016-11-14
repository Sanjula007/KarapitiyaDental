<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Stock</title>
	<!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/media/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
	
	<style type="text/css" class="init">
	
	</style>
	
	<script type="text/javascript" language="javascript" src="<?= base_url(); ?>/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js">
	</script>
	<script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?= base_url(); ?>/media/js/dataTables.bootstrap.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?= base_url(); ?>/resources/syntax/shCore.js">
	</script>

	<script type="text/javascript" language="javascript" class="init">
	
$(document).ready(function() {
	loadtable();
} );

	</script>
<script>
	function loadtable(){
		"use strict";
	$("#mytable").dataTable().fnDestroy()
	var table=$('#mytable').DataTable( {
		
		"processing": true,
		"serverSide": true,
		"ajax": {
            "url": "<?php echo base_url('index.php/Stock/LoadTable/getall'); ?>",
            "type": "POST"
        },
        'responsive': true,
		"pagingType": "full_numbers",
		"columns": [
		    { "width": "10%" },
		    { "width": "20%" },
		    { "width": "20%" },
		    { "width": "20%" },
		    { "width": "10%" },
		    { "width": "20%" },
		    { "width": "10%" },
		   
		    
		  ],dom: 'Bfrtip',
		        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            'pageLength'
        ],lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],columnDefs: [ {
            targets: 0,
            visible: false
        } ]
        
		//"ajax": "<?php echo base_url('index.php/SClass/ajaxclassdata'); ?>"
	} );
	//getaction();

	
	
	}
	
</script>

</head>
</head>
    <div id="all" >

        <div id="content">
            <div class="container" style='width: 80%;'>

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li>Stock</li>
                    </ul>

                </div>

                <?php $this->load->view('SideBar'); ?>

 	<div class="col-md-9">
 		 <div class="box">
		<section>
			<h4>Stock <span>Details</span></h4>
			
			<table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Item</th>
						<th>Model</th>
						<th>Category</th>
						<th>Quentity</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>

				
			</table>


	</section>
	</div></div></div></div></html>
</body>
</html>
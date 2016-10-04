<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>DataTables example - Bootstrap 3</title>
	<!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../../media/css/dataTables.bootstrap.css">
	
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="../../media/js/dataTables.bootstrap.js">
	</script>
	<script type="text/javascript" language="javascript" src="../../resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="../../resources/demo.js">
	</script>
	<script type="text/javascript" language="javascript" class="init">
	
$(document).ready(function() {
	loadtable();
} );

	</script>
<script>
	function loadtable(){
		"use strict";
	$("#example").dataTable().fnDestroy()
	table=$('#example').DataTable( {
		
		"processing": true,
		"serverSide": true,
		"ajax": {
            "url": "<?php echo base_url('index.php/PatientA/getpatient'); ?>",
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
		    { "width": "10%" },
		    { "width": "10%" },
		    
		  ]
		//"ajax": "<?php echo base_url('index.php/SClass/ajaxclassdata'); ?>"
	} );
	getaction();

	
	
	}
	

</script>
<style type="text/css">
	tr{
	 border: 10px solid black;
	//background-color : red;

	}

</style>
</head>
    <div id="all" >

        <div id="content">
            <div class="container" style='width: 80%;'>

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li>My wishlist</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU *** -->
                    	<?php  $this->load->view('Sidebar');  ?>

                    <!-- *** CUSTOMER MENU END *** -->
                </div>	
 	<div class="col-md-9">
 		 <div class="box">
		<section>
			<h4>Patients <span>Details</span></h4>
			
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Date of Birth</th>
						<th>Registered date</th>
					</tr>
				</thead>

				
			</table>


	</section>
	</div></div></div></div></html>
</body>
</html>
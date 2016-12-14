<link rel="stylesheet" href="<?php echo base_url('assest/'); ?>css/datetimepicker.css"/>
<div class="container">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="#">Appoinment</a></li>
			<li>Add</li>
		</ul>

	</div>

	<div class="col-md-12" ng-app="appoinmentApp" ng-controller="appoinmentController"> 
	<!-- app controller -->

		<div class="box">
			<div class="post">
				<h3 col-sm-3>New Appoinment</h3><hr />

			    <form action="" method="POST" role="form">
                  
                
                    <div class="form-group">
                        <label for="">Patient Name</label>
                        <input type="text" class="form-control" id="" placeholder="Patient Name">
                    </div>

                    <div class="form-group">
                        <label for="">Complaint</label>
                        <input type="text" class="form-control" id="" placeholder="Complaint">
                    </div>

                    <div class="form-group">
                        <label for="">Doctor</label>
                        <input type="text" class="form-control" id="" placeholder="Doctor Name">
                    </div>


                
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
			</div>
		</div>



<!-- <script type="text/javascript" src="<?php echo base_url('assest/'); ?>js/moment.js"></script> -->
<script src="<?php echo base_url('assest/'); ?>js/angular.min.js"></script>
<!-- <script src="<?php echo base_url('assest/'); ?>js/angular-sanitize.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-animate.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-messages.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/ui-bootstrap.min.js"></script> -->
<script src="<?php echo base_url('assest/'); ?>js/angular_components/controllers/appoinmentController.js"></script>
<script type="text/javascript" src="<?php echo base_url('assest/'); ?>js/datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assest/'); ?>js/datetimepicker.templates.js"></script>
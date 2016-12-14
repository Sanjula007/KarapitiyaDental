<div class="container">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="#">Restorative Unit</a></li>
			<li>Patient Examination</li>
		</ul>

	</div>

	<div class="col-md-12" > 
	<!-- app controller -->

		<!-- <div class="box">
			<div class="post">
				<h3 col-sm-3>Patient Profile</h3><hr />

			
			</div>
		</div> -->

<div class="col-md-4">
    <div class="box" style="min-height: 280px ">
        <h4>Presonal Details</h4>
        
        <table>
            <?php foreach($patient as $row){?>
            <tr>
                <td><label >Name :</label></td>
                <td><label ><?php echo $row->title.'. '.$row->fname.' '.$row->lname;?></label></td>
            </tr>
            <tr>
                <td><label>Age :</label></td>
                <td><label ><?php    $datetime1 = date_create(date('Y-m-d'));  $datetime2 = date_create($row->dob); $interval = date_diff($datetime1, $datetime2);echo $interval->format('%y Year %m Month' );?></label></td>
            </tr>
            <tr>
                <td><label>Gender :</label></td>
                <td><label ><?php echo $row->gender;?></label></td>
            </tr>
            <tr>    
                <td><label>Registration Date :</label></td>
                <td><label ><?php echo $row->regdatetime?></label></td>
            </tr>
            <tr>
                <td><label>Telephone :</label></td>
                <td><label ><?php echo $row->phone;?></label></td>
            </tr>
            <tr>    
                <td><label>Address :</label></td>
                <td><label ><?php echo $row->address?></label></td>
            </tr>
            <tr>        
                <td><label>Email :</label></td>
                <td><label ><?php echo $row->email?></label></td>
            </tr>
            <tr>    
                <td><label>Occupation :</label></td>
                <td><label ><?php echo $row->occupation?></label></td>
            </tr>
            <?php } ?>
        </table>
	</div>
</div>
	
<script src="<?php echo base_url('assest/'); ?>js/angular.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-sanitize.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-animate.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-messages.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/ui-bootstrap.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/restorativeApp.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/controllers/examinationController.js"></script>
<div class="container">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="#">Restorative Unit</a></li>
			<li>Patient Record</li>
		</ul>

	</div>

	<div class="col-md-12" ng-app="restorativeApp" ng-controller="restorativeController">

		<div class="box">
			<div class="post">
				<h3>Record</h3><hr>
				
					<form name="resForm" ng-submit="submitForm()" novalidate>
							<div class="row">
								<div class="col-sm-offset-1" style="margin-bottom:2%"><strong>Complaint</strong></div>
								
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label class="control-label">Main Complaint</label>
										<input
											ng-model="res.complaint" 
											class="form-control" 
											type="text" 
											name="complaint"
											required
											ng-class="{'has-error':resForm.complaint.$invalid && !resForm.complaint.$pristine || (resForm.complaint.$invalid && resForm.$submitted),'no-error':resForm.complaint.$valid && resForm.$submitted}">
											
											<div class="error-container" ng-show="resForm.complaint.$invalid && resForm.$submitted" ng-messages="resForm.complaint.$error">
							  					<div class="error" ng-message="required">
							   						<!-- <i class="ion-information-circled"></i>  -->
							   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
							    					This field is required!
							  					</div>
											</div>

									</div>
									<div class="form-group">
										<label class="control-label">H/O/C</label>
										<input 
											ng-model="res.hoc"
											class="form-control" 
											type="text" 
											name="hoc"
											required
											ng-class="{'has-error':(resForm.hoc.$invalid && !resForm.hoc.$pristine) ||(resForm.hoc.$invalid && resForm.$submitted),'no-error':resForm.hoc.$valid && resForm.$submitted}">

											<div class="error-container" ng-show="resForm.hoc.$invalid  && resForm.$submitted" ng-messages="resForm.hoc.$error">
							  					<div class="error" ng-message="required">
							   						<!-- <i class="ion-information-circled"></i>  -->
							   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
							    					This field is required!
							  					</div>
											</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-offset-1" style="margin-bottom:2%"><strong>History</strong></div>
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label class="control-label" ng-click="isPmhCollapsed = !isPmhCollapsed">
											<strong>Past Medical History</strong>
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</label>
										<div uib-collapse="isPmhCollapsed">
											<input
												ng-model="res.pmh" 
												class="form-control" 
												type="text" 
												name="pmh">
										</div>
										
									</div>

									<div class="form-group">
										<label class="control-label" ng-click="isAllergyCollapsed = !isAllergyCollapsed">
											<strong>Allergy</strong>
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</label>
										<div uib-collapse="isAllergyCollapsed">
											<input
												ng-model="res.allergy" 
												class="form-control" 
												type="text" 
												name="allergy">
										</div>
										
									</div>

									<div class="form-group">
										<label class="control-label" ng-click="isMedicationsCollapsed = !isMedicationsCollapsed">
											<strong>Medications</strong>
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</label>
										<div uib-collapse="isMedicationsCollapsed">
											<input
											ng-model="res.medication" 
											class="form-control" 
											type="text" 
											name="medication">
										</div>
										
									</div>

									<div class="form-group">
										<label class="control-label" ng-click="isPdhCollapsed = !isPdhCollapsed">
											<strong>Past Dental History</strong>
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</label>
										<div uib-collapse="isPdhCollapsed">
											<input
												ng-model="res.pdh" 
												class="form-control" 
												type="text" 
												name="pdh">
										</div>
										
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-offset-1" style="margin-bottom:2%"><strong>Habbits</strong></div>
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label class="control-label" ng-click="isHabbitCollapsed = !isHabbitCollapsed">
											<strong>Relevant Habits</strong>
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</label>
										<div uib-collapse="isHabbitCollapsed">
											<input 
											ng-model="res.habit"
											class="form-control" 
											type="text" 
											name="habit">
										</div>
										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" 
										class="btn btn-primary pull-right">
										<i class="fa fa-chevron-right" aria-hidden="true"></i>
										Next 
									</button>
								</div>
							</div>					
					</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assest/'); ?>js/angular.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-sanitize.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-animate.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular-messages.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/ui-bootstrap.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/restorativeApp.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/controllers/restorativeController.js"></script>
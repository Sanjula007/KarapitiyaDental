<div class="container">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="#">Restorative Unit</a></li>
			<li>Patient Examination</li>
		</ul>

	</div>

	<div class="col-md-12" ng-app="restorativeApp" ng-controller="examinationController">

		<div class="box">
			<div class="post">
				<h3 col-sm-3>Examination</h3><button ng-click="back()" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i>Back</button><hr>
				
					<form name="exmForm" ng-submit="submitForm()" novalidate>	
						
						<div class="row">		
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label class="control-label"><strong>General</strong></label>
									<input
										ng-model="exm.general" 
										class="form-control" 
										type="text" 
										name="general"
										required
										ng-class="{'has-error':exmForm.general.$invalid && !exmForm.general.$pristine || (exmForm.general.$invalid && exmForm.$submitted),'no-error':exmForm.general.$valid && exmForm.$submitted}">
										
										<div class="error-container" ng-show="exmForm.general.$invalid && exmForm.$submitted" ng-messages="exmForm.general.$error">
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
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label class="control-label"><strong>Extra Oral</strong></label>
									<input 
										ng-model="exm.extraOral"
										class="form-control" 
										type="text" 
										name="extraOral"
										required
										ng-class="{'has-error':(exmForm.extraOral.$invalid && !exmForm.extraOral.$pristine) ||(exmForm.extraOral.$invalid && exmForm.$submitted),'no-error':exmForm.extraOral.$valid && exmForm.$submitted}">

										<div class="error-container" ng-show="exmForm.extraOral.$invalid  && exmForm.$submitted" ng-messages="exmForm.extraOral.$error">
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
							<div class="col-sm-8 col-sm-offset-2">

								<div class="form-group">
									<label class="control-label"><strong>Intra Oral</strong></label>
									<input 
										ng-model="exm.intraOral"
										class="form-control" 
										type="text" 
										name="intraOral"
										required
										ng-class="{'has-error':(exmForm.intraOral.$invalid && !exmForm.intraOral.$pristine) ||(exmForm.intraOral.$invalid && exmForm.$submitted),'no-error':exmForm.intraOral.$valid && exmForm.$submitted}">

										<div class="error-container" ng-show="exmForm.intraOral.$invalid  && exmForm.$submitted" ng-messages="exmForm.intraOral.$error">
						  					<div class="error" ng-message="required">
						   						<!-- <i class="ion-information-circled"></i>  -->
						   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
						    					This field is required!
						  					</div>
										</div>
								</div>

								<div class="form-group">
									<div class="form-group">
										<div class="row" style="padding-left:2%;margin-bottom:3%">
											<span class="pull-left">
												<strong>Soft Tissues</strong>
											</span>
										</div>
										
											<div class="form-group">
												<label class="control-label">Oral Mucossa</label>
												<input 
													ng-model="exm.oralMucosa"
													class="form-control" 
													type="text" 
													name="oralMucosa"
													required
													ng-class="{'has-error':(exmForm.oralMucosa.$invalid && !exmForm.oralMucosa.$pristine) ||(exmForm.oralMucosa.$invalid && exmForm.$submitted),'no-error':exmForm.oralMucosa.$valid && exmForm.$submitted}">

													<div class="error-container" ng-show="exmForm.oralMucosa.$invalid  && exmForm.$submitted" ng-messages="exmForm.oralMucosa.$error">
									  					<div class="error" ng-message="required">
									   						<!-- <i class="ion-information-circled"></i>  -->
									   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
									    					This field is required!
									  					</div>
													</div>
											</div>

											<div class="form-group">
												<label class="control-label">Gingiva</label>
												<input 
													ng-model="exm.gingiva"
													class="form-control" 
													type="text" 
													name="gingiva"
													required
													ng-class="{'has-error':(exmForm.gingiva.$invalid && !exmForm.gingiva.$pristine) ||(exmForm.gingiva.$invalid && exmForm.$submitted),'no-error':exmForm.gingiva.$valid && exmForm.$submitted}">

													<div class="error-container" ng-show="exmForm.gingiva.$invalid  && exmForm.$submitted" ng-messages="exmForm.gingiva.$error">
									  					<div class="error" ng-message="required">
									   						<!-- <i class="ion-information-circled"></i>  -->
									   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
									    					This field is required!
									  					</div>
													</div>
											</div>

											<div class="form-group">
												<label class="control-label">Plaque Index</label>
												<input 
													ng-model="exm.plaqueIndex"
													class="form-control" 
													type="text" 
													name="plaqueIndex"
													required
													ng-pattern="/^[0-9]{1,7}$/"
													ng-class="{'has-error':(exmForm.plaqueIndex.$invalid && !exmForm.plaqueIndex.$pristine) ||(exmForm.plaqueIndex.$invalid && exmForm.$submitted),'no-error':exmForm.plaqueIndex.$valid && exmForm.$submitted}">

													<div class="error-container" ng-show="exmForm.plaqueIndex.$invalid  && exmForm.$submitted" ng-messages="exmForm.plaqueIndex.$error">
									  					<div class="error" ng-message="required">
									   						<!-- <i class="ion-information-circled"></i>  -->
									   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
									    					This field is required!
									  					</div>

									  					<div class="error" ng-message="pattern">
									   						<!-- <i class="ion-information-circled"></i>  -->
									   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
									    					Insert valid Index.
									  					</div>
													</div>
											</div>
									</div>
									
									<div class="form-group">
										<div class="row" style="padding-left:2%;margin-bottom:3%">
											<span class="pull-left">
												<strong>Hard Tissues</strong>
											</span>
										</div>
						
											<div class="form-group">
												<label class="control-label">Nature of ridges</label>
												<input 
													ng-model="exm.nor"
													class="form-control" 
													type="text" 
													name="nor"
													required
													ng-class="{'has-error':(exmForm.nor.$invalid && !exmForm.nor.$pristine) ||(exmForm.nor.$invalid && exmForm.$submitted),'no-error':exmForm.nor.$valid && exmForm.$submitted}">

													<div class="error-container" ng-show="exmForm.nor.$invalid  && exmForm.$submitted" ng-messages="exmForm.nor.$error">
									  					<div class="error" ng-message="required">
									   						<!-- <i class="ion-information-circled"></i>  -->
									   						<i class="fa fa-info" aria-hidden="true" color="#333333"></i>
									    					This field is required!
									  					</div>
													</div>
											</div>
								
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-10">
								<button type="submit" 
									class="btn btn-primary pull-right">
									<i class="fa fa-floppy-o" aria-hidden="true"></i>
									Save
								</button>
							</div>
						</div>


					</form>
			</div>
		</div>
	</div>
</div>
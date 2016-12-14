<div class="container">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="#">Restorative Unit</a></li>
			<li>Teeth Graph</li>
		</ul>

	</div>
	<script src="<?php echo base_url('assest/'); ?>js/fabric.js"></script>

	<div class="col-md-12" ng-app="graphApp" ng-controller="GraphController">

		<div class="box">
			<div class="post">
				<h3>Graph</h3>
					<hr />
				
				<div class="row">
					<div class="col-sm-12">
						<input class="col-sm-3" type="text" placeholder="patient ID">
						<div class="col-sm-2">
							<button class="btn btn-primary" >Search</button>
						</div>
						
						<br />
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-sm-12 col-sm-offset-3">
						<div class="btn-group">
					        <label class="btn btn-default" ng-model="radioModel" uib-btn-radio="0" ng-click="addCarie()">1. Dental carries</label>
					        <label class="btn btn-default" ng-model="radioModel" uib-btn-radio="1"
					        ng-click="addCarie()">2. Pulp exposed</label>
					        <label class="btn btn-default" ng-model="radioModel" uib-btn-radio="2"
					        ng-click="addCarie()">3. Septic roots</label>
					        <label class="btn btn-default" ng-model="radioModel" uib-btn-radio="3"
					        ng-click="addCarie()">4. Abscess</label>
					        <label class="btn btn-default" ng-model="radioModel" uib-btn-radio="4"
					        ng-click="addCarie()">5. Discoloured</label>

					    </div>

					    <button ng-click="postTeethData()"> post data</button>
					</div>	
				</div>
				<br />
				<div class="well well-md row">
					<div class="col-sm-12" style="padding:0px;margin-bottom:5px;">
						<div class="col-sm-6" style="padding:0px;">
							<div class="test" style="width:53px;">
								<span class="label label-success" >8</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >7</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >6</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >5</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >4</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >3</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >2</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >1</span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="test" style="width:53px;">
								<span class="label label-success" >1</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >2</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >3</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >4</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >5</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >6</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >7</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >8</span>
							</div>
						</div>

					</div>

					<teeth></teeth>

					<div class="col-sm-12" style="padding:0px;">
						<div class="col-sm-6" style="padding:0px;">
							<div class="test" style="width:53px;">
								<span class="label label-success" >8</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >7</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >6</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >5</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >4</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >3</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >2</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >1</span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="test" style="width:53px;">
								<span class="label label-success" >1</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >2</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >3</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >4</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >5</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >6</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >7</span>
							</div>
							<div class="test" style="width:53px;">
								<span class="label label-success" >8</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					
					<div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Tooth Info</h3>
                        </div>

                        <div class="panel-body">
                            <form>
                                <div class="form-group">

                                	<div class="col-sm-12" >
										<div class="form-group col-sm-12">
											<label class="col-sm-3">Tooth</label>
											<label class="col-sm-3" ng-bind="data.teethData[data.selected].id"></label>
										</div>

										<div class="form-group col-sm-12">
											<label class="col-sm-3">Carie</label>
											<label class="col-sm-3">
												<span ng-repeat="carie in data.teethData[data.selected].carie">{{carie}} </span>
											{{}}</label>
										</div>

										<div class="form-group col-sm-12" >
											<label class="col-sm-3">Treatment</label>
											<div class="col-sm-3">
												<!-- <p ng-if="!data.treatment">-Add Treatment</p> -->
												<div class="panel panel-default panel-sm" ng-repeat="item in data.treatment" style="margin-bottom:7px">
													
												  	<div class="panel-body" style="padding:0px;text-align: center;">{{item}}
												  	<button class="btn btn-danger pull-right" ng-click="removeItem(item)">-</button>
												  	</div>
												</div>
											</div>
										</div>
										<div class="form-group col-sm-12">
											<div class="col-sm-3"></div>
											<div class="col-sm-2">
												<input type="text" placeholder="Add treatment"class="form-control " ng-model="item"/>
											</div>
											<div class="col-sm-1">
												<button class="btn btn-success pull-right" ng-click="addItem()">+</button>
											</div>
											
										</div>

									</div>
                                </div>
                            </form>

                        </div>
                    </div>
				</div>
							
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assest/'); ?>js/angular.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/ui-bootstrap.min.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/controllers/GraphController.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/directives/teethDirective.js"></script>
<script src="<?php echo base_url('assest/'); ?>js/angular_components/directives/drawDirective.js"></script>

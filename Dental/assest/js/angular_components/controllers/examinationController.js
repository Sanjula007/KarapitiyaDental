app.controller('examinationController',function($scope,$http,urlService) {
	var baseUrl = urlService.baseUrl();
	$scope.exm = {general:'',extraOral:'',intraOral:'',oralMucosa:'',gingiva:'',plaqueIndex:'',nor:''};

	$scope.submitForm = function(){
		if($scope.exmForm.$valid){

			$http({
			 	method:'POST',
				url: baseUrl+"Restorative/saveExamination",
				params:$scope.exm,
			}).then(function successCallback(response) {
				console.log(response.data);

			}, function errorCallback(response) {
			    console.log(response.data);
			});

			swal(
			  'Good job!',
			  'Record Added successfully!',
			  'success'
			)

			$scope.exm = {};
			$scope.exmForm.$setValidity();
		}
	}
});
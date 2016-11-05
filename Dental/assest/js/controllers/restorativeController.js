app.service('urlService',function(){
    return{
        baseUrl:function(){
            return "http://localhost/karapitiyaDental/Dental/index.php/";
        }
    }
})
app.controller('restorativeController', function($scope,$http,urlService) {
	var baseUrl = urlService.baseUrl();

	$scope.res = {complaint:'',hoc:'',pmh:'',allergy:'',medication:'',pdh:'',habit:''};

	$scope.isCollapsed = true;
	$scope.isHabbitCollapsed = true;
	$scope.isPdhCollapsed = true;
	$scope.isMedicationsCollapsed = true;
	$scope.isAllergyCollapsed = true;
	$scope.isPmhCollapsed = true;

	

	$scope.submitForm = function(){
		//console.log($scope.res);
		if($scope.resForm.$valid){

			$http({
			 	method:'POST',
				url: baseUrl+"Restorative/saveHistory",
				params:$scope.res,
			}).then(function successCallback(response) {
				console.log(response.data);

			}, function errorCallback(response) {
			    console.log(response.data);
			});

			$scope.resForm.complaint.$setValidity();
			$scope.resForm.hoc.$setValidity();
			window.location =  baseUrl+"Restorative/examination";	
		}
	}

});

app.controller('examinationController',function($scope,$http,urlService) {
	var baseUrl = urlService.baseUrl();
	$scope.exm = {general:'',extraOral:'',intraOral:'',oralMucosa:'',gingiva:'',plaqueIndex:'',nor:''};
	$scope.back = function (){
		window.location =  baseUrl+"Restorative/history";
	}
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
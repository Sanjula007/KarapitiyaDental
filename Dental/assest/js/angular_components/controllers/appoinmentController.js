var app = angular.module('apponmentApp',[]);
// 'ngMessages','ui.bootstrap','ngAnimate','ngSanitize','ui.bootstrap.datetimepicker'
app.service('urlService',function(){
    return{
        baseUrl:function(){
            return "http://localhost/karapitiyaDental/Dental/index.php/";
        }
    }
});

app.controller('appoinmentController',function($scope,$http,urlService) {
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
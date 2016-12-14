$(document).ready(function(){ 
    document.oncontextmenu = function() {return false;};

     
});

var graphApp = angular.module('graphApp',['ui.bootstrap']);

graphApp.service('url_service',function(){
    return{
        baseUrl:function(domain){
            return "http://localhost/karapitiyaDental/Dental/index.php/";
        }
    }
});

(function () {
	
    var GraphController = function ($scope,url_service) {
    	var baseUrl = url_service.baseUrl();
    	$scope.canvasArr = new Array(32);

        $scope.caries = [
            {name:'Dental Carie',color:'red'},
            {name:'Pulp Exposed',color:'green'},
            {name:'Septic Roots',color:'yellow'},
            {name:'Abscess',color:'blue'},
            {name:'Discoloured' ,color:'orange'}];

        $scope.selected = 0;
    	// $scope.radioModel = 0;
        $scope.data = { 
                        selected:0,
                        color:'', 
                        teethData:[{id:0,name:"Upper Left 1",svg:'<?xml version="1.0" encoding="UTF-8" standalone="no" ?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="57" height="57" viewBox="0 0 57 57" xml:space="preserve"><desc>Created with Fabric.js 1.6.7</desc><defs></defs><path d="M 0 0 L 56 0 L 42 14 L 14 14 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 7.5) translate(-28, -7) " stroke-linecap="round" /><path d="M 0 56 L 14 42 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 49.5) translate(-28, -49) " stroke-linecap="round" /><path d="M 0 0 L 14 14 L 14 42 L 0 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,165,0); fill-rule: nonzero; opacity: 1;" transform="translate(7.5 28.5) translate(-7, -28) " stroke-linecap="round" /><path d="M 56 0 L 42 14 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,0); fill-rule: nonzero; opacity: 1;" transform="translate(49.5 28.5) translate(-49, -28) " stroke-linecap="round" /><path d="M 14 14 L 42 14 L 42 42 L 14 42 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,128,0); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 28.5) translate(-28, -28) " stroke-linecap="round" /></svg>',carie:['Discoloured','Septic tooth']},{id:0,svg:'<?xml version="1.0" encoding="UTF-8" standalone="no" ?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="57" height="57" viewBox="0 0 57 57" xml:space="preserve"><desc>Created with Fabric.js 1.6.7</desc><defs></defs><path d="M 0 0 L 56 0 L 42 14 L 14 14 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 7.5) translate(-28, -7) " stroke-linecap="round" /><path d="M 0 56 L 14 42 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 49.5) translate(-28, -49) " stroke-linecap="round" /><path d="M 0 0 L 14 14 L 14 42 L 0 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,165,0); fill-rule: nonzero; opacity: 1;" transform="translate(7.5 28.5) translate(-7, -28) " stroke-linecap="round" /><path d="M 56 0 L 42 14 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,0); fill-rule: nonzero; opacity: 1;" transform="translate(49.5 28.5) translate(-49, -28) " stroke-linecap="round" /><path d="M 14 14 L 42 14 L 42 42 L 14 42 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,128,0); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 28.5) translate(-28, -28) " stroke-linecap="round" /></svg>',carie:['Discoloured','Septic tooth']},{id:0,svg:'<?xml version="1.0" encoding="UTF-8" standalone="no" ?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="57" height="57" viewBox="0 0 57 57" xml:space="preserve"><desc>Created with Fabric.js 1.6.7</desc><defs></defs><path d="M 0 0 L 56 0 L 42 14 L 14 14 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 7.5) translate(-28, -7) " stroke-linecap="round" /><path d="M 0 56 L 14 42 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 49.5) translate(-28, -49) " stroke-linecap="round" /><path d="M 0 0 L 14 14 L 14 42 L 0 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,165,0); fill-rule: nonzero; opacity: 1;" transform="translate(7.5 28.5) translate(-7, -28) " stroke-linecap="round" /><path d="M 56 0 L 42 14 L 42 42 L 56 56 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,0); fill-rule: nonzero; opacity: 1;" transform="translate(49.5 28.5) translate(-49, -28) " stroke-linecap="round" /><path d="M 14 14 L 42 14 L 42 42 L 14 42 z" style="stroke: rgb(0,0,0); stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,128,0); fill-rule: nonzero; opacity: 1;" transform="translate(28.5 28.5) translate(-28, -28) " stroke-linecap="round" /></svg>',
                        carie:['Discoloured','Septic tooth']}],
                        treatment:['Clean','Brush']};
        
        $scope.update = function(){
            //alert("updated");
            $scope.$digest();
        }

    	$scope.addCarie = function(){
          $scope.data.color = $scope.caries[$scope.radioModel].color;
        }

        $scope.draw = function(id){
    		alert('called draw');
    	};

    	$scope.hello = function(){
    		console.log("called");
    	}

        $scope.setColor = function(color){
           // console.log(color);
            $scope.data.color = color;
        }

        $scope.restCanvas = function(){

        }
//array push pop
        $scope.insertItem = function(item,to){
            to.push(item);

        }
   
        $scope.deleteItem = function(index,from){
            from.splice(index,1);
        }

        $scope.getIndex = function(array,item){
            return array.indexOf(item);
        }

        $scope.addItem = function(){
            var length = $scope.data.treatment;
            var count = 0 ;

            for(var i=0;i<length;i++){
                if($scope.item == $scope.data.treatment[i]){
                    console.log($scope.data.treatment[i]);
                    count++;
                }
            }
            if(count == 0){
                $scope.data.treatment.push($scope.item);
            }
            $scope.item =null;
        }

        $scope.removeItem = function(item){
            $scope.data.treatment.splice(item,1);
        }

        $scope.save = function(){

        }

        $scope.postTeethData = function (){
            $.ajax({
                url:baseUrl+'Teeth/patient_id',
                type: 'POST',
                data: {xml:$scope.data.teethData,treatment:$scope.data.treatment,carie:$scope.data.carie},
                success : function(Response){
                   console.log("sdsd");
                },
                error: function(Response){
                    console.log("GET permission list failed");
                }
            });
        }

    };

    GraphController.$inject = ['$scope','url_service'];

    graphApp.controller('GraphController', GraphController);

}());


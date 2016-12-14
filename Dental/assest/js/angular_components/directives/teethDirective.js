(function () {

	var controller = function ($scope) {
		
	};

	controller.$inject = ['$scope'];

	var teeth = function ($compile) {
	    return {
	        restrict: 'E', 
	        replace:true,       
	        controller: controller,
	        link: function ($scope, element, attrs) {

	            function init(){

	                var count = 8;
	                var html  = '<!-- teeth -->';
	                var i     = null;
	                var j     = null;
	                var k     = null;
	                var x     = 0;
	    			var type  = 5;

	                for(i=1;i<=2;i++){
	                	html += '<div class="row" style="padding:2px;">';
	                	for(j=1;j<=2;j++){
	                		html += '<div class="col-sm-6">'
	                		for(k=1;k<=count;k++){
	                			x++;

	                			if(5<x && x<12 || 21<x && x<28){
	                				type = 4;
	                			}else{
	                				type = 5;
	                			}


	                			html +=	'<div class="test">'+
		                                	'<canvas  id="t'+ x +'" width="57px" height="57px" draw data="data" action="update()" type="'+ type +'">'+
		                                	'</canvas>'+
		                            	'</div>';
	                		}
	                		html += '</div>';
	                	}
	                	html += '</div>';
	                }

	                element.replaceWith($compile(html)($scope));
	            }

	            init();
	        }
	    }
	};

angular.module('graphApp').directive('teeth', teeth);
}());
(function () {
    var controller = function ($scope) { 

        $scope.createCanvas = function(id){
            $scope.canvas = new fabric.Canvas(id);
        }

        $scope.getTooth = function (){

            var i = parseInt($scope.id.slice(1))-1;
            return i;
        }

        $scope.getToothData = function(data){
            var i = $scope.getTooth();
            return data.teethData[i];
        }

        $scope.setStaticState = function (objArr){
                  var length = objArr.length;
                  for(var i=0;i<length;i++){
                    objArr[i].hasControls = false;
                    objArr[i].lockMovementX = true;
                    objArr[i].lockMovementY = true;
                    objArr[i].hoverCursor = 'pointer';
                  }
        }

        $scope.draw = function(data){
            
            if($scope.getToothData(data)){
                var temp = data.teethData[$scope.getTooth()].svg;
                fabric.loadSVGFromString(temp, function(objects, options) {
                    $scope.setStaticState(objects);
                    $scope.canvas.add.apply($scope.canvas, objects);
                    $scope.canvas.renderAll();
                });
            }else{
                var objArr = new Array();
                var upper = null;
                var lower = null;
                var left = null;
                var right = null;

                if($scope.type == 4){

                    upper = new fabric.Path('M 0 0 L 28 28 L 56 0 z');
                    upper.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 0 });
                    upper.selectable = false;
                    
                    lower = new fabric.Path('M 0 56 L 28 28 L 56 56 z');
                    lower.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 28 });
                    lower.selectable = false;
                   

                    left = new fabric.Path('M 0 0 L 28 28 L 0 56 z');
                    left.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 0 });
                    left.selectable = false;
                    
                    right = new fabric.Path('M 56 0 L 28 28 L 56 56 z');
                    right.set({ fill:'#ffffff',stroke:'1px',left: 28, top: 0 });
                    right.selectable = false;

                    var upperC = new fabric.Circle({
                        name:'upperC', type:'circle', radius: 11, fill: '#ffffff' , left:17, top: 0
                    });
                    
                    var lowerC = new fabric.Circle({
                        name:'lowerC', type:'circle', radius: 11, fill: '#ffffff' , left: 17, top: 33
                    });

                    var leftC = new fabric.Circle({
                        name:'leftC', type:'circle', radius: 11, fill: '#ffffff' , left: 0, top:17 
                    });

                    var rightC = new fabric.Circle({
                        name:'rightC', type:'circle', radius: 11, fill: '#ffffff', left: 33, top: 17
                    });
                    

                    $scope.canvas.add(upper,lower,left,right,upperC,lowerC,leftC,rightC);
                    objArr.push(upper,lower,left,right,upperC,lowerC,leftC,rightC);

                }else{

                    var upper = new fabric.Path('M 0 0 L 56 0 L 42 14 L 14 14 z');
                    upper.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 0 });
                    
                    
                    var lower = new fabric.Path('M 0 56 L 14 42 L 42 42 L 56 56 z');
                    lower.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 42 });
                    

                    var left = new fabric.Path('M 0 0 L 14 14 L 14 42 L 0 56 z');
                    left.set({ fill:'#ffffff',stroke:'1px',left: 0, top: 0 });
                   
                
                    var right = new fabric.Path('M 56 0 L 42 14 L 42 42 L 56 56 z');
                    right.set({ fill:'#ffffff',stroke:'1px',left: 42, top: 0 });
                    
                    
                    var center = new fabric.Path('M 14 14 L 42 14 L 42 42 L 14 42 z');
                    center.set({ fill:'#ffffff',stroke:'1px',left: 14, top: 14 });
                    
                    $scope.canvas.add(upper,lower,left,right,center);
                    objArr.push(upper,lower,left,right,center);
                }

                

                $scope.setSelectedArea= function(obj){
                    var object = null;
                    var objectArr = new Array();

                    if(obj.name == 'upperC'){
                        object = upper;
                    }
                    if(obj.name == 'lowerC'){
                        object =lower;
                    }
                    if(obj.name == 'leftC'){
                        object =left;
                    }
                    if(obj.name == 'rightC'){
                        object =right;
                    }
                    obj.active = false;
                    obj.selectionColor = '#FFFFFF';
                    object.active = true;
                    objectArr.push(obj,object);
                    return objectArr;
                }

                $scope.setStaticState(objArr);
            }
            
        }
    };
    controller.$inject = ['$scope'];
    
    var draw = function () {
        return {
            restrict: 'A',    
            scope: {
                id: '@id',
                update:'&action',
                data:'=data',
                type:'@type', 
            },
            controller: controller,
            link: function ($scope, element, attrs) {
                
                function setColor(){
                    var color = $scope.data.color;
                    return color;
                }
                
                function init(){
                    jQuery(window).load(function () {
                        $scope.createCanvas($scope.id);
                        $scope.draw($scope.data);
                        //console.log($scope.canvas.toSVG());
                    });   
                }
               
                var elem = element.parent();
                    
                function fill(obj,color){
                    if(color){
                        if(obj.constructor === Array){
                            for(var i=0; i<2;i++){
                                fill(obj[i],color);
                            }
                        }else{
                            obj.set("fill",color);
                            obj.active = false; 
                        }  
                    }                        
                }   

                function reset(){
                    $scope.draw();
                }

                function save(data){
                    var svg = $scope.canvas.toSVG();
                    console.log($scope.getTooth());
                    //$scope.data.teethData[$scope.getTooth].svg = svg;
                }

                function checkTypeAndFill(obj,color){
                    if(obj){
                        if(obj.type == 'circle'){
                            var xx = $scope.setSelectedArea(obj);
                            fill(xx,color);
                        }else{
                            fill(obj,color);
                        }
                    }
                    save($scope.data);
                }

                function setSelected(){
                    $scope.data.selected = $scope.getTooth();
                }

                elem.on('click',function(event){
                    setSelected();
                    var obj = $scope.canvas.getActiveObject();
                    checkTypeAndFill(obj,setColor());
                    //obj.active = true;
                    $scope.canvas.discardActiveObject(); 
                    $scope.canvas.renderAll();
                });

                elem.mousedown(function(e){ 
                    if( e.button == 2 ) { 
                        setSelected();
                        var obj = $scope.canvas.getActiveObject();
                        var pointer = $scope.canvas.getPointer(e.originalEvent);
                        var objects = $scope.canvas.getObjects();
                        for (var i = objects.length - 1; i >= 0; i--) {
                            if (objects[i].containsPoint(pointer)) {
                                if(objects[i].type == "circle"){
                                    var yy = $scope.setSelectedArea(objects[i]);
                                    fill(yy,'#FFFFFF');
                                }else{
                                    if($scope.type == 5){
                                        $scope.canvas.setActiveObject(objects[i]);
                                    }
                                }
                                break;
                            }
                        }

                        if (i < 0) {
                            $scope.canvas.deactivateAll();
                        }

                        $scope.canvas.renderAll();
                        checkTypeAndFill(obj,'#FFFFFF');
                    return false; 
                    } 
                return true; 
                });
                init();       
            }
        }
    };

angular.module('graphApp').directive('draw', draw);
}());

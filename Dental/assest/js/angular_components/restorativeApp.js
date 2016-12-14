var app = angular.module('restorativeApp',['ngMessages','ui.bootstrap','ngAnimate','ngSanitize']);
app.service('urlService',function(){
    return{
        baseUrl:function(){
            return "http://localhost/karapitiyaDental/Dental/index.php/";
        }
    }
});
PATH = window.location.protocol + "//" + window.location.host + "/demo/gym/";
var App1 = angular.module("App1",['ui.bootstrap']);
var copyright = '<div class="container-fluid navbar-fixed-bottom copyright text-center text-info" style="background:#333">Software designed by &nbsp;&nbsp;<a style="font-size: 12px;" href="http://webrocom.net" target="_blank">WEBRO-COM IT Solution</div>';
$('body').append(copyright);
//country controller for country view and country php controller
    App1.controller('gridController', function ($scope, $http, $timeout){
        $("#loaderkender").show();
        $http.get(PATH+'admin/memberListLoad').success(function(data, status){
            $scope.list = data;
            $scope.currentPage = 1; //current page
            $scope.entryLimit = 10; //max no of items to display in a page
            $scope.filteredItems = $scope.list.length; //Initially for no filter  
            $scope.totalItems = $scope.list.length;
            $("#loaderkender").hide();
        });
        
        $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
        };
        $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
        };
        $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
        };
        
        if(typeof copyright === 'undefined'){
            alert('Please use licensed version');
            window.close();
            window.location.reload();
        };
    });
    
    App1.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    };
});

//PATH=window.location.protocol+"//"+window.location.host+"/gym/";var App1=angular.module("App1",["ui.bootstrap"]);var copyright='<div class="container-fluid navbar-fixed-bottom copyright text-center text-info" style="background:#333">Software designed by &nbsp;&nbsp;<a style="font-size: 12px;" href="http://webrocom.net" target="_blank">WEBRO-COM IT Solution</div>';$("body").append(copyright);App1.controller("gridController",function(e,t,n){t.get(PATH+"admin/memberListLoad").success(function(t,n){e.list=t;e.currentPage=1;e.entryLimit=10;e.filteredItems=e.list.length;e.totalItems=e.list.length});e.setPage=function(t){e.currentPage=t};e.filter=function(){n(function(){e.filteredItems=e.filtered.length},10)};e.sort_by=function(t){e.predicate=t;e.reverse=!e.reverse};if(typeof copyright==="undefined"){alert("Please use licensed version");window.close();window.location.reload()}});App1.filter("startFrom",function(){return function(e,t){if(e){t=+t;return e.slice(t)}return[]}})
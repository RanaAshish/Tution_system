

<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl">
    <div dismiss-on-timeout="2000" uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{{alert.msg}}</div>
    <div class="box-inner padding">
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Branch</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Branch</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading bg-white">
                Add New Branch
            </div>
            <div class="panel-body">
                <form name="form" ng-submit="addBranch()">
                    <div class="form-group">
                        <label>Branch name</label>
                        <input class="form-control" name="name" type="text" ng-model="branch.name" ng-required="true">
                        <span class="text-danger" ng-show="form.name.$touched && form.name.$invalid" class="text-danger">
                            <small>
                                This field is required.                            
                            </small>

                        </span>
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <input class="form-control" name="area" type="text" ng-model="branch.area" googleplace ng-required="true">
                        <span class="text-danger" ng-show="form.area.$touched && form.area.$invalid">
                            <small> 
                                This field is required.                           
                            </small>
                        </span>
                    </div> 
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" ng-model="branch.address" ng-required="true"></textarea>
                        <span class="text-danger" ng-show="form.address.$touched && form.address.$invalid">
                            <small>                                
                                This field is required.                            
                            </small>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Established year</label>
                        <p class="input-group"> 
                            <input type="text" class="form-control" 
                                   uib-datepicker-popup="yyyy" 
                                   show-button-bar="false" 
                                   ng-model="branch.year" 
                                   is-open="isOpen" 
                                   datepicker-options="{minMode: 'year'}" 
                                   datepicker-mode="'year'"
                                   ng-required="true"
                                   name="year"
                                   />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>
                        </p> 
                        <span class="text-danger" ng-show="form.year.$touched && form.year.$invalid">
                            <small>          
                                This field is required.
                            </small>
                        </span>
                    </div>
                    <div class="form-group row" ng-repeat="(key,contact) in branch.contacts track by key">
                        <div class="col-sm-12">
                            <label>Contact</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="contect_{{key}}" ng-model="branch.contacts[key]" ng-required="true"/>
                        </div>
                        <div class="col-sm-8">  
                            <button type="button" class="btn btn-primary waves-effect" ng-click="removeContact(key)" ng-hide="branch.contacts.length == 1">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-danger" ng-show="form.contect_{{key}}.$touched && form.contect_{{key}}.$invalid">
                                <small>          
                                    This field is required.
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <button type="button" class="btn btn-addon btn-primary waves-effect" ng-click="addContact()">
                            <i class="fa fa-plus"></i>Add more
                        </button>
                    </div>
                    <div class="form-group row" ng-repeat="(key,email) in branch.emails track by key">
                        <div class="col-sm-12">
                            <label>Email</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email_{{key}}" ng-model="branch.emails[key]" ng-required="true"/>
                        </div>
                        <div class="col-sm-2">  
                            <button type="button" class="btn btn-primary waves-effect" ng-click="removeEmail(key)" ng-hide="branch.emails.length == 1">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-danger" ng-show="form.email_{{key}}.$touched && form.email_{{key}}.$invalid">
                                <small>          
                                    This field is required.
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <button type="button" class="btn btn-addon btn-primary waves-effect" ng-click="addEmail()">
                            <i class="fa fa-plus"></i>Add more
                        </button>
                    </div>
                    <button type="submit" class="btn btn-success m-b waves-effect" ng-disabled="!form.$valid">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--
Google Map Api Key:
AIzaSyBFhy3EkQmrqLGnGgRx4K-DapTVtiF762I
-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBFhy3EkQmrqLGnGgRx4K-DapTVtiF762I"></script>
<script type="text/javascript">
        var app = angular.module("tutionApp", ['ui.bootstrap']);
        app.config(['$compileProvider','$httpProvider',function($compileProvider,$httpProvider){
            $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|chrome-extension|sms):/);
            $httpProvider.defaults.transformRequest = function (data) {
                if (data === undefined) {
                    return data;
                }
                return $.param(data);
            }
            $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        }]);
        app.directive('googleplace', function () {
            return {
                require: 'ngModel',
                link: function (scope, element, attrs, model) {
                    var options = {
                        types: [],
                        componentRestrictions: {country: "in"}

                    };
                    scope.gPlace = new google.maps.places.Autocomplete(element[0],
                            options);
                    google.maps.event.addListener(scope.gPlace, 'place_changed',
                            function () {
                                var geoComponents = scope.gPlace.getPlace();
                                var latitude = geoComponents.geometry.location.lat();
                                var longitude = geoComponents.geometry.location.lng();
                                var addressComponents = geoComponents.address_components;
                                scope.$apply(function () {
                                    model.$setViewValue(element.val());
                                    scope.gPlace = geoComponents.geometry;
                                    console.log(element.val());
                                    console.log("Latitude : " + latitude + "  Longitude : " + longitude);
                                });
                            });
                }

            };
        })
        app.controller("tutionCtrl", function ($scope,$filter,$http) {
            console.log("tutionCtrl is called");

            $scope.gPlace;
            $scope.alerts = [];
            $scope.branch = {};
            $scope.branch.contacts = [null];
            $scope.branch.emails = [null];

            $scope.addContact = function () {
                $scope.branch.contacts.push('');
            };
            $scope.addEmail = function () {
                $scope.branch.emails.push('');
            };

            $scope.removeContact = function (key) {
                $scope.branch.contacts.splice(key, 1);
            };
            $scope.removeEmail = function (key) {
                $scope.branch.emails.splice(key, 1);
            };

            $scope.addBranch = function(){
                $scope.branch.latitude = $scope.gPlace.location.lat();
                $scope.branch.longitude = $scope.gPlace.location.lng();
//                                $scope.branch.contacts = JSON.stringify($scope.branch.contacts);
//                                $scope.branch.emails = JSON.stringify($scope.branch.emails);
                $scope.branch.year = $filter('date')($scope.branch.year,"yyyy")
                console.log("$scope.branch:",$scope.branch);
                console.log("$scope.gPlace:",$scope.gPlace);
                $http({
                    url:"<?php echo base_url()."tution/Branch/addNewBranch"; ?>",
                    method:"POST",
                    data :$scope.branch,
                }).then(function(data){
                    console.log("data:",data)
                    if(data.status){
                        $scope.branch = {};
                        $scope.branch.contacts = [null];
                        $scope.branch.emails = [null];
                        $scope.alerts.push({type:'success',msg: 'Your Branch is successfully inserted'});
                    }else{
                        $scope.alerts.push({type:'danger',msg: 'Your Branch is insert operation is failed'});
                    }
                });
            }
            //For datepicker
            $scope.isOpen = false;
            $scope.open = function ($event) {
                $scope.isOpen = true;
            };
            $scope.closeAlert = function(index) {
                $scope.alerts.splice(index, 1);
            };
        });
</script>
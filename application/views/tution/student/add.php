<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl">
    <div dismiss-on-timeout="2000" uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{{alert.msg}}</div>
    <div class="box-inner padding">
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Student</span> - Add Student</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="tution/student"><i class="fa fa-users position-left"></i> Student</a></li>
                    <li class="active">Add Student</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading bg-white">
                Add Student
            </div>
            <div class="panel-body">
                <form name="form" ng-submit="addStudent()">
                    <div class="form-group">
                        <label>First name</label>
                        <input class="form-control" name="first_name" type="text" ng-model="student.first_name" ng-required="true">
                        <span class="text-danger" ng-show="form.first_name.$touched && form.first_name.$invalid" class="text-danger">
                            <small>
                                Please enter first name of student.
                            </small>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Middle name</label>
                        <input class="form-control" name="middle_name" type="text" ng-model="student.middle_name" ng-required="true">
                        <span class="text-danger" ng-show="form.middle_name.$touched && form.middle_name.$invalid" class="text-danger">
                            <small>
                                Please enter middle name of student.
                            </small>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input class="form-control" name="last_name" type="text" ng-model="student.last_name" ng-required="true">
                        <span class="text-danger" ng-show="form.last_name.$touched && form.last_name.$invalid" class="text-danger">
                            <small>
                                Please enter last name of student.
                            </small>
                        </span>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 0px">
                        <label>Contact</label>
                    </div>
                    <div class="form-group row" ng-repeat="(key,contact) in student.contacts track by key">
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="contect_{{key}}" ng-model="student.contacts[key]" ng-required="true"/>
                        </div>
                        <div class="col-sm-8">  
                            <button type="button" class="btn btn-primary waves-effect" ng-click="removeContact(key)" ng-hide="student.contacts.length == 1">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-danger" ng-show="form.contect_{{key}}.$touched && form.contect_{{key}}.$invalid">
                                <small>          
                                    Enter Phone number of student.
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
                    <div class="form-group" style="margin-bottom: 0px">
                        <label>Email</label>
                    </div>
                    <div class="form-group row" ng-repeat="(key,email) in student.emails track by key">
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email_{{key}}" ng-model="student.emails[key]"/>
                        </div>
                        <div class="col-sm-2">  
                            <button type="button" class="btn btn-primary waves-effect" ng-click="removeEmail(key)" ng-hide="branch.emails.length == 1">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="col-sm-12">
                            <span class="text-danger" ng-show="form.email_{{key}}.$touched && form.email_{{key}}.$invalid">
                                <small>          
                                    Please enter valid email
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
        app.controller("tutionCtrl", function ($scope,$filter,$http) {
            $scope.alerts = [];
            $scope.student = {};
            $scope.student.contacts = [null];
            $scope.student.emails = [null];

            $scope.addContact = function () {
                $scope.student.contacts.push('');
            };
            $scope.addEmail = function () {
                $scope.student.emails.push('');
            };

            $scope.removeContact = function (key) {
                $scope.student.contacts.splice(key, 1);
            };
            $scope.removeEmail = function (key) {
                $scope.student.emails.splice(key, 1);
            };

            $scope.addStudent = function(){
                $http({
                    url:"<?php echo base_url()."tution/student/add_student"; ?>",
                    method:"POST",
                    data :$scope.student,
                }).then(function(data){
                    console.log("data:",data)
                    if(data.status){
                        $scope.student = {};
                        $scope.student.contacts = [null];
                        $scope.student.emails = [null];
                        $scope.form.$setUntouched()
                        $scope.alerts.push({type:'success',msg: 'Student has added successfully'});
                    }else{
                        $scope.alerts.push({type:'danger',msg: 'There is some probem while inserting student.'});
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
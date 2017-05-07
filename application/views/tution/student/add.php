<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl" ng-cloak="">
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
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="r-t pos-rlt " id="bg-profile" md-ink-ripple="" style="background:url('assets/images/user-profile.png') center center; background-size:cover">
                                <div class="p-lg bg-white-overlay text-center r-t" style="padding: 17px;">
                                    <div id="crop-avatar"> 
                                        <a href="javascript:;" class="w-xs inline">
                                            <div class="avatar-view" title="Change the avatar">
                                                <img src="assets/images/user-profile.png" class="img-circle img-responsive">
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label>Select Class</label>
                                <ui-select ng-model="student.class" theme="bootstrap" required name="class" >
                                    <ui-select-match placeholder="Select class for student">{{$select.selected.name}}</ui-select-match>
                                    <ui-select-choices repeat="class in classes| filter: $select.search">
                                        <h5>{{class.branch_name + " -> " + class.course_name + " -> " + class.name}}</h5>
                                    </ui-select-choices>
                                </ui-select>
                                <span class="text-danger" ng-show="form.class.$touched && form.class.$invalid">
                                    <small>
                                        Please select class of the student
                                    </small>
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label>Student name</label>
                                <div class="row ">
                                    <div class='col-sm-4'>
                                        <input class="form-control" name="first_name" type="text" ng-model="student.first_name" ng-required="true" placeholder="First name">
                                        <span class="text-danger" ng-show="form.first_name.$touched && form.first_name.$invalid" class="text-danger">
                                            <small>
                                                Please enter first name of student.
                                            </small>
                                        </span>
                                    </div>
                                    <div class='col-sm-4'>
                                        <input class="form-control" name="middle_name" type="text" ng-model="student.middle_name" ng-required="true" placeholder='Middle name'>
                                        <span class="text-danger" ng-show="form.middle_name.$touched && form.middle_name.$invalid" class="text-danger">
                                            <small>
                                                Please enter middle name of student.
                                            </small>
                                        </span>
                                    </div>
                                    <div class='col-sm-4'>
                                        <input class="form-control" name="last_name" type="text" ng-model="student.last_name" ng-required="true" placeholder='Last name'>
                                        <span class="text-danger" ng-show="form.last_name.$touched && form.last_name.$invalid" class="text-danger">
                                            <small>
                                                Please enter last name of student.
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-bottom: 0px">
                                <label>Contact</label>
                            </div>
                            <div class="form-group row" ng-repeat="(key,contact) in student.contacts track by key">
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="contect_{{key}}" ng-model="student.contacts[key]" ng-required="true"/>
                                </div>
                                <div class="col-sm-1">  
                                    <button type="button" class="btn btn-primary waves-effect" ng-click="removeContact(key)" ng-hide="student.contacts.length == 1">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div class="col-sm-6">
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
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="email_{{key}}" ng-model="student.emails[key]"/>
                                </div>
                                <div class="col-sm-1">  
                                    <button type="button" class="btn btn-primary waves-effect" ng-click="removeEmail(key)" ng-hide="student.emails.length == 1">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div class="col-sm-6">
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="tution/student/add_temp_pic" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" ng-click="closeModel()">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">
                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input type="hidden" class="avatar-src" name="avatar_src">
                                <input type="hidden" class="avatar-data" name="avatar_data">
                                <label for="avatarInput">Local upload</label>
                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                            </div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                </div>
                            </div>

                            <div class="row avatar-btns">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->
</div>

<script src="assets/scripts/Admin/cropper/cropper.min.js"></script>
<script src="assets/scripts/Admin/cropper/main.js"></script>

<script type="text/javascript">
    var app = angular.module("tutionApp", ['ui.bootstrap', 'ui.select']);
    app.config(['$compileProvider', '$httpProvider', function($compileProvider, $httpProvider){
        $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|chrome-extension|sms):/);
        $httpProvider.defaults.transformRequest = function (data) {
            if (data === undefined) {
                return data;
            }
            return $.param(data);
        }
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    }]);

    app.controller("tutionCtrl", function ($scope, $filter, $http) {
        $scope.alerts = [];
        $scope.student = {};
        $scope.student.contacts = [null];
        $scope.student.emails = [null];
        $scope.classes = <?php echo json_encode($classes); ?>;
        
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
            $scope.student.class_id = $scope.student.class.id;
            $http({
                url:"<?php echo base_url() . "tution/student/add_student"; ?>",
                method:"POST",
                data :$scope.student,
            }).then(function(data){
                if (data.status){
                    $scope.student = {};
                    $scope.student.contacts = [null];
                    $scope.student.emails = [null];
                    $scope.form.$setUntouched();
                    $scope.alerts.push({type:'success', msg: 'Student has added successfully'});
                } else{
                    $scope.alerts.push({type:'danger', msg: 'There is some probem while inserting student.'});
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

        $scope.closeModel = function()
        {
            console.log('close model');
            $('#avatar-modal').modal('hide');
            $('[name="avatar_file"]').val('');
        };
    });
</script>
<?php // var_dump($tution_info);die; ?>
<div class="box-cell" ng-app="tution_app" ng-controller="edit_controller">
    <div class="box-inner padding">
        <?php
            if($this->session->flashdata('succ') != null){
        ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?=$this->session->flashdata('succ')?>
        </div>
        <?php
            }
        ?>
        <div class="row">
            <div dismiss-on-timeout="2000" uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{{alert.msg}}</div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tution Registration
                    </div>
                    <div class="panel-body">
                        <form action="admin/tutions/edit/<?php echo $tution_info['id'] ?>" method="post" class="form-horizontal" role="form" name="registration_form">
                            <input type="hidden" name="contact_id" value="<?php echo $tution_info['contact'] ?>">
                            <input type="hidden" name="user_id" value="<?php echo $tution_info['user_id'] ?>">
                            <input type="hidden" name="branch_id" value="<?php echo $tution_info['branch_id'] ?>">
                            <div class="form-group has-feedback" ng-repeat="(key,email) in tution.emails track by key" ng-class="(registration_form.email.$valid) ? 'has-success': (registration_form.email.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Email : </label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_{{key}}" ng-model="tution.emails[key]" placeholder="Enter Email" required="">
                                    <span ng-show="registration_form.email_{{key}}.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.email_{{key}}.$valid && registration_form.email_{{key}}.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                                <div class="col-sm-2">  
                                    <button type="button" class="btn btn-primary waves-effect" ng-click="removeEmail(key)" ng-hide="tution.emails.length == 1">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-addon btn-primary waves-effect" ng-click="addEmail()">
                                        <i class="fa fa-plus"></i>Add more
                                    </button>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.username.$valid) ? 'has-success': (registration_form.username.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Username : </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username" ng-model="tution.username" placeholder="Enter Username" required="">
                                    <span ng-show="registration_form.username.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.username.$valid && registration_form.username.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.class_name.$valid) ? 'has-success': (registration_form.class_name.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Class Name : </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" minlength="3" name="class_name" ng-model="tution.tution_name" placeholder="Enter name of the tution class" required="">
                                    <span ng-show="registration_form.class_name.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.class_name.$valid && registration_form.class_name.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.address.$valid) ? 'has-success': (registration_form.address.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Address : </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" minlength="3" ng-model="tution.address" placeholder="Type full address of class" required=""></textarea>
                                    <span ng-show="registration_form.address.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.address.$valid && registration_form.address.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-class="(registration_form.established_year.$valid) ? 'has-success': (registration_form.established_year.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Establishment Year : </label>
                                <div class="col-sm-8">
                                    <input type="text" pattern="^[12][0-9]*$" 
                                           maxlength="4" minlength="4" 
                                           class="form-control" 
                                           name="established_year" 
                                           ng-model="tution.established_year" 
                                           required=""
                                           uib-datepicker-popup="yyyy" 
                                           show-button-bar="false"
                                           is-open="isOpen" 
                                           datepicker-options="{minMode: 'year'}" 
                                           datepicker-mode="'year'"
                                           ng-required="true"
                                           ng-click="open($event)"
                                           />
                                    <span ng-show="registration_form.established_year.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.established_year.$valid && registration_form.established_year.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback" ng-repeat="(key,contact) in tution.contacts track by key" ng-class="(registration_form.contact_number.$valid) ? 'has-success': (registration_form.contact_number.$dirty)?'has-error':''">
                                <label class="col-sm-2 control-label">Contact Number : </label>
                                <div class="col-sm-8">
                                    <input type="text" pattern="^[0-9]*$" minlength="7" class="form-control" name="contact_number_{{key}}" ng-model="tution.contacts[key]" required=""/>
                                    <span ng-show="registration_form.contact_number_{{key}}.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                                    <span ng-show="!registration_form.contact_number_{{key}}.$valid && registration_form.contact_number_{{key}}.$dirty" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                                </div>
                                <div class="col-sm-2">  
                                    <button type="button" class="btn btn-primary waves-effect" ng-click="removeContact(key)" ng-hide="tution.contacts.length == 1">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-addon btn-primary waves-effect" ng-click="addContact()">
                                        <i class="fa fa-plus"></i>Add more
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" ng-disabled="registration_form.$invalid">Update Class</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
Google Map Api Key:
AIzaSyBFhy3EkQmrqLGnGgRx4K-DapTVtiF762I
-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBFhy3EkQmrqLGnGgRx4K-DapTVtiF762I"></script>
<script type="text/javascript" >
var app = angular.module('tution_app', ['ui.bootstrap']);
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
app.controller('edit_controller', function ($scope,$filter,$http) {
    //For datepicker
    $scope.isOpen = false;
    $scope.open = function ($event) {
        $scope.isOpen = true;
    }; 
    $scope.tution = <?php echo json_encode($tution_info); ?>;
    $scope.alerts = [];
    $scope.tution.contacts = [null];
    $scope.tution.emails = [null];
    $scope.tution.emails = JSON.parse($scope.tution.email);
    $scope.tution.contacts = JSON.parse($scope.tution.contact);
    $scope.addContact = function () {
        $scope.tution.contacts.push('');
    };
    $scope.addEmail = function () {
        $scope.tution.emails.push('');
    };
    $scope.removeContact = function (key) {
        $scope.tution.contacts.splice(key, 1);
    };
    $scope.removeEmail = function (key) {
        $scope.tution.emails.splice(key, 1);
    };
    $scope.addTution = function()
    {
        $scope.tution.latitude = $scope.gPlace.location.lat();
        $scope.tution.longitude = $scope.gPlace.location.lng();
        $scope.tution.established_year = $filter('date')($scope.tution.established_year, 'yyyy');
        $http.post('<?= base_url('admin/tutions/edit')?>',$scope.tution).then(function(res){
            if(res.status){
                $scope.tution = {};
                $scope.tution.contacts = [null];
                $scope.tution.emails = [null];
                $scope.alerts.push({type:'success',msg: 'New Tution is successfully inserted.'});
            }else{
                $scope.alerts.push({type:'danger',msg: 'Fail to insert new tution.'});
            }
        }, function(err){
            console.log("Tution Registration Controller :: ",err);
        });
    }
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.uerr = false;
    $scope.msg = '';
    $scope.checkexist = function()
    {
        if(!$scope.tution.hasOwnProperty('username'))
            return;
        $http.post('<?=base_url('admin/tutions/checkusername')?>', {uname:$scope.tution.username}).then(function(res){
            if(res.data.status)
            {
               $scope.uerr = true;
               $scope.msg = 'Username already exist';
               $scope.tution.username = '';
            }
            else
            {
               $scope.uerr = false;
               $scope.msg = '';
            }
        });
    }
});
</script>
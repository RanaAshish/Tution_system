<div class="box-cell" ng-app="tutionApp" ng-controller="profileCtrl" ng-cloak="">
  <div class="box-inner padding">
    <div class="page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Profile</h4>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
        </div>
        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Profile</li>
            </ul>
        </div>
    </div>
    <div class="row row-sm">
      <div class="col-sm-12 text-center">
        <div class="panel panel-card">
          <?php
            if(empty($this->session->user['profile_image']))
                $imgurl = 'assets/images/user-profile.png';
            else
              $imgurl = 'uploads/users/'.$this->session->user['profile_image'];
          ?>
          <div class="r-t pos-rlt " id="bg-profile" md-ink-ripple="" style="background:url(<?=$imgurl?>) center center; background-size:cover">
            <div class="p-lg bg-white-overlay text-center r-t" style="padding: 17px;">
              <div id="crop-avatar"> 
                <a href="javascript:;" class="w-xs inline">
                  <div class="avatar-view" title="Change the avatar">
                    <img src="<?=$imgurl?>" class="img-circle img-responsive">
                  </div>
                </a>

              </div>
              <div class="m-b m-t-sm h2">
                <span class=""><?=ucfirst($this->session->user['username'])?></span>
              </div>
              <!-- <a class="btn btn-sm btn-success m-b p-h no-border waves-effect">Edit</a> -->
              <p>
                Hi you are very smart guy.
              </p>
             
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <?php
          if($this->session->flashdata('succ') != null)
          {
        ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?=$this->session->flashdata('succ')?>
            </div>
        <?php
          }
        ?>
        <div dismiss-on-timeout="2000" uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)">{{alert.msg}}</div>
        <div class="panel panel-card">
          <form method="post" name="change_passwd"  ng-submit="changePassword(change_passwd)" >
            <div class="panel-body">
                <div class="form-group">
                  <label class="control-label">New Password</label>
                  <input type="password" name="new" class="form-control" ng-required="true" ng-model="newpass">
                  <span class="text-danger" ng-show="change_passwd.new.$touched && change_passwd.new.$invalid">
                    <span ng-show="change_passwd.new.$error.required"><small>This field is required.</small></span>
                  </span>
                  <span class="text-danger" ng-show="err.curr != null"><small>Please enter new password different then current password.</small></span>
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                  <input type="password" name="conf" class="form-control" ng-required="true" ng-model="confpass">
                  <span class="text-danger" ng-show="change_passwd.conf.$touched && change_passwd.conf.$invalid">
                    <span ng-show="change_passwd.conf.$error.required"><small>This field is required.</small></span>
                  </span>
                  <span class="text-danger" ng-show="confpass != null && newpass != confpass"><small>Please enter correct confirm password.</small></span>
                </div>
                <div class="form-group">
                  <label class="control-label">Current Password</label>
                  <input type="password" name="exist" class="form-control" ng-required="true" ng-model="existing" ng-blur="checkPassword()">
                  <span class="text-danger" ng-show="change_passwd.exist.$touched && change_passwd.exist.$invalid">
                    <span ng-show="change_passwd.exist.$error.required"><small>This field is required.</small></span>
                  </span>
                  
                </div>
                <button class="btn btn-primary">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<script src="assets/scripts/Admin/cropper/cropper.min.js"></script>
<script src="assets/scripts/Admin/cropper/main.js"></script>

<!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="admin/profile" enctype="multipart/form-data" method="post">
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
<script type="text/javascript">
var app = angular.module('tutionApp', ['ui.bootstrap']);
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
app.controller('profileCtrl', function($scope, $http){
    $scope.alerts = [];
    $scope.checkPassword = function()
    {
      if($scope.existing != null && $scope.existing != '')
      {
          $http.post('admin/checkpassword', {password : $scope.existing}).then(function(res){
              if(res.data.status == 200 && res.data.result == false)
              {
                $scope.alerts.push({type : 'danger', msg : res.data.error});
                $scope.existing =  $scope.newpass = $scope.confpass = ''; 
              }
          });
      }
    }
    $scope.err = {};
    $scope.changePassword = function(form)
    {
      if(!form.$valid)
      {
        return false;
      }
      if($scope.confpass != $scope.newpass)
      {
        return false;
      }
      if($scope.newpass == $scope.existing)
      {
        $scope.err.curr = 'Please enter new password different then current password.';
        return false;
      }
      if(form.$valid && $scope.err != null)
      {
          $http.post('admin/changepassword',{conf : $scope.confpass}).then(function(res){
              if(res.data.status == 200 && res.data.result == true)
              {
                $scope.alerts.push({type:'success', 'msg':res.data.msg});
                $scope.change_passwd.$setUntouched();
                $scope.existing =  $scope.newpass = $scope.confpass = ''; 
                $scope.err = {};
              }
          });
      }
    }
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.closeModel = function()
    {
      console.log('close model');
      $('#avatar-modal').modal('hide');
      $('[name="avatar_file"]').val('');
    }
});
</script>
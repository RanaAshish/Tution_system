<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl">
    <div class="box-inner padding">
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Branch - Classes</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Branch</a></li>
                    <li class="active">Classes</li>
                </ul>
            </div>
        </div>

        <div class="panel panel-card">
            <div class="panel-body">
                <h3>Classes</h3>
                <hr>
                <button class="btn btn-addon btn-primary waves-effect pull-right" data-toggle="modal" ng-click="openAddCourseModal()">
                    <i class="fa fa-plus"></i>Add
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="class in classes track by $index">
                            <td><a ng-href="classes/{{branch.id}}">{{branch.name}}</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div id="addCourse" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Course</h4>
      </div>
      <div class="modal-body">
        <form name="form" ng-submit="addCourse()">
            <div class="form-group">
                <label>Class name</label>
                <input class="form-control" name="name" type="text" ng-model="class.name" ng-required="true">
                <span class="text-danger" ng-show="form.name.$touched && form.name.$invalid" class="text-danger">
                    <small>
                        This field is required.                            
                    </small>

                </span>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" ng-model="class.address" ng-required="true"></textarea>
                <span class="text-danger" ng-show="form.description.$touched && form.description.$invalid">
                    <small>                                
                        This field is required.                            
                    </small>
                </span>
            </div>
            <js-tree tree-data="scope" tree-model="courses"></js-tree>
            <button type="submit" class="btn btn-success m-b waves-effect" ng-disabled="!form.$valid">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" ng-click="closeAddCourseModal()">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


<script type="text/javascript">
        var app = angular.module("tutionApp", ['ui.bootstrap','jsTree.directive']);
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
        app.controller("tutionCtrl", function ($scope,$http) {
            console.log("Controller is called");
            $scope.class = {};
            $scope.classes = <?php echo json_encode($classes); ?>;
            $scope.courses = <?php echo json_encode($courses); ?>;
            $scope.courses.push(
                    {
                        id:0,
                        text:'Couses',
                        parent:'#',
                        state:{opened: true}
                    });
            console.log("$scope.courses:",$scope.courses);
            $scope.jsonParse = function(str){
                return JSON.parse(str);
            };  
            $scope.openAddCourseModal = function(){
                $scope.class = {};
                $scope.form.$setUntouched();
                $("#addCourse").modal("show");
                
            }
            $scope.closeAddCourseModal = function(){
                console.log("modal close");
                $("#addCourse").modal("hide");
            }
        });
</script>
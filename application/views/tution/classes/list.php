<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl" ng-cloak="">
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
                <table class="table table-bordered bg-white" datatable="ng">
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
                            <td><a ng-href="classes/{{class.id}}">{{class.name}}</a></td>
                            <td>{{class.level2}} <span class="fa fa-arrow-right"></span> {{class.level3}}</td>
                            <td>{{class.description}}</td>
                            <td>
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-info btn-xs"><i class="fa fa-trash-o"></i></button>
                            </td>
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
        <form name="form" ng-submit="addClass()">
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
                <textarea class="form-control" name="description" ng-model="class.description" ng-required="true"></textarea>
                <span class="text-danger" ng-show="form.description.$touched && form.description.$invalid">
                    <small>                                
                        This field is required.                            
                    </small>
                </span>
            </div>      
            <div class="form-group">
                <label>Choose your course details</label>
                <ui-select ng-model="class.level1" on-select="onLevel1Select($item, $model)" theme="bootstrap" required name="level1">
                    <ui-select-match placeholder="Select your course">{{$select.selected.text}}</ui-select-match>
                    <ui-select-choices repeat="course in level1| filter: $select.search">
                        <h5>{{course.text}}</h5>
                    </ui-select-choices>
                </ui-select>
                <span class="text-danger" ng-show="form.level1.$touched && form.level1.$invalid">
                    <small>                                
                        This field is required.                            
                    </small>
                </span>
            </div>      
            <div class="form-group" ng-if="level2.length != 0">
                <label>Choose your sub course details</label>
                <ui-select ng-model="class.level2" on-select="onLevel2Select($item, $model)"  theme="bootstrap" required name="level2">
                    <ui-select-match placeholder="Select your course">{{$select.selected.text}}</ui-select-match>
                    <ui-select-choices repeat="course in level2| filter: $select.search">
                        <h5>{{course.text}}</h5>
                    </ui-select-choices>
                </ui-select>
                <span class="text-danger" ng-show="form.level2.$touched && form.level2.$invalid">
                    <small>                                
                        This field is required.                            
                    </small>
                </span>
            </div>      
            <div class="form-group" ng-if="level3.length != 0">
                <label>Choose your sub course details</label>
                <ui-select ng-model="class.level3" theme="bootstrap" required name="level3">
                    <ui-select-match placeholder="Select your course">{{$select.selected.text}}</ui-select-match>
                    <ui-select-choices repeat="course in level3| filter: $select.search">
                        <h5>{{course.text}}</h5>
                    </ui-select-choices>
                </ui-select>
                <span class="text-danger" ng-show="form.level3.$touched && form.level3.$invalid">
                    <small>                                
                        This field is required.                            
                    </small>
                </span>
            </div>      
            <js-tree tree-data="scope" tree-model="courses" id="jsTree"></js-tree>
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
        var app = angular.module("tutionApp", ['ui.bootstrap','jsTree.directive','ui.select','datatables']);
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
            $scope.branchId = <?php echo $branchId; ?>;
            $scope.classes = <?php echo json_encode($classes); ?>;
            $scope.courses = <?php echo json_encode($courses); ?>;
            $scope.level1 = <?php echo json_encode($level1); ?>;
            $scope.level2 = [];
            $scope.level3 = [];
            $scope.courses.push(    
                    {
                        id:0,
                        text:'Couses',
                        parent:'#',
                        state:{opened: true}
                    });
            $scope.jsonParse = function(str){
                return JSON.parse(str);
            };
            $scope.onLevel1Select = function($item,$model){
                $('#spin').show();
                var jsTree = $.jstree.reference('#jsTree');
                jsTree.open_node($item,function(){});
                $scope.level2 = [];
                $scope.level3 = [];
                $scope.class.level2 = '';
                $scope.class.level3 = '';
                $http({
                    url:"<?php echo base_url()."tution/Classes/getCourseByParent"; ?>",
                    method:"POST",
                    data :{id:$item.id},
                }).then(function(data){
                    $('#spin').hide();
                    $scope.level2 = data.data;
                })
            }
            $scope.onLevel2Select = function($item,$model){
                $('#spin').show();
                var jsTree = $.jstree.reference('#jsTree');
                jsTree.open_node($item,function(){});
                $scope.level3 = [];  
                $scope.class.level3 = '';
                $http({
                    url:"<?php echo base_url()."tution/Classes/getCourseByParent"; ?>",
                    method:"POST",
                    data :{id:$item.id},
                }).then(function(data){
                    $('#spin').hide();
                    $scope.level3 = data.data;
                })
            }
            $scope.addClass = function(){
                $('#spin').show();
                $scope.class.branchId = $scope.branchId;
                console.log("==>",$scope.class);
                $http({
                    url:"<?php echo base_url()."tution/Classes/addClass"; ?>",
                    method:"POST",
                    data :$scope.class,
                }).then(function(data){
                    reloadData();
                })
            }
            $scope.openAddCourseModal = function(){
                $scope.class = {};
                $scope.level2 = [];
                $scope.level3 = [];
                $scope.form.$setUntouched();
                $("#addCourse").modal("show");
                
            }
            $scope.closeAddCourseModal = function(){
                console.log("modal close");
                $("#addCourse").modal("hide");
            }
            function reloadData(){
                 $http({
                    url:"<?php echo base_url()."tution/Classes/getClassesByBranch"; ?>",
                    method:"POST",
                    data :{id:$scope.branchId},
                }).then(function(data){
                    $scope.classes = data.data;
                    $("#addCourse").modal("hide");
                    $('#spin').hide();
                })
            }
        });
</script>
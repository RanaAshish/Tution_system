<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl" ng-cloak="">
    <div class="box-inner padding">
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Stdents</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Students</li>
                </ul>
            </div>
        </div>

        <div class="panel panel-card">
            <div class="panel-body">
                <h3>Students</h3>
                <hr>
                <a href="tution/student/add" class="btn btn-addon btn-primary waves-effect pull-right">
                    <i class="fa fa-plus"></i>Add
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered bg-white" datatable="ng">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Branch</th>
                            <th>Class</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="student in students track by $index">
                            <td>{{student.first_name+" "+student.middle_name+" "+student.last_name}}</td>
                            <td>{{student.course_name}}</td>
                            <td><a href="tution/branch/{{student.branch_id}}">{{student.branch_name}}</a></td>
                            <td>{{student.class_name}}</td>
                            <td ng-init="student.contact = jsonParse(student.contact)">{{student.contact[0]}}</td>
                            <td>
                                <a href="javascript:;"><i class="fa fa-eye" title="View student detail"></i></a>
                                <a href="javascript:;"><i class="fa fa-edit" title="Edit student"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        var app = angular.module("tutionApp", ['ui.bootstrap','datatables']);
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
        app.filter('base64', function () {
            return function (input) {
                return btoa(input);
            };
        });
        app.controller("tutionCtrl", function ($scope,$http) {
            console.log("Student Controller is called");
            $scope.students = <?php echo json_encode($students); ?>;
            $scope.jsonParse = function(str){
                return JSON.parse(str);
            };
        });
</script>
<div class="box-cell" ng-app="tutionApp" ng-controller="courseCtrl" ng-cloak="">
    <div class="box-inner padding">
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Courses</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="tution"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Courses</li>
                </ul>
            </div>
        </div>
        <?php
            if($this->session->flashdata('succ') != null)
            {
        ?>
        <div class="alert alert-success">
            <?=$this->session->flashdata('succ')?>
        </div>
        <?php
            }
        ?>
        <div class="panel panel-card">
            <div class="panel-heading">
                <h3>Courses</h3>
                <hr/>
            </div>
            <div class="panel-body">
                <form method="post" action="admin/course/add">
                    <div class="form-group">
                        <label class="control-label">Course Name : </label>
                        <input class="form-control" name="text" required="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Parent Course : </label>
                        <select class="form-control" required="" name="parent">
                            <option value="0"></option>
                            <option ng-repeat="c in courses" value="{{c.id}}">{{c.text}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Course Type : </label>
                        <select class="form-control" required="" name="type">
                            <option value="">Select Course type</option>
                            <option value="1">Degreee/Course</option>
                            <option value="2">Year/Standard</option>
                            <option value="3">Term/Sem</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">save</button>
                    </div>
                </form>
                <js-tree tree-data="scope" tree-model="courses"  id="jsTree"></js-tree>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var app = angular.module("tutionApp", ['jsTree.directive']);
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
app.controller("courseCtrl", function ($scope,$http) {
    $scope.courses = <?php echo json_encode($courses); ?>;
    $scope.courses.push(    
                    {
                        id:0,
                        text:'Courses',
                        parent:'#',
                        state:{opened: true}
                    });
});
</script>
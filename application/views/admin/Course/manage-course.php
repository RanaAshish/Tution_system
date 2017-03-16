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
        <div class="panel panel-card">
            <div class="panel-heading">
                <h3>Courses</h3>
                <hr/>
            </div>
            <div class="panel-body">
                <js-tree tree-data="scope" tree-model="courses" id="jsTree"></js-tree>
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
<div class="box-cell" ng-app="tutionApp" ng-controller="tutionCtrl" ng-cloak="">
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

        <div class="panel panel-card">
            <div class="panel-body">
                <h3>Branches</h3>
                <hr>
                <a href="tution/add" class="btn btn-addon btn-primary waves-effect pull-right">
                    <i class="fa fa-plus"></i>Add
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered bg-white" datatable="ng">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Established year</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="branch in branchs track by $index">
                            <td><a href="tution/branch/{{branch.id}}">{{branch.name}}</a></td>
                            <td>{{branch.area}}</td>
                            <td>{{branch.establishment_year}}</td>
                            <td ng-init="branch.contact = jsonParse(branch.contact)">{{branch.contact[0]}}</td>
                            <td ng-init="branch.email = jsonParse(branch.email)">{{branch.email[0]}}</td>
                            <td></td>
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
            console.log("Controller is called");
            $scope.branchs = <?php echo json_encode($branchs); ?>;
            $scope.jsonParse = function(str){
                return JSON.parse(str);
            };  
        });
</script>
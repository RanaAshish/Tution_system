var app = angular.module('tution_app', []);
app.controller('edit_controller', function ($scope) {
    $scope.email = tution_info.email_id;
    $scope.username = tution_info.username;
    $scope.class_name = tution_info.class_name;
    $scope.address = tution_info.address;
    $scope.established_year = tution_info.establishment_year;
    $scope.contact_number = tution_info.number;
});
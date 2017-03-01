var app = angular.module('tution_app', []);
app.controller('edit_controller', function ($scope) {
    $scope.email = JSON.parse(tution_info.email);
    $scope.username = tution_info.username;
    $scope.class_name = tution_info.tution_name;
    $scope.address = tution_info.address;
    $scope.established_year = tution_info.establishment_year;
    $scope.contact_number = JSON.parse(tution_info.contact);
});
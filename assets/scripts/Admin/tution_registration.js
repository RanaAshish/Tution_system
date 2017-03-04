var app = angular.module('tution_app', ['ui.bootstrap']);
app.controller('registration_controller', function ($scope) {
    //For datepicker
    $scope.isOpen = false;
    $scope.open = function ($event) {
        $scope.isOpen = true;
    }; 
    $scope.tution.contacts = [null];
    $scope.tution.emails = [null];
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
});
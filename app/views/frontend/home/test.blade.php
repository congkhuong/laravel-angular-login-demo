@extends("layouts.frontend")
@section("title")
Just test
@stop
@section("content")
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.11.0/ui-bootstrap-tpls.js"></script>
<div ng-app="todos">
    <div  ng-controller="TodoController"> 
        <table class="table table-bordered">
            <tr ng-repeat="x in filteredTodos">
                <td><span ng-bind="x.text"> </span></td>
            </tr>
        </table>
        <pagination total-items="totalItems" items-per-page="10" direction-links="" ng-model="currentPage" ng-change="pageChanged()"></pagination>
    </div>
</div>
<script>
    var todos = angular.module('todos', ['ui.bootstrap']);

todos.controller('TodoController', function($scope) {
   $scope.filteredTodos = []
  ,$scope.currentPage = 1
  ,$scope.numPerPage = 10
  ,$scope.maxSize = 5;
  
    $scope.makeTodos = function() {
        $scope.todos = [];
        for (i=1;i<=1000;i++) {
            $scope.todos.push({ text:'todo '+i, done:false});
        }
    };
    $scope.makeTodos(); 
    $scope.totalItems = $scope.todos.length;
    $scope.numPages = function () {
        return Math.ceil($scope.todos.length / $scope.numPerPage);
    };
  
    $scope.$watch('currentPage + numPerPage', function() {
        var begin = (($scope.currentPage - 1) * $scope.numPerPage)
        , end = begin + $scope.numPerPage;
    
        $scope.filteredTodos = $scope.todos.slice(begin, end);
    });
});

</script>
@stop
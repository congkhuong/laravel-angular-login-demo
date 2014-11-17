@extends("layouts.frontend")
@section("title")
Just test
@stop
@section("content")
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.11.0/ui-bootstrap-tpls.js"></script>
<div ng-app="myApp">
    <div  ng-controller="customersController"> 
        <table class="table table-bordered">
            <tr ng-repeat="x in filteredFriends | orderBy : 'firstname'">
                <td><span ng-bind="x.username"> </span></td>
                <td><span ng-bind="x.email"> </span></td>
                <td><span ng-bind="x.id"> </span></td>
            </tr>
        </table>
        <pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" items-per-page="itemsPerPage" boundary-links="true"></pagination>
    </div>
</div>

<script>
    var  myApp  =  angular.module('myApp', ['ui.bootstrap']);
    myApp.controller('customersController',function($scope, friendService) {
        $scope.filteredFriends = [];

        $scope.itemsPerPage =2; // the item in each page
        $scope.currentPage = 1; // Set current page
        $scope.totalItems = 10; // setting default totalItems for the intinial
        $scope.maxSize = 5;
        loadRemoteData(); // Load data from server

        function applyRemoteData(newFriends) {
            console.log(newFriends);
            $scope.names = newFriends;
            $scope.totalItems = $scope.names.length;

            $scope.$watch('currentPage + itemsPerPage', function() {
            var begin = (($scope.currentPage - 1) * $scope.itemsPerPage),
                end = begin + $scope.itemsPerPage;
                $scope.filteredFriends = $scope.names.slice(begin, end);
            });
            $scope.pageCount = function () {
                return Math.ceil($scope.names.length / $scope.itemsPerPage);
            };
        }

        function loadRemoteData(){
            // The friendService returns a promise.
            friendService.getFriends()
                .then(
                    function( friends ) {
                        applyRemoteData( friends );
                    }
                )
            ;
        }
    });

    myApp.service(
        "friendService",
        function( $http, $q ) {
             // Return public API.
            return({
                //addFriend: addFriend,
                getFriends: getFriends,
                //removeFriend: removeFriend
            });
       

            // I get all of the friends in the remote collection.
            function getFriends() {

                var request = $http({
                    method: "get",
                    url: "/angular/index",
                    params: {
                        action: "get"
                    }
                });

                return( request.then( handleSuccess, handleError ) );
            }

            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (
                    ! angular.isObject( response.data ) ||
                    ! response.data.message
                    ) {
                    return( $q.reject( "An unknown error occurred." ) );
                }
                    // Otherwise, use expected error message.
                    return( $q.reject( response.data.message ) );
                }
            // I transform the successful response, unwrapping the application data
            // from the API response payload.

            function handleSuccess( response ) {
                return( response.data );
            }
        }
    );
</script>
@stop
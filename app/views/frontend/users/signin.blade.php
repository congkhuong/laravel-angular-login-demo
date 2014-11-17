@extends("layouts.frontend")
@section("title")
Just test
@stop
@section("content")


<div ng-app="myApp">
     <div  ng-view class="slide-animation"></div>
    <!--div data-ng-view="" id="ng-view" class="slide-animation"></div-->


    <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
</div>


{{HTML::script('frontend/app/app.js')}}
{{HTML::script('frontend/app/data.js')}}
{{HTML::script('frontend/app/directives.js')}}
{{HTML::script('frontend/app/authCtrl.js')}}

@stop
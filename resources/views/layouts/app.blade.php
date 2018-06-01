<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
    <!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->

    <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. -->
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
    <link rel="icon" href="{{{ asset('images/favicon.png') }}}">

    {{-- From Master.layout.php --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <script src="//code.angularjs.org/snapshot/angular-animate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngInfiniteScroll/1.3.0/ng-infinite-scroll.min.js"></script>

    <link rel="stylesheet" href="{{{ asset('fontawesome/web-fonts-with-css/css/fontawesome-all.css') }}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        var app = angular.module('redcrowCustomersApp', ['ngAnimate'], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            $( "#searchCustomer" ).focus();
        });

        app.controller('customersCtrl',['$scope','$filter', '$window', function( $scope,$filter, $window, $http){

            var $customers = {!! empty($customers) ? 'null' : $customers !!};

            var $editThisCustomer = {!!  empty($editThisCustomer) ? 'null' : $editThisCustomer !!};

            $scope.customers = $customers;

            $scope.editThisCustomer = $editThisCustomer;

            $scope.orderList = "orderby";

            $scope.checkIfAllSelected = function() {
                $scope.meck = $scope.customers.every(function(customer) {
                    return customer.Selected == true
                });
            }

            $scope.countChecked = function(){
                var count = 0;
                angular.forEach($scope.customers, function(customer){
                    if (customer.Selected || $scope.checkAll) count++;
                });
                return count;
            }



                // $('#customerAddingForm').on('submit', function (e) {
            //     // alert('hi');
            //     $.ajax({
            //         type: 'post',$scope.
            //         url: '/customer',
            //         data: {
            //             '_token': $('input[name=_token]').val(),
            //             'customerName': $('input[name=customerName]').val(),
            //             'address': $('input[name=address]').val(),
            //             'notesForDevice': $('input[name=notesForDevice]').val(),
            //             'notesForOffice': $('input[name=notesForOffice]').val()
            //         },
            //         dataType: 'json',
            //         success : function ( data )
            //         {
            //             console.log(data.errors);
            //         }
            //     });
            // });


            {{--$scope.editThisCustomer = {!! empty($editThisCustomer) ? '' : $editThisCustomer !!}--}}

            {{--if($scope.editThisCustomer) {--}}
                {{--$('#customerModal').modal('show');--}}
            {{--}--}}


            {{--// alert($scope.editThisCustomer);--}}

            if ($scope.editThisCustomer) {
                // alert('hi');
                $('#customerModal').modal('show');
            }

            // $('#customerModal').on("hidden.bs.modal", function () {
            //     window.location = "customer";
            // });

            setTimeout(function() {
                $('.customerAddingSuccess').fadeOut("slow", "linear");
            }, 700 );

            angular.element(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });

            angular.element($window).bind("scroll", function(e) {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
                $( "#searchCustomer" ).focus();
            });

            $scope.scrollToTop = function($var) {
                // $( "#name" ).focus();
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast');
            };

        }]);
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Body */
        body {
            padding-top: 130px;
        }

        /* Footer */
        footer{
            background-color: #424558;
            /*position: fixed;*/
            bottom: 0;
            left: 0;
            right: 0;
            height: 35px;
            text-align: center;
            color: #CCC;
        }

        footer p {
            padding: 10.5px;
            margin: 0px;
            line-height: 100%;
        }

        footer p a{
            color:#0a93a6;
            text-decoration:none;
        }

        /* Carousel */
        .carousel {
            margin-bottom: 4rem;
        }
        .carousel-caption {
            z-index: 10;
            bottom: 3rem;
        }
        .carousel-item {
            height: 20rem;
            background-color: #777;
        }
        .carousel-item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }

        /* Form */
        .custom-select.is-invalid,
        .form-control.is-invalid,
        .was-validated .custom-select:invalid,
        .was-validated .form-control:invalid {
            /*border-color: #6c757d;*/
            border-color: #c6c8ca;
        }

        .striped {
            color:white;
            background-color:#F5F5F5;
        }

        .animate-repeat {
            line-height:20px;
            list-style:none;
            box-sizing:border-box;
        }

        .animate-repeat.ng-move,
        .animate-repeat.ng-enter,
        .animate-repeat.ng-leave {
            transition:all linear 0.4s;
        }

        .animate-repeat.ng-leave.ng-leave-active,
        .animate-repeat.ng-move,
        .animate-repeat.ng-enter {
            opacity:0;
            max-height:0;
        }

        .animate-repeat.ng-leave,
        .animate-repeat.ng-move.ng-move-active,
        .animate-repeat.ng-enter.ng-enter-active {
            opacity:1;
            max-height:20px;
        }

        .orderbylist{
            width: 100px;
            float: right;
        }

        .back-to-top {
            display: none;
            position: fixed;
            bottom: 45px;
            right: 30px;
            z-index: 99;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.7);
            border: none;
            outline: none;
            cursor: pointer;
            width: 50px;
            height: 50px;
            text-decoration: none;
            -webkit-border-radius: 35px;
            -moz-border-radius: 35px;
            border-radius: 35px;
        }

        .modal-header {
        /*height: 20px;*/
        /*font-size: 12px;*/
        /*font-weight: bold;*/
        /*color: white;*/
        /*background-color: steelblue;*/
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        border: steelblue 0;
        border-top-right-radius: .125rem;
        border-top-LEFT-radius: .125rem;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        padding: 1rem;
        }

        /*.modal-header {*/
            /*!*height: 20px;*!*/
            /*!*font-size: 12px;*!*/
            /*!*font-weight: bold;*!*/
            /*color: white;*/
            /*background-color: steelblue;*/
            /*box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);*/
            /*border: steelblue 0;*/
            /*border-top-right-radius: .125rem;*/
            /*border-top-LEFT-radius: .125rem;*/
            /*display: flex;*/
            /*align-items: flex-start;*/
            /*justify-content: space-between;*/
            /*padding: 1rem;*/
        /*}*/

        /*.btn {*/
            /*display: inline-block;*/
            /*font-weight: 400;*/
            /*text-align: center;*/
            /*vertical-align: middle;*/
        /*}*/
        /*.btn-success {*/
            /*background-color: steelblue!important;*/
            /*color: #fff!important;*/
            /*box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);*/
            /*!*padding: .84rem 2.14rem;*!*/
            /*font-size: .81rem;*/
            /*transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;*/
            /*!*margin: .375rem;*!*/
            /*border: 0;*/
            /*border-radius: .125rem;*/
            /*text-transform: uppercase;*/
            /*white-space: normal;*/
            /*word-wrap: break-word;*/
        /*}*/

        /*.btn-outline-success{*/
            /*background-color: #fff!important;*/
            /*color: steelblue!important;*/
            /*box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);*/
            /*!*padding: .84rem 2.14rem;*!*/
            /*font-size: .81rem;*/
            /*transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;*/
            /*!*margin: .375rem;*!*/
            /*border: 0;*/
            /*border-radius: .125rem;*/
            /*text-transform: uppercase;*/
            /*white-space: normal;*/
            /*word-wrap: break-word;*/
        /*}*/

        /*.btn-outline-success:hover{*/
            /*background-color: #fff!important;*/
            /*color: white;*/
            /*box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);*/
            /*!*padding: .84rem 2.14rem;*!*/
            /*font-size: .81rem;*/
            /*transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;*/
            /*!*margin: .375rem;*!*/
            /*border: 0;*/
            /*border-radius: .125rem;*/
            /*text-transform: uppercase;*/
            /*white-space: normal;*/
            /*word-wrap: break-word;*/
        /*}*/

        .modal-body{
            padding-top: 40px;
            padding-bottom: 5px;
            padding-left: 48px;
            padding-right: 48px;
        }

        .modal-footer{
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 48px;
            padding-right: 48px;
        }

        .customerList a{
            font-weight: bold;
            color: black;
            text-decoration: none;
        }

        .customerList a:hover{
            /*color: #FFC107;*/
            color: #DC3545;
        }

        .customerList a:hover .customerAddress{
            color: #999999;
        }

        .customerAddress:hover{
            color: black;
        }
        .customerListDelete:hover{
            /*background-color: #005cbf;*/
            color: gray !important;
        }

        .customerListEdit:hover{
            /*background-color: #005cbf;*/
            color: #28A745 !important;
        }






    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            @yield('navbar')
        </div>
        <div class="container">
            @yield('header')
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            @yield('footer')
        </div>
    </div>
</body>
</html>

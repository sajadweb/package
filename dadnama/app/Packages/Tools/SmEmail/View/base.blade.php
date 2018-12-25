<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="DC.creator" content="Sajad Mohammadi Nejad  at http://www.sajadweb.ir"/>

    <meta name="description" content="@section("description") http://www.sajadweb.ir @show"/>
    <meta name="keywords" content="@section("keywords") http://www.sajadweb.ir @show"/>
    <style type="text/css">
        .container-fluid .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 970px;
            }
        }

        .center {
            text-align: center;
        }

        .m-t-n-20 {
            margin-top: -22px;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .panel-body {
            padding: 15px;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
            color: inherit;
        }

        .panel-title > a,
        .panel-title > small,
        .panel-title > .small,
        .panel-title > small > a,
        .panel-title > .small > a {
            color: inherit;
        }

        .panel-footer {
            padding: 10px 15px;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .panel-default {
            border-color: #ddd;
        }

        .panel-default > .panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-color: #ddd;
        }

        .panel-default > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #ddd;
        }

        .panel-default > .panel-heading .badge {
            color: #f5f5f5;
            background-color: #333;
        }

        .panel-default > .panel-footer + .panel-collapse > .panel-body {
            border-bottom-color: #ddd;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert h4 {
            margin-top: 0;
            color: inherit;
        }

        .alert .alert-link {
            font-weight: bold;
        }

        .alert-info {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #bce8f1;
        }

        .alert-info hr {
            border-top-color: #a6e1ec;
        }

        .alert-info .alert-link {
            color: #245269;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .btn:focus,
        .btn:active:focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn.active.focus {
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn:hover,
        .btn:focus,
        .btn.focus {
            color: #333;
            text-decoration: none;
        }

        .btn:active,
        .btn.active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        }

        .btn.disabled,
        .btn[disabled],
        fieldset[disabled] .btn {
            cursor: not-allowed;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            box-shadow: none;
            opacity: .65;
        }

        a.btn.disabled,
        fieldset[disabled] a.btn {
            pointer-events: none;
        }

        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        .btn-danger:focus,
        .btn-danger.focus {
            color: #fff;
            background-color: #c9302c;
            border-color: #761c19;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c9302c;
            border-color: #ac2925;
        }

        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

        .btn-success:focus,
        .btn-success.focus {
            color: #fff;
            background-color: #449d44;
            border-color: #255625;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #449d44;
            border-color: #398439;
        }

        body {
            direction: rtl;
        }
    </style>
</head>
<body style="background-color: #FCF8E3" dir="rtl">
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="col-md-12 center" >--}}
                {{--<a href="{{url('')}}" title="دادنما" rel="home">--}}
                {{--<img style="width: 100px!important;" class="logo img-sidebar-left" src="">--}}
                {{--</a>--}}
                {{--</div>--}}
                <div class="col-md-12 m-t-n-20 center">
                    <a href="{{url('')}}" title="دادنما" rel="home">

                        <h2>دادنما</h2>
                    </a>
                </div>
            </div>
            <div class="col-md-12 ">
                @yield('content')


            </div>
            <div class="col-md-12 center">
           <span class="h4">
                Copyright © {{date('Y')}} All rights reserved.

                <a href="{{url('')}}" title="دادنما" rel="home">
                    دادنما
                </a>
           </span>
            </div>
        </div>
    </div>
</div>
</body>
</Html>
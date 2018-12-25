@extends('Tools.SmEmail.View.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            کد تایید
        </div>
        <div class="panel-body">

            <div class="alert alert-info">

                <span>کاربرگرامی کد تایید شما عبارت است از:</span>
                <span>{{$code}}</span>

            </div>
        </div>
    </div>
@endsection
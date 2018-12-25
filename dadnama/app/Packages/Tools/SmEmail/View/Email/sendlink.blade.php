@extends('Tools.SmEmail.View.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            کار بر گرامی لطفا برای تایید ایمیل روی لینک زیر کلیک کنید
        </div>
        <div class="panel-body">

            <div class="alert alert-info">
               <a href="{{url('/verify/'.$code)}}">
                   <span >برای تایید اینجا کلیک کنید</span>
                   <span style="display: none">{{url('/vrify/'.$code)}}</span>
               </a>
            </div>
        </div>
    </div>
@endsection
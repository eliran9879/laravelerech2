@extends('layouts.sidebar')

@section('content')
<div class="container" style= "    background: #a9a9a9a8;
    border-radius: 2%;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Chart Demo</div> -->
                <br>
                <div class="panel-body" style="padding-bottom:2%;  ">
                {!! $pie1->html() !!} 
                </div>
            </div>
        </div>

        <br>
            <div class="row">
            <div class="col-md-7"> 
            <div style="padding-bottom:2%;padding-left:2%;  "> {!! $bar_chart->html() !!}</div>
            <div style="padding-bottom:2%;padding-left:2%;">{!! $bar_chart1->html() !!} </div>
            </div>
   
    </div>
   <br> 
    </div>
{!! Charts::scripts() !!}
{!! $bar_chart->script() !!}
{!! $bar_chart1->script() !!}
{!! $pie1->script() !!}
@endsection
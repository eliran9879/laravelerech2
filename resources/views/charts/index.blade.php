@extends('layouts.sidebar')

@section('content')
<div class="container" style= "background: #778899;
    border-radius: 2%;">
    
    <div class="row">
       
            <!-- <div class="panel panel-default"> -->
        
           
<div class="col-md-3">            
{!! $opentran->html() !!} 

</div>

<div class="col-md-1"> 
            </div>
<div class="col-md-3">            
{!! $closetran->html() !!} 
</div>

<div class="col-md-2"> 
            </div>
<div class="col-md-3"> 
{!! $closetran1->html() !!} 
            </div>
            <!-- <div class="col-md-2"> 
            </div> -->
<!-- </div> -->
</div>
<div class="row">
<div class="col-md-12">    
                <div class="panel-body" style="padding-bottom:2%;">
                {!! $pie1->html() !!} 
                </div>
                </div>
                </div>
           
        


<div class="row">
            <div class="col-md-6"> 
            <div style="padding: 0 0 10px 0"> {!! $bar_top->html() !!}</div>
            <div >{!! $date_tran->html() !!} </div>
          
            </div>
<div class="col-md-6"> 
            <div > {!! $bar_chart1->html() !!}</div>
</div>
</div>
<br>     
 
    </div>
{!! Charts::scripts() !!}
{!! $opentran->script() !!}
{!! $closetran->script() !!}
{!! $closetran1->script() !!}

{!! $pie1->script() !!}
{!! $bar_top->script() !!}
{!! $date_tran->script() !!}
{!! $bar_chart1->script() !!}

@endsection
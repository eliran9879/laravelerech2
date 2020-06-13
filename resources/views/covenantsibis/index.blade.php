@extends('layouts.sidebar')
@section('content')
<!-- <title>Import Export Excel to database</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> 
</head> -->

<body>
  <!--   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        Import Export Excel to database
        </div>
        <div class="card-body">
            <form action="{{ route('import1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Cov Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Cov Data</a>
            </form>
        </div>
    </div>
</div>
-->
</body>

<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;">

  <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
    <h2>Covanants Ibi</h2>
    <ol class="list-unstyled">
    </ol>
  </div>

  <div class="col">
    <a href="{{ route('covenants_ibi.create') }}" class="btn btn-sm btn-primary btn-create">
      @lang('Add a new covanant')</a>
  </div>

  <div class="panel panel-default">

    <br>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Range</th>
            <th>Max amount</th>
            <th>Approval</th>
            <th>Max general</th>
            <th>Min general</th>
            <th>Action</th>


          </tr>
        </thead>

        <tbody>
          @foreach($covenantsibis as $covenantibi)
          <tr>

            <td> {{$covenantibi->banks->name}} </td>
            <td> {{$covenantibi->designation}}</td>
            <td> {{$covenantibi->total_month}}</td>
            <td> {{$covenantibi->total_amount}}</td>
            <td> {{$covenantibi->approval}}</td>
            <td> {{$covenantibi->max_percentage_general}}</td>
            <td> {{$covenantibi->min_percentage_general}}</td>
            <td><a href="{{route('covenants_ibi.edit', $covenantibi->id )}}"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" style="width:30px; height:30px; margin-left: auto; margin-right: auto;"> </a></td>
          </tr>


          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


@endsection
<!-- <footer class="ttt">Website of EISS</footer> 

<style>

 

  .col {
    position: absolute;
    top: 87px;
    left: 750px;
  }

.ttt{
   position:absolute;
   bottom:0;
   width:100%;
   height:30px;   
   background:#6cf;
   text-align:center;
}


</style>

-->
@extends('layouts.sidebar')
@section('content')

<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;">

  <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
    <h2>Covanants Hapoalim</h2>
    <ol class="list-unstyled">
    </ol>
  </div>

  <div class="col">
    <a href="{{ route('covenants_hapoalim.create') }}" class="btn btn-sm btn-primary btn-create" id="aaa">
      @lang('Add a new covanant')</a>
  </div>

  <div class="panel panel-default">

    <br>
    <div class="table-responsive">
      <table class="table" style="text-align:center;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Range</th>
            <th>Approval</th>
            <th>Max Aprroval</th>
            <th>Type check</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody style="text-align:center;">
          @foreach($covenantshapoalims as $covenanthapoalim)
          <tr>

            <td>{{$covenanthapoalim->banks->name}} </td>
            <td> {{$covenanthapoalim->designation}}</td>
            <td> {{$covenanthapoalim->total_month}}</td>
            <td> {{$covenanthapoalim->approval}}</td>
            <td> {{$covenanthapoalim->max_approval}}</td>
            <td> {{$covenanthapoalim->type_check}}</td>
            <td><a href="{{route('covenants_hapoalim.edit', $covenanthapoalim->id )}}"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" style="width:30px; height:30px; margin-left: auto; margin-right: auto;"> </a> </td>
          </tr>


          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


@endsection
<style>
   @media (min-width:1000px) {
      #aaa {
         position: absolute;
         right: 1px;
         top: -45px;
      }
   }
</style>

-->
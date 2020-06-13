@extends('layouts.sidebar2')
@section('content')

<h1>Add a new covanant by Mizrahi</h1>
<form method='post' action="{{action('CovenantsmizrahiController@store')}}">
    {{csrf_field()}}

    <div class="col-md-10">
        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation" required>
        </div>

        <div class="form-group">
            <label for="total_month">Range</label>
            <input type="text" class="form-control" name="total_month" required>
        </div>

        <div class="form-group">
            <label for="approval">Approval</label>
            <input type="text" class="form-control" name="approval" required>
        </div>

        <div class="form-group">
            <label for="max_approval">Max approval</label>
            <input type="text" class="form-control" name="max_approval" required>
        </div>

        <div class="form-group">
            <label for="type_check">Check's Type</label>
            <br>
            <input type="radio" name="type_check" value="salaried" checked> Salaried
            <input type="radio" name="type_check" value="not salaried"> Not Salaried
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Save">
        </div>
    </div>
</form>
@endsection
@extends('layouts.app')
@section('title',"History")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {{ "(Year school : " }} {{ $yearschool.")" }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('assessor/workStatistic') }}"><button type="button" class="btn btn-primary">
                                    {{ __('Work Statistic') }}
                                </button></a>
                            <a href="{{ route('assessor/nisitStatistic') }}"><button type="button" class="btn btn-primary" disabled>
                                    {{ __('Nisit Statistic') }}
                                </button></a>
                        </div>
                    </div>
                        <br />
                    <form method="GET" action="">
                        <div class="form-group row">
                            <label for="year" class="col-md-3 col-form-label text-md-right">{{ __('Year School') }}</label>
                            <div class="col-md-2">
                                <select class="form-control" name="year">
                                    <option value="all" selected>All</option>
                                    <option value="2017" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2017) { echo "selected" ;} }?>>2017</option>
                                    <option value="2018" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2018) { echo "selected" ;} }?>>2018</option>
                                    <option value="2019" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2019) { echo "selected" ;} }?>>2019</option>
                                </select>
                            </div>
                            <label for="month" class="col-md-2 col-form-label text-md-right">{{ __('Month') }}</label>
                            <div class="col-md-2">
                                <select class="form-control" name="month">
                                    <option value="all" selected>All</option>
                                    <option value="1" <?php if(isset($_GET['month'])) { if($_GET['month'] == 1) { echo "selected" ;} }?>>1</option>
                                    <option value="2" <?php if(isset($_GET['month'])) { if($_GET['month'] == 2) { echo "selected" ;} }?>>2</option>
                                    <option value="3" <?php if(isset($_GET['month'])) { if($_GET['month'] == 3) { echo "selected" ;} }?>>3</option>
                                    <option value="4" <?php if(isset($_GET['month'])) { if($_GET['month'] == 4) { echo "selected" ;} }?>>4</option>
                                    <option value="5" <?php if(isset($_GET['month'])) { if($_GET['month'] == 5) { echo "selected" ;} }?>>5</option>
                                    <option value="6" <?php if(isset($_GET['month'])) { if($_GET['month'] == 6) { echo "selected" ;} }?>>6</option>
                                    <option value="7" <?php if(isset($_GET['month'])) { if($_GET['month'] == 7) { echo "selected" ;} }?>>7</option>
                                    <option value="8" <?php if(isset($_GET['month'])) { if($_GET['month'] == 8) { echo "selected" ;} }?>>8</option>
                                    <option value="9" <?php if(isset($_GET['month'])) { if($_GET['month'] == 9) { echo "selected" ;} }?>>9</option>
                                    <option value="10" <?php if(isset($_GET['month'])) { if($_GET['month'] == 10) { echo "selected" ;} }?>>10</option>
                                    <option value="11" <?php if(isset($_GET['month'])) { if($_GET['month'] == 11) { echo "selected" ;} }?>>11</option>
                                    <option value="12" <?php if(isset($_GET['month'])) { if($_GET['month'] == 12) { echo "selected" ;} }?>>12</option>
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-5 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                        <table border="1">
                            <tr><td>#</td><td>Name</td><td>created_date</td><td>due_time</td><td>info</td><td>year_school</td><td>patron</td><td>status</td>
                                <td>nisit_booked</td><td>complete_date</td><td>used_time</td><td>summary</td></tr>
                            @for($i = 1; $i <= count($work); $i++)
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td> {{$work[$i-1]->name }}</td>
                                    <td> {{$work[$i-1]->created_date }}</td>
                                    <td> {{$work[$i-1]->due_time }}</td>
                                    <td> {{$work[$i-1]->info }}</td>
                                    <td> {{$work[$i-1]->year_school }}</td>
                                    <td> {{$work[$i-1]->patron }}</td>
                                    <td> {{$work[$i-1]->status }}</td>
                                    <td> {{$work[$i-1]->nisit_booked }}</td>
                                    <td> {{$work[$i-1]->complete_date }}</td>
                                    <td> {{$work[$i-1]->used_time }}</td>
                                    <td> {{$work[$i-1]->summary }}</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

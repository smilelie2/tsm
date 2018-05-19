@extends('layouts.app')

@section('title','Nisit Statistic')
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
                    <form method="GET" action="{{ route('assessor/nisitStatistic') }}">
                        <div class="form-group row">

                            <label for="year" class="col-md-2 col-form-label text-md-right">{{ __('Year') }}</label>
                            <div class="col-md-2">
                                <select class="form-control" name="year">
                                    <option value="all" selected>All</option>
                                    <option value="2017" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2017) { echo "selected" ;} }?>>2017</option>
                                    <option value="2018" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2018) { echo "selected" ;} }?>>2018</option>
                                    <option value="2019" <?php if(isset($_GET['year'])) { if($_GET['year'] == 2019) { echo "selected" ;} }?>>2019</option>
                                </select>
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nisit name') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-5 offset-md-1">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                        <table border="1">
                            <tr><td>Rank</td><td>ID Nisit</td><td>Student ID</td><td>Name</td><td>Surname</td><td>Overall Time</td><td>Year school</td></tr>
                            @for($i = 1; $i <= count($work); $i++)
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td> {{$work[$i-1]->nisit_booked }}</td>
                                    <td> {{$work[$i-1]->std_id }}</td>
                                    <td> {{$work[$i-1]->name }}</td>
                                    <td> {{$work[$i-1]->surname }}</td>
                                    <td> {{$work[$i-1]->overall_time }}</td>
                                    <td> {{$work[$i-1]->year_school }}</td>
                                    <td><a href="nisitStatistic/{{$work[$i-1]->nisit_booked}}">History</a></td>
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

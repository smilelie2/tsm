@extends('layouts.app')

@section('title',"Work Statistic")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
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
                            <a href="{{ route('assessor/workStatistic') }}"><button type="button" class="btn btn-primary" disabled>
                                    {{ __('Work Statistic') }}
                                </button></a>
                            <a href="{{ route('assessor/nisitStatistic') }}"><button type="button" class="btn btn-primary">
                                    {{ __('Nisit Statistic') }}
                                </button></a>
                        </div>
                    </div>
                        <br />
                    <form method="GET" action="{{ route('assessor/nisitStatistic') }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nisit name') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
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

                        <table border="1" class="table table-striped">
                            <tr><td>Rank</td><td>Name</td><td>Created Date</td><td>Due Time</td><td>Information</td><td>Year School</td><td>Patron</td><td>Status</td>
                                <td>Nisit Booked</td><td>Complete Date</td><td>Time Used</td><td>Summary</td></tr>
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

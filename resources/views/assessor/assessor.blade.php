@extends('layouts.app')
@section('title','Home Assessor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                            <a href="{{ route('assessor/nisitStatistic') }}"><button type="button" class="btn btn-primary">
                                {{ __('Nisit Statistic') }}
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

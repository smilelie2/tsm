@extends('layouts.app')
@section('title','Set Date')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Set the first day of the school year.')}}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('assessor/setdate') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="year" class="col-md-2 col-form-label text-md-right">{{ __('Year') }}</label>
                            <div class="col-md-2">
                                <select class="form-control" name="year">
                                    <option value="2017" selected>2017</option>
                                    <option value="2018" <?php if(isset($_POST['year'])) { if($_POST['year'] == 2018) { echo "selected" ;} }?>>2018</option>
                                    <option value="2019" <?php if(isset($_POST['year'])) { if($_POST['year'] == 2019) { echo "selected" ;} }?>>2019</option>
                                </select>
                            </div>
                            <label for="month" class="col-md-2 col-form-label text-md-right">{{ __('Start Month') }}</label>
                            <div class="col-md-2">
                                <select class="form-control" name="month">
                                    <option value="1" selected>1</option>
                                    <option value="2" <?php if(isset($_POST['month'])) { if($_POST['month'] == 2) { echo "selected" ;} }?>>2</option>
                                    <option value="3" <?php if(isset($_POST['month'])) { if($_POST['month'] == 3) { echo "selected" ;} }?>>3</option>
                                    <option value="4" <?php if(isset($_POST['month'])) { if($_POST['month'] == 4) { echo "selected" ;} }?>>4</option>
                                    <option value="5" <?php if(isset($_POST['month'])) { if($_POST['month'] == 5) { echo "selected" ;} }?>>5</option>
                                    <option value="6" <?php if(isset($_POST['month'])) { if($_POST['month'] == 6) { echo "selected" ;} }?>>6</option>
                                    <option value="7" <?php if(isset($_POST['month'])) { if($_POST['month'] == 7) { echo "selected" ;} }?>>7</option>
                                    <option value="8" <?php if(isset($_POST['month'])) { if($_POST['month'] == 8) { echo "selected" ;} }?>>8</option>
                                    <option value="9" <?php if(isset($_POST['month'])) { if($_POST['month'] == 9) { echo "selected" ;} }?>>9</option>
                                    <option value="10" <?php if(isset($_POST['month'])) { if($_POST['month'] == 10) { echo "selected" ;} }?>>10</option>
                                    <option value="11" <?php if(isset($_POST['month'])) { if($_POST['month'] == 11) { echo "selected" ;} }?>>11</option>
                                    <option value="12" <?php if(isset($_POST['month'])) { if($_POST['month'] == 12) { echo "selected" ;} }?>>12</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

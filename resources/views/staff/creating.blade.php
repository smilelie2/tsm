@extends('layouts.app')

@section('title',"Create work")
@section('content')
    <script>
        function enableButton1() {
            document.getElementById("std_id").disabled = false;
            document.getElementById("std_id").required = true;
        }
        function disableButton1() {
            document.getElementById("std_id").disabled = true;
            document.getElementById("std_id").required = false;
            document.getElementById("std_id").value = "";
        }
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <button type="button" class="btn btn-danger">{{ __('Create work') }}</button></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('staff') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="work_name" class="col-md-4 col-form-label text-md-right">{{ __('Work name') }}</label>

                            <div class="col-md-6">
                                <input id="work_name" type="text" class="form-control{{ $errors->has('work_name') ? ' is-invalid' : '' }}" name="work_name" value="{{ old('work_name') }}" required autofocus>

                                @if ($errors->has('work_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('work_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="work_info" class="col-md-4 col-form-label text-md-right">{{ __('Work info') }}</label>

                            <div class="col-md-6">
                                <input id="work_info" type="text" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" name="work_info" value="{{ old('work_info') }}" autofocus>

                                @if ($errors->has('work_info'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('work_info') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="due_time" class="col-md-4 col-form-label text-md-right">{{ __('Due time') }}</label>

                            <div class="col-md-6">
                                <input id="due_time" type="datetime-local" class="form-control{{ $errors->has('due_time') ? ' is-invalid' : '' }}" name="due_time" value="{{ old('due_time') }}" required autofocus>

                                @if ($errors->has('due_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('due_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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

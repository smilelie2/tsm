@extends('layouts.app')

@section('title',"Save work")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Save Work ') }}{{ $work[0]->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('nisit') }}">
                        {{ csrf_field() }}
                        <input id="id_work" type="hidden" name="id_work" value="{{$work[0]->id}}">
                        <div class="form-group row">
                            <label for="work_time" class="col-md-4 col-form-label text-md-right">{{ __('Working time (HH:mm)') }}</label>

                            <div class="col-md-6">
                                <input id="work_time" type="time" class="form-control{{ $errors->has('work_time') ? ' is-invalid' : '' }}" name="work_time" value="00:00" required autofocus>

                                @if ($errors->has('work_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('work_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('Summary') }}</label>

                            <div class="col-md-6">
                                <input id="summary" type="text" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" name="summary" value="{{ old('summary') }}" autofocus>

                                @if ($errors->has('summary'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('summary') }}</strong>
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

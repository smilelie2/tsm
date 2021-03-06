@extends('layouts.app')
@section('title','Setting Nisit In Year')
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Manage')}}</div>

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
                    <table border="1" class="table table-striped">
                        <tr><td>#</td><td>Name</td><td>Surname</td><td>Student ID</td><td>Year</td></tr>
                        @for($i = 1; $i <= count($nisit); $i++)
                            <tr>
                                <td> {{ $i }}</td>
                                <td> {{$nisit[$i-1]->name }}</td>
                                <td> {{$nisit[$i-1]->surname }}</td>
                                <td> {{$nisit[$i-1]->std_id }}</td>
                                <td> {{$nisit[$i-1]->year }}</td>
                                <!--<td> <a href="nisitInYear/" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></span> Edit</a></td>-->
                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

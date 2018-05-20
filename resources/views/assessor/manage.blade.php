@extends('layouts.app')
@section('title','Manage')
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"> {{ __('Manage')}}  {{ "(Year school : " }} {{ $yearschool.")" }}</div>

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
                    <table border="1" class="col-md">
                        <tr><td>#</td><td>Username</td><td>E-mail</td><td>Name</td><td>Surname</td><td>Student ID</td></tr>

                        @for($i = 1; $i <= count($nisit); $i++)
                            <?php $status = false; // false is have memberyearschool?>
                            <tr>
                                <td> {{ $i }}</td>
                                <td> {{$nisit[$i-1]->username }}</td>
                                <td> {{$nisit[$i-1]->email }}</td>
                                <td> {{$nisit[$i-1]->name }}</td>
                                <td> {{$nisit[$i-1]->surname }}</td>
                                <td> {{$nisit[$i-1]->std_id }}</td>
                                @for ($j = 0; $j < count($memberyearschool); $j++)
                                    @if ($memberyearschool[$j]->id_member == $nisit[$i-1]->id)
                                        <td> <a href="/assessor/del/{{ $nisit[$i-1]->id }}" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></span> Del</a></td>
                                        <?php $status = true; ?>
                                        @break
                                    @endif
                                @endfor
                                @if ($status == false)
                                    <td> <a href="/assessor/add/{{ $nisit[$i-1]->id }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></span> Add</a></td>
                                @endif
                                <td> <a href="/assessor/manage/{{ $nisit[$i-1]->id }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></span> Edit</a></td>

                            </tr>
                        @endfor
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

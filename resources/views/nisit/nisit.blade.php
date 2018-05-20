@extends('layouts.app')

@section('title',"Nisit Home")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table border="1" class="table table-striped">
                            <tr><td>#</td><td>Name</td><td>created_date</td><td>due_time</td><td>info</td><td>ปีการศึกษา</td><td>ชื่อผู้สั่ง</td><td>นามสกุลผู้สั่ง</td>
                                <td>status</td><td>ชื่อนิสิต</td><td>นามสกุล</td><td>complete_date</td><td>used_time</td><td>summary</td></tr>
                            @for($i = 1; $i <= count($work); $i++)
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td> {{$work[$i-1]->work_name }}</td>
                                    <td> {{$work[$i-1]->work_created_date }}</td>
                                    <td> {{$work[$i-1]->work_due_time }}</td>
                                    <td> {{$work[$i-1]->work_info }}</td>
                                    <td> {{$work[$i-1]->work_year_school }}</td>
                                    <td> {{$work[$i-1]->patron_name }}</td>
                                    <td> {{$work[$i-1]->patron_surname }}</td>
                                    @if ($work[$i-1]->work_status == 'BOOKED')
                                        <td class="p-3 mb-2 bg-info text-white"> {{$work[$i-1]->work_status }}</td>
                                    @elseif ($work[$i-1]->work_status == 'WAITING')
                                        <td class="p-3 mb-2 bg-primary text-white"> {{$work[$i-1]->work_status }}</td>
                                    @elseif ($work[$i-1]->work_status == 'COMPLETE')
                                        <td class="p-3 mb-2 bg-success text-white"> {{$work[$i-1]->work_status }}</td>
                                    @endif
                                    <td> {{$work[$i-1]->nisit_name }}</td>
                                    <td> {{$work[$i-1]->nisit_surname }}</td>
                                    <td> {{$work[$i-1]->work_complete_date }}</td>
                                    <td> {{$work[$i-1]->work_used_time }}</td>
                                    <td> {{$work[$i-1]->work_summary }}</td>
                                    @if ($work[$i-1]->work_status == 'WAITING')
                                        <td><a href="/nisit/book/{{$work[$i-1]->work_id}}">Book now</a></td>
                                    @elseif ($work[$i-1]->work_status == 'BOOKED')
                                        <td><a href="/nisit/savenisit/{{$work[$i-1]->work_id}}">Save Complete</a></td>
                                    @endif
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function getYourWork() {
        if (Auth::user()->type != 'STAFF') {
            return redirect('/home');
        }
        $work = DB::select("SELECT * FROM works WHERE patron=? ORDER BY status ASC",[Auth::user()->id]);
        return view('/staff/staff',['work' => $work]);
    }
    protected function createWork(Request $request) {
        $work_name = $request->input('work_name');
        $due_time = str_replace("T", " ", $request->input('due_time'));
        $work_info = $request->input('work_info');

        $start_date_year_school = DB::select("SELECT start_date FROM yearschool WHERE YEAR(NOW())=YEAR(start_date)");
        $mon = DB::select("SELECT MONTH(?) as mon",[$start_date_year_school[0]->start_date]);

        DB::insert("INSERT INTO `works`(`name`, `created_date`, `due_time`, `info`, `year_school`, `patron`, `status`)
VALUES (?,NOW(),?,?,IF(MONTH(now())>=?,YEAR(now()),YEAR(now())-1),?,'WAITING')",[$work_name,$due_time,$work_info,$mon[0]->mon,Auth::user()->id]);
        return $this->getYourWork();

    }
}

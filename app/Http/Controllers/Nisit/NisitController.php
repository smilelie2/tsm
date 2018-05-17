<?php

namespace App\Http\Controllers\Nisit;

use App\Http\Controllers\CheckTypeController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getWorkAll() {
        if (Auth::user()->type != 'NISIT') {
            return redirect('/home');
        }
        $work = DB::select("SELECT works.id as work_id ,works.name as work_name ,works.created_date as work_created_date ,works.due_time as work_due_time ,works.info as work_info ,yearschool.year as work_year_school ,mp.name as patron_name ,mp.surname as patron_surname,works.status as work_status ,mn.name as nisit_name ,mn.surname as nisit_surname ,works.booked_date as work_booked_date,works.complete_date as work_complete_date,works.used_time as work_used_time,works.summary as work_summary 
FROM works 
INNER JOIN yearschool 
	ON works.year_school=yearschool.year 
INNER JOIN members mp 
	ON mp.id=works.patron
LEFT JOIN members mn 
	ON mn.id=works.nisit_booked WHERE status='WAITING' OR ((status='BOOKED' OR status='COMPLETE') AND nisit_booked=?) ",[Auth::user()->id]);
        return view('/nisit/nisit',['work' => $work]);
    }

    public function Book($id) {
        $id_nisit = Auth::user()->id;
        DB::update("UPDATE works SET `status`='BOOKED',`nisit_booked`=?,`booked_date`=NOW() WHERE id=?",[$id_nisit,$id]);
        return $this->getWorkAll();
    }
    public function saving($id) {
        $work = DB::select("SELECT id,name FROM works WHERE id=?",[$id]);
        return view('/nisit/savenisit',['work' => $work]);
    }
    public function saved(Request $request) {
        $id_work = $request->input('id_work');
        $work_time = $request->input('work_time');
        $summary = $request->input('summary');
        DB::update("UPDATE `works` SET `status`='COMPLETE',`complete_date`=now(),`used_time`=?,`summary`=? WHERE id=?",[$work_time,$summary,$id_work]);
        return $this->getWorkAll();
    }

}

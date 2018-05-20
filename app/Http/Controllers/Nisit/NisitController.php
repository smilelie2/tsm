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
        $work = DB::select("SELECT DISTINCT
    (work_id),
    work_name,
    work_created_date,
    work_due_time,
    work_info,
    work_year_school,
    patron_name,
    patron_surname,
    work_status,
    nisit_name,
    nisit_surname,
    work_booked_date,
    work_complete_date,
    work_used_time,
    work_summary
FROM
    (
    SELECT DISTINCT
        (works.id) AS work_id,
        works.name AS work_name,
        works.created_date AS work_created_date,
        works.due_time AS work_due_time,
        works.info AS work_info,
        yearschool.year AS work_year_school,
        mp.name AS patron_name,
        mp.surname AS patron_surname,
        works.status AS work_status,
        mn.name AS nisit_name,
        mn.surname AS nisit_surname,
        works.booked_date AS work_booked_date,
        works.complete_date AS work_complete_date,
        works.used_time AS work_used_time,
        works.summary AS work_summary
    FROM
        works
    INNER JOIN yearschool ON works.year_school = yearschool.year
    INNER JOIN members mp ON
        mp.id = works.patron
    LEFT JOIN members mn ON
        mn.id = works.nisit_booked,
        memberyearschool
    WHERE
STATUS
    = 'WAITING' OR(
        (
        STATUS
            = 'BOOKED' OR
        STATUS
            = 'COMPLETE'
    ) AND nisit_booked = ?
    ) AND memberyearschool.id_member = mn.id
ORDER BY
STATUS ASC
) AS tt,
yearschool, memberyearschool, members
WHERE
yearschool.year = memberyearschool.year AND memberyearschool.id_member = members.id AND 
members.id =? AND 
    yearschool.start_date <= NOW() AND yearschool.start_date >= YEAR(NOW()) -1 AND work_year_school = IF(
        MONTH(NOW()) >= MONTH(yearschool.start_date),
        YEAR(NOW()),
        YEAR(NOW()) -1)",[Auth::user()->id,Auth::user()->id]);
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

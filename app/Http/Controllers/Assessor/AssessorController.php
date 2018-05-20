<?php

namespace App\Http\Controllers\Assessor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessorController extends Controller
{

    protected function checkType() {
        if (Auth::user()->type != 'ASSESSOR') {
            return redirect('/home');
        }
    } // Auth

    public function __construct()
    {
        $this->middleware('auth');
    } // Auth
    protected function getWorkStatistic(Request $request) {
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC");
        if (Auth::user()->type != 'ASSESSOR') {
            return redirect('/home');
        }
        if($request->input('name') == null) {
            $work = DB::select("SELECT * FROM works WHERE 1 ORDER BY year_school DESC,status ASC");
        }
        else {
            $name = $request->input('name');
            $work = DB::select("SELECT works.id, works.name, `created_date`, `due_time`, `info`, `year_school`, `patron`, `status`, `nisit_booked`, `booked_date`, `complete_date`, `used_time`, `summary` FROM members,`works` WHERE members.name=? AND members.id = works.nisit_booked",[$name]);
        }
        return view('/assessor/workStatistic',['work' => $work,'yearschool' => $yearschool[0]->year]);
    } // Show Work Statistic Form
    /* public function getNisitStatistic(Request $request) {
        if (Auth::user()->type != 'ASSESSOR') {
            return redirect('/home');
        }
        if($request->input('name') == null) {
            $work = DB::select("SELECT * FROM works WHERE 1");
        }
        else {
            $name = $request->input('name');
            $work = DB::select("SELECT works.id, works.name, `created_date`, `due_time`, `info`, `year_school`, `patron`, `status`, `nisit_booked`, `booked_date`, `complete_date`, `used_time`, `summary` FROM members,`works` WHERE members.name=? AND members.id = works.nisit_booked",[$name]);
        }
        return view('/assessor/nisitStatistic',['work' => $work]);
    } */

    protected function getHoursNisit(Request $request) {
        $this->checkType();
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC"); // Get ปีการศึกษาปัจจุบันในเวลานี้
        $year = $request->input('year');
        $name = $request->input('name');
        if ($year == 'all' && $name == null || $year == null)
            $work = DB::select("SELECT `nisit_booked`,members.std_id, members.name , members.surname, IF(SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) ) IS NULL,'00:00:00',SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) )) as overall_time,year_school FROM members,works WHERE nisit_booked IS NOT NULL AND members.id=nisit_booked GROUP BY `nisit_booked`,year_school ORDER BY year_school ASC, overall_time DESC");
        else if ($name == null)
            $work = DB::select("SELECT `nisit_booked`,members.std_id, members.name , members.surname, IF(SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) ) IS NULL,'00:00:00',SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) )) as overall_time,year_school FROM members,works WHERE nisit_booked IS NOT NULL AND members.id=nisit_booked AND year_school=? GROUP BY `nisit_booked`,year_school ORDER BY year_school ASC,overall_time DESC",[$year]);
        else if ($year == 'all')
            $work = DB::select("SELECT `nisit_booked`,members.std_id, members.name , members.surname, IF(SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) ) IS NULL,'00:00:00',SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) )) as overall_time,year_school FROM members,works WHERE nisit_booked IS NOT NULL AND members.id=nisit_booked AND members.name LIKE '%$name%' GROUP BY `nisit_booked`,year_school ORDER BY year_school ASC, overall_time DESC");
        else
            $work = DB::select("SELECT `nisit_booked`,members.std_id, members.name , members.surname, IF(SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) ) IS NULL,'00:00:00',SEC_TO_TIME( SUM( TIME_TO_SEC( `used_time` ) ) )) as overall_time,year_school FROM members,works WHERE nisit_booked IS NOT NULL AND members.id=nisit_booked AND year_school=? AND members.name LIKE '%$name%' GROUP BY `nisit_booked`,year_school ORDER BY year_school ASC, overall_time DESC",[$year]);
        return view('/assessor/nisitStatistic',['work' => $work, 'yearschool' => $yearschool[0]->year]);
    } // Show All Nisit -> Overall time

    protected function getHistory($id,Request $request) {
        $this->checkType();
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC"); // Get ปีการศึกษาปัจจุบันในเวลานี้
        $year = $request->input('year');
        $month = $request->input('month');
        if(($year == 'all' || $year == null) && ($month == 'all' || $month == null)) // Access First OR Both select all
            $work = DB::select("SELECT * FROM works WHERE nisit_booked=?",[$id]);
        else if($year != 'all' && $month == 'all') // Only Year Selected
            $work = DB::select("SELECT * FROM works WHERE nisit_booked=? AND year_school=?",[$id,$year]);
        else if($year == 'all' && $month != 'all') // Only Month Selected
            $work = DB::select("SELECT * FROM works WHERE nisit_booked=? AND MONTH(created_date)=?",[$id,$month]);
        else
            $work = DB::select("SELECT * FROM works WHERE nisit_booked=? AND year_school=? AND MONTH(created_date)=?",[$id,$year,$month]);
        return view('/assessor/nisitStatisticById',['work' => $work, 'id' => $id, 'yearschool' => $yearschool[0]->year]);
    } // Show History by ID Form

    protected function showSetDateForm(){
        $this->checkType();
        return view('assessor/setdate');
    } // Show Set Form
    protected function setDate(Request $request) {
        $this->checkType();
        $year = 2017;
        $month = $request->input('month');
        $check_match_month = DB::select("SELECT MONTH(start_date) as start_date FROM yearschool WHERE year=$year");
        if ($check_match_month[0]->start_date == $month)
            return redirect()->back()->with("error","Set new month cannot be same as your current month");
        for (;$year <= 2020;$year++) {
            if ($month < 10)
                $str_date = $year . "-0" . $month . "-01";
            else
                $str_date = $year . "-" . $month . "-01";
            DB::update("UPDATE `yearschool` SET `start_date`='$str_date' WHERE year=$year");
        }
        return redirect()->back()->with("success","Changed successfully !");
    } // Set First Month of Year School

    protected function showManageForm() {
        $this->checkType();
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC"); // Get ปีการศึกษาปัจจุบันในเวลานี้
        $nisit = DB::select("SELECT id,username,email,name,surname,std_id FROM members WHERE type='NISIT' ");
        $memberyearschool = DB::select("SELECT * FROM `memberyearschool`,yearschool WHERE memberyearschool.year = yearschool.year AND 
yearschool.start_date <= now() AND 
yearschool.start_date >= YEAR(now())-1 AND memberyearschool.year >= YEAR(now())-1
AND yearschool.year = IF(MONTH(NOW())>=MONTH(yearschool.start_date),YEAR(NOW()),YEAR(NOW())-1)");
        return view('assessor/manage',['nisit' => $nisit,'memberyearschool' => $memberyearschool, 'yearschool' => $yearschool[0]->year]);
    } // Show Manage Form
    protected function showEditForm($id) {
        $this->checkType();
        $nisit = DB::select("SELECT id,username,email,name,surname,std_id FROM members WHERE id=$id");
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC"); // Get ปีการศึกษาปัจจุบันในเวลานี้
        return view('assessor/edit',['nisit' => $nisit,'yearschool' => $yearschool[0]->year]);
    } // Manage Form -> Edit Form
    protected function Edit(Request $request){
        $this->checkType();
        if($request->input('last_email') != $request->input('email')) {
            $request->validate([
                'email' => 'required|unique:members',
            ]);
        }
        $id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');
        $surname = $request->input('surname');
        DB::update("UPDATE members SET email='$email',name='$name',surname='$surname' WHERE id=$id");
        return redirect()->back()->with("success","Edit successfully !");
    }

    protected function Add($id){
        $this->checkType();
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC");
        DB::insert("INSERT INTO memberyearschool VALUES (?,?)",[$id,$yearschool[0]->year]);
        return $this->showManageForm();
    }

    protected function Del($id){
        $this->checkType();
        $yearschool = DB::select("SELECT * FROM yearschool WHERE start_date <= NOW() ORDER BY year DESC");
        DB::insert("DELETE FROM memberyearschool WHERE id_member=? AND year <= NOW()",[$id,$yearschool[0]->year]);
        return $this->showManageForm();
    }
    

    protected function showNisitInYearForm(){
        $this->checkType();
        $nisit = DB::select("SELECT members.name,members.surname,members.std_id,memberyearschool.year FROM members,memberyearschool WHERE members.id=memberyearschool.id_member");
        return view('assessor/nisitInYear',['nisit'=>$nisit]);
    }
}

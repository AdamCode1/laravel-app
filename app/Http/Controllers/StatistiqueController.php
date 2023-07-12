<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;


class StatistiqueController extends Controller
{
    public function Statistique()
    { 
        // $time=date_default_timezone_set('GMT');

        $students = Student::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count')->groupBy('year', 'month')->get();
        return view('students.statistique', ['students' => $students]);
    }
}

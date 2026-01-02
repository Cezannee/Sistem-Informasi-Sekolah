<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'classes'  => ClassRoom::count(),
            'subjects' => Subject::count(),
            'grades'   => Grade::count(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
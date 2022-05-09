<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ClassroomStudent;
use App\Models\Uploadedoc;

class ClassroomController extends Controller
{
    public function index(){
        $id = 2;
        $classrooms = DB::table('classrooms')
                        ->join('classroom_student', 'classrooms.id', '=', 'classroom_student.classroom_id')
                        ->join('users', 'classrooms.teacher', '=', 'users.id')
                        ->join('teachers', 'users.id', '=', 'teachers.user_id')
                        ->where('classroom_student.user_id', $id)
                        ->select('classrooms.*', 'teachers.name as teacher', 'teachers.tsc_number', 'classroom_student.created_at as joined_on')
                        ->get();

        
        $data = [
            "title" => "EClassroom | Student",
            "classrooms" => $classrooms
        ];
        return view('eclassroom/student/classrooms/index', $data);
    }

    public function show($id){

        $classroom = DB::table('classrooms')
                        ->join('classroom_student', 'classrooms.id', '=', 'classroom_student.classroom_id')
                        ->join('users', 'classrooms.teacher', '=', 'users.id')
                        ->join('teachers', 'users.id', '=', 'teachers.user_id')
                        ->where('classrooms.id', $id)
                        ->select('classrooms.*', 'teachers.name as teacher', 'teachers.tsc_number', 'classroom_student.created_at as joined_on')
                        ->get();


        $data = [
            "title" => "EClassroom | ".$classroom[0]->name,
            "page" => $classroom[0]->name,
            "classroom" => $classroom[0]
        ];
        return view('eclassroom/student/classrooms/show', $data);

    }

}

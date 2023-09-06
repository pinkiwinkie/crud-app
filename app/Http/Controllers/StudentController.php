<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Level;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        return view('students.create', ['levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment' => 'required|unique:students|max:10',
            'name' => 'required|max:255',
            'birthday' => 'required|date',
            'phone' => 'required',
            'email' => 'nullable|email',
            'level' => 'required',
        ]);

        $student = new Student();
        $student->enrollment = $request->input('enrollment');
        $student->name = $request->input('name');
        $student->birthday = $request->input('birthday');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->level_id = $request->input('level');
        $student->save();

        return view("students.message",['msg' => "Register save"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $levels = Level::all();
        return view("students.edit",['student' => $student, 'levels' => $levels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'enrollment' => 'required|max:10|unique:students,enrollment,' .$id,
            'name' => 'required|max:255',
            'birthday' => 'required|date',
            'phone' => 'required',
            'email' => 'nullable|email',
            'level' => 'required',
        ]);

        $student = Student::find($id);
        $student->enrollment = $request->input('enrollment');
        $student->name = $request->input('name');
        $student->birthday = $request->input('birthday');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->level_id = $request->input('level');
        $student->save();

        return view("students.message",['msg' => "Register updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}

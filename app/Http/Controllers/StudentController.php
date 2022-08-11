<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function studentIndex(){
        $getData = Student::latest('id')->get();
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Students List'=>''];
        $this->setPageTitle('Students List');
        return view('backend.pages.student.index',compact('getData','breadcrumb'));
    }
    public function studentStore(Request $request){

            $student = new Student;
            $student->name           = $request->input('name');
            $student->email          = $request->input('email');
            $student->phone          = $request->input('phone');
            $student->roll_no        = $request->input('roll');
            $student->registation_no = $request->input('registation_no');
            $student->save();

            return response()->json($student);


    }
}

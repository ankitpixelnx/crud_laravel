<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class Student extends Controller
{
    public function index()
    {
     $student=StudentModel::all();
     return view('index',compact('student'));
    }
    public function create()
    {
        return view('student');
    }
    public function store(Request $request)
    {
 
        $student=new StudentModel;
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->course=$request->input('course');
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('uploads/student/',$filename);
        $student->image=$filename;
        }
        $student->save();
        return redirect()->back()->with('status','student image added successfully');
        


    }
    public function edit($id)
    {
        $student=StudentModel::find($id);
       //return view('edit',compact($student));
    
       return view('edit',['student'=>$student]);
    }

    public function updateStudent(Request $request, $id)
    {
        $student=StudentModel::find($id);
        $student->name=$request->input('name');
        $student->email=$request->input('email');
        $student->course=$request->input('course');
        if($request->hasFile('image'))
        {
            $destination='uploads/student'.$student->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('uploads/student/',$filename);
        $student->image=$filename;
        }
        $student->update();
        return redirect()->back()->with('status','student image update successfully');

    }

    public function destroy($id)
    {
        $student=StudentModel::find($id);
        $destination='uploads/student'.$student->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
    
        $student->delete();
        return redirect()->back()->with('status','student image delete successfully');
    }





}

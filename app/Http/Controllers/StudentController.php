<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Settings;
use App\Http\Requests\StudentRegistrationRequest;
use App\Http\Requests\StudentUpdationRequest;
use App\Models\User;
use App\Models\ClassRoom;
use Hash;

class StudentController extends Controller
{
    /**
     * Return view for product registration
     */
    public function register()
    {
        $classRooms     = ClassRoom::where('status', 1)->with(['standard', 'division'])->get();
        return view('student.register',[
            'classRooms'            => $classRooms,
        ]);
    }

     /**
     * Handle new product registration
     */
    public function registerAction(StudentRegistrationRequest $request)
    {
        \DB::beginTransaction();

        $name               = $request->get('student_name');
        $class_room_id         = $request->get('class_room_id');
        
        $userName           = $request->get('user_name');
        $password           = $request->get('password');
        $email           = $request->get('email');

        $student = new Student;
        $student->student_name  = $name;
        $student->class_room_id      =   $class_room_id;
        $student->status        = 1;
        if($student->save()) {

            //create user for teacher
            $user = new User;
            $user->name         = $name;
            $user->user_name    = $userName;
            $user->email        = $email;
            /*$user->phone        = $phone;*/
            $user->password     = Hash::make($password);
            $user->role         = 4;
            $user->status       = 1;
            if($user->save()){
                $student->update(['user_id' => $user->id]);
            }

            \DB::commit();
            return redirect()->back()->with("message","Saved successfully")->with("alert-class","alert-success");
        } else {
            \DB::rollBack();
            return redirect()->back()->withInput()->with("message","Failed to save the student details. Try again after reloading the page!")->with("alert-class","alert-danger");
        }
    }

    /**
     * Return view for product listing
     */
    public function studentList()
    {
        $students = Student::where('status', 1)->paginate(15);
        if(empty($students) || count($students) == 0) {
            session()->flash('message', 'No students available to show!');
        }
        
        return view('student.list',[
            'students' => $students,
        ]);
    }

    /**
     * Return view for student edit
     */
    public function editStudent($studentId)
    {
        $classRooms     = ClassRoom::where('status', 1)->with(['standard', 'division'])->get();
        $student = Student::where('status', 1)->where('id', $studentId)->first();
        
        if(!empty($student) && !empty($student->id)) {
            return view('student.edit', [
                    'student' => $student,
                    'classRooms'            => $classRooms,
                ]);
        }
        
        return redirect()->back()->with("message", "Something Went wrong, Selected record not found. Try again after reloading the page!")->with("alert-class","alert-danger");
    }

     /**
     * Handle edit student action
     */
    public function editStudentAction(StudentUpdationRequest $request)
    {
        $studentId          = $request->get('student_id');
        $name               = $request->get('student_name');
        $class_room_id      = $request->get('class_room_id');
        

        $student = Student::where('status', 1)->where('id', $studentId)->first();

        if(!empty($student) && !empty($student->id)) {
            
            $student->student_name              = $name;
            $student->status                    = 1;
            $student->class_room_id             =   $class_room_id;

            if($student->save()) {
                return redirect(route('teacher-list'))->with("message","Updated successfully")->with("alert-class","alert-success");
            }
        }
        return redirect()->back()->withInput()->with("message","Failed to update the student details. Try again after reloading the page!")->with("alert-class","alert-danger");
    }

    /**
     * Action for student deletion
     */
    public function deleteStudent($studentId)
    {
        $student = Student::where('status', 1)->where('id', $studentId)->first();
        
        if(!empty($student) && !empty($student->id)) {
            $student->student_name  = $student->student_name."_deleted";
            $student->status        = 0;
            if($student->save()) {
                User::where('id', $student->user_id)->delete();
                return redirect(route('student-list'))->with("message", "Selected student record deleted successfully.")->with("alert-class", "alert-success");
            }
        }

        return redirect()->back()->with("message", "Failed to delete the student record. Try again after reloading the page!")->with("alert-class","alert-danger");
    }

}

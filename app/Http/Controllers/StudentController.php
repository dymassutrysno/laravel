<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // tarik data student dari database
        $students = Student::all();

        // panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    //method untuk menampilkan tambah form
    public function create(){

        //mendapatkan data courses
        $courses = Courses::all();

        return view('admin.contents.student.create', [
            'courses' => $courses,
    ]);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',
            ]);

            

        //simpan data ke database
            Student::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'major' => $request->major,
                'class' => $request->class,
                'courses_id' => $request->course_id,
            ]);

            return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    //method untuk menampilkan halaman edit

    public function edit($id){
      

        //cari data student berdasarkan id
        $student = Student::find($id);//select * FROM students WHERE id = $id

        //mendapatkan data courses
        $courses = Courses::all();


        return view('admin.contents.student.edit', [
            'student' => $student, 'courses' => $courses
        ]);

          
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
        //cari data student dari id
        $student = Student::find($id);//select * FROM students WHERE id = $id;

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',

            ]);

            //simpan perubahan 
            $student->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'major' => $request->major,
                'class' => $request->class,
                'courses_id' => $request->course_id,

            ]);
            
            //kembalikan kehalaman student
            return redirect('admin/student/')->with('message', 'Data student berhasil diedit');
    }

    //method untuk menghapus student
    public function destroy($id){
        $student = Student::find($id);//select * FROM students WHERE id = $id;

    //hapus student
    $student->delete();

     //kembalikan kehalaman student
     return redirect('admin/student/')->with('message', 'Data student berhasil diedit');
    }
}

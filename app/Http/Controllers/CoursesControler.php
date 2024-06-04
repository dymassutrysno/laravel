<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesControler extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // tarik data student dari database
        $courses = Courses::all();

        // panggil view dan kirim data students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    //method untuk menampilkan tambah form
    public function create(){
        return view('admin.contents.courses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            ]);

        //simpan data ke database
            Courses::create([
                'id' => $request->id,
                'name' => $request->name,
                'category' => $request->category,
                'desc' => $request->desc,
            ]);

            return redirect('admin/courses')->with('message', 'Data courses berhasil ditambahkan!');
    }

    //method untuk menampilkan halaman edit

    public function edit($id){
        //cari data student berdasarkan id
        $courses = Courses::find($id);//select * FROM students WHERE id = $id

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request){
        //cari data student dari id
        $courses = Courses::find($id);//select * FROM students WHERE id = $id;

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            ]);

            //simpan perubahan 
            $courses->update([
                'id' => $request->id,
                'name' => $request->name,
                'category' => $request->category,
                'desc' => $request->desc,
            ]);
            
            //kembalikan kehalaman student
            return redirect('admin/courses/')->with('message', 'Data courses berhasil diedit');
    }

    //method untuk menghapus student
    public function destroy($id){
        $courses = Courses::find($id);//select * FROM students WHERE id = $id;

    //hapus student
    $courses->delete();

     //kembalikan kehalaman student
     return redirect('admin/courses/')->with('message', 'Data courses berhasil diedit');
    }

}

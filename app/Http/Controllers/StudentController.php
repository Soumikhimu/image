<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          $imageName="";
          if($request->image){
        $imageName= time().'.'.$request->image->extension();
        $request->image->move(public_path('storage/category/subcategory'),$imageName);
          }
        $student= new Student();
        $student-> name = $request->name;
        $student-> email = $request->email;
        $student-> image = $imageName;

        $student->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['students']= Student::all();
        
        return view('show' , $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['students']=Student::find($id);
        
        return view('edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $student = Student::find($id);
          $imageName="";
          if($request->image){
            $path = public_path('storage/category/subcategory/'. $student->image);
            if(is_file($path)){
                File::delete($path);
            }
        $imageName= time().'.'.$request->image->extension();
        $request->image->move(public_path('storage/category/subcategory'),$imageName);
        $student-> image = $imageName;
        $student->update();
          }
        
        $student-> name = $request->name;
        $student-> email = $request->email;
        

        $student->update();
        return redirect()->route('show');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        
    
    $student = Student::findOrFail($id);
    $path = public_path('storage/category/subcategory/'. $student->image);
        if(is_file($path)){
            File::delete($path);
        }
        
    $student->delete();
    return redirect()->route('show')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
    }
}

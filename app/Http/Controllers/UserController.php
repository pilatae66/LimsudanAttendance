<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Record;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('usertype', 'Teacher')->get();

        return view('teacher.index', ['teachers' => $teachers]);
    }

    public function adminIndex(){
        $admins = User::where('usertype', 'Admin')->get();

        return view('admin.index', ['admins' => $admins]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $teacher = new User;
        $teacher->id = $request->id;
        $teacher->fname = $request->fname;
        $teacher->mname = $request->mname;
        $teacher->lname = $request->lname;
        $teacher->usertype = 'Teacher';
       
        if($request->hasFile('photo')){
            $filename = $request->photo->getClientOriginalName();
            $filesize = $request->photo->getClientSize();
            $request->photo->storeAs('public/upload', $filename);
            $teacher->fileName = $filename;
        }else{
            session()->flash('error','Teacher created unsuccessfully!');
        }

        $teacher->save();

        session()->flash('success','Teacher created successfully!');

        return redirect('teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $records = [];
        $month = 0;
        $teacher = User::find($id);
        // return Storage::url($teacher->fileName);
        return view('teacher.show', compact('teacher', 'records', 'month'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
        ]);

        $teacher = User::find($id);
        $teacher->id = $request->id;
        $teacher->fname = $request->fname;
        $teacher->mname = $request->mname;
        $teacher->lname = $request->lname;

        $teacher->save();


        $teacher = User::find($request->id);

        return redirect()->route('teachers.show', $teacher->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::find($id)->delete();

        session()->flash('success','Teacher deleted successfully!');

        return redirect('teachers');
    }

    public function getMonthDTR(Request $request, $id)
    {
        $teacher = User::find($id);
        $records = Record::whereMonth('created_at', $request->month)->where('user_id', $id)->get();
        $month = $request->month;

        // return $records;

        return view('teacher.show', compact('records', 'teacher', 'month'));
    }
}

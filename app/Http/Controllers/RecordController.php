<?php

namespace App\Http\Controllers;

use App\Record;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Resources\RecordResource;
use App\Http\Resources\RecordCollection;

class RecordController extends Controller
{
    public function __construct(){
        // $this->middleware('auth')->except('attendView', 'attend');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();

        return view('record.index', ['records' => $records]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $record = new Record;

        $record->user_id = $request->user_id;
        $record->type = $request->type;
        $record->status = 'Valid';
        $time = Carbon::parse($request->time);
        $record->created_at = Carbon::create(2018,$request->month,$request->date,$time->hour,$time->minute,0);

        // return $record->created_at;
        $record->save();

        return response()->json(['success' => 'success', 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return new RecordResource($record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }

    public function attendView()
    {
        return view('attendance.attend');
    }

    public function attend(Request $request)
    {
        if(User::where('id', $request->id)->where('usertype', 'Teacher')->count() <= 0){
            alert()->error('Invald ID Number','!')->toToast('top');
            return view('attendance.attend');
        }

        $record = new Record;
        $record->user_id = $request->id;
        $record->status = 'Valid';
        $record->type = $request->type;

        $record->save();

        
        $employee = User::where('id', $request->id)->where('usertype', 'Teacher')->first();
        $status = "Valid ".$request->type;
        $trans = $record->created_at;

        // return $photo;
        // return $employee;


        return view('attendance.attend', compact('employee', 'status', 'trans', 'photo'));
    }
}

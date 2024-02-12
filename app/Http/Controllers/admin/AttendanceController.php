<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;

class AttendanceController extends Controller
{

    public function index(Request $request){
        $details = Employee::all();
        return view('attendance.attandance',compact('details'));
    }


    public function getEmpDetails($empid)
    {
        $details = Employee::where(['employeeId' => $empid,])
            ->first(['firstName', 'employeeId', 'status' => 'Active']);

        if ($details) {
            return response()->json([
                'statusss' => 'success',
                'empid' => $empid,
                'details' => $details,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found or not active.',
            ]);
        }
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|array',
            'empid' => 'required|array',
            'empname' => 'required|array',
            'attends' => 'required|array',
            'checkin' => 'required|array',
            'checkout' => 'required|array',
        ]);

        if ($validator->passes()) {
            foreach ($request->date as $key => $date) {
                $attend = new Attendace();
                $attend->date = $date;
                $attend->empid = $request->empid[$key];
                $attend->empname = $request->empname[$key];
                $attend->attendace = $request->attends[$key];
                $attend->checkIn = $request->checkin[$key];
                $attend->checkOut = $request->checkout[$key];
                $attend->save();
            }

            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ]);
        }
    }

    //View Attendace Date
    public function showAttendace(Request $request){
        $dates = Attendace::where(['date'=> $request->date])->get();

        return response()->json([
            'status' => 'success',
            'date' =>$dates,
        ]);
    }


    public function edit(Request $request){
        $empid = $request->empid;
        $attendace = Attendace::where(['empid'=>$empid])
            ->first(['empid','empName','date','checkIn','checkOut','attendace']);

       return response()->json([
            'status' => 'success',
            'empid' => $empid,
            'attend' => $attendace,
       ]);
    }


    public function update(Request $request){

        $validator = Validator::make($request->all(),[
            'editattdate' => 'required',
            'editAtt' => 'required',
            'editchkechintime' => 'required',
            'editcheckouttime' => 'required',
        ]);


        if($validator->passes()){
            $empid = $request->empid;
            $editattdate = $request->editattdate;
            $editAtt = $request->editAtt;
            $editchkechintime = $request->editchkechintime;
            $editcheckouttime = $request->editcheckouttime;




            $attendace = Attendace::where(['empid' => $empid, 'date'=> $editattdate])
            ->update([
                'date' => $editattdate,
                'attendace' => $editAtt,
                'checkIn' => $editchkechintime,
                'checkOut' => $editcheckouttime,
            ]);

            return response()->json([
                'status' => 'success'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

}

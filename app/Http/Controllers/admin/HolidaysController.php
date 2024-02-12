<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Pagination\Paginator;

class HolidaysController extends Controller
{
    public function index(){
        $holidays = Holiday::paginate(3);
        return view('holidays.holidaysList',compact('holidays'));
    }


    //Holidays Declare
    public function holidaysStore(Request $request){

        $validator = Validator::make($request->all(),[
            'startdate'=>'required',
            'enddate'=>'required',
            'holidayname'=>'required'
        ]);

        $startdate = date('Y-m-d', strtotime($request->startdate));
        $enddate = date('Y-m-d', strtotime($request->enddate));


        if($validator->passes()){

            $holidays = new Holiday();
            $holidays->startDate = $startdate;
            $holidays->endDate = $enddate;
            $holidays->holiDayName = $request->holidayname;
            $holidays->save();

            return response()->json([
                'status'=>true,
                'message'=>'Record Added Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    //Holidays Edit
    public function edit(Request $request){
        $id = Crypt::decrypt($request->id);
        $holidays = Holiday::where(['id'=>$id])->first(['startDate','endDate','holiDayName']);
        $criptid = Crypt::encrypt($id);
        return response()->json([
            'status'=>'success',
            'encyptid'=>$criptid,
            'holidays'=>$holidays,
        ]);
    }

    //Holidays Modify
    public function update(Request $request){

        $id = Crypt::decrypt($request->encryptid);

        $validator = Validator::make($request->all(),[
            'editstartdate'=>'required',
            'editenddate'=>'required',
            'editholidaysname'=>'required',
        ]);

        if($validator->passes()){
            $startDate = $request->editstartdate;
            $endDate = $request->editenddate;
            $editholidaysname = $request->editholidaysname;

            $holidays = Holiday::where(['id'=>$id])
            ->update([
                'startDate'=>$startDate,
                'endDate'=>$endDate,
                'holiDayName'=>$editholidaysname,
            ]);

            return response()->json([
                'status'=>'success',
                'estartDate'=>$startDate,
                'eendDate'=>$endDate,
                'eholiDay'=>$editholidaysname,
                'id'=>$id,
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }

    }
    public function paginate()
    {
        $holidays = Holiday::paginate(3);
        return view('holidayspagination',compact('holidays'))->render();
    }
}

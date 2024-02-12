<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\state;
use App\Models\city;


class EmployeeController extends Controller
{
    //-------Employee Page------//
    public function index(Request $request)
    {
        $employees = Employee::paginate(3);
        return view('Employee.employee',compact('employees'));
    }

    //------Add-Employee Page-----//
    public function create()
    {
        $countries = DB::table('countries')->orderBy('name','ASC')->get();
        // $enmid = "BBT-".rand(00000,99999) ;
        return view('Employee.addemployee',compact('countries'));
    }


    //-------Fetch States------//
    public function fetchstates($country_id)
    {
        $states = DB::table('states')->where('country_id',$country_id)->get();

        return response()->json([
            'status'=>1,
            'states'=>$states
        ]);
    }

    //------Fetch Cities-----//
    public function fetchcities($state_id)
    {
        $cities = DB::table('cities')->where('state_id',$state_id)->get();

        return response()->json([
            'status'=>1,
            'cities'=>$cities
        ]);

    }

    //-----Save Employees Details------//
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fName'=> 'required',
            'lName'=>'required',
            'Gender'=>'required',
            'Designation'=>'required',
            'date'=> 'required',
            'email'=>'required',
            'Phone'=>'required',
            'altPhone'=>'required',
            'bloodgroup'=>'required',
            'parents'=>'required',
            'parentsName'=>'required',
            'AddharNo'=>'required',
            'panno'=>'required',
            'Address'=>'required',
            'State'=>'required',
            'City'=>'required',
            'Country'=>'required',
            'Pcode'=>'required',
            'Holdername'=>'required',
            'Account'=>'required',
            'Bank'=>'required',
            'IFSC'=>'required',
            'status'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'resume'=>'required|mimes:pdf',
            'addharimage'=>'required|mimes:jpeg,jpg,png',
            'panimage'=>'required|mimes:jpeg,jpg,png',
            'Salary'=>'required',
        ]);


        if($validator->passes())
        {
            //Employee Images
            $imageName = time().$request->file('image')->getClientOriginalName();
            $path1 = $request->file('image')->storeAs('EmployeeImg',$imageName,'public');
            $image = '/storage/'.$path1;

            //Employee Resume
            $resumeName = time().$request->file('resume')->getClientOriginalName();
            $path2 = $request->file('resume')->storeAs('Resume',$resumeName,'public');
            $resume = '/storage/'.$path2;

            //Employee AddharCard Image
            $addharName = time().$request->file('addharimage')->getClientOriginalName();
            $path3 = $request->file('addharimage')->storeAs('AddharImg',$addharName,'public');
            $addharImage = '/storage/'.$path3;

            //Employee PanCard Image
            $panImageName = time().$request->file('panimage')->getClientOriginalName();
            $path4 = $request->file('panimage')->storeAs('PanImg',$panImageName,'public');
            $panImg = '/storage/'.$path4;

            //AddharCard/PanCard No Encrypt
            $addharCard = Crypt::encrypt($request->AddharNo);
            $panCard = Crypt::encrypt($request->panno);
            $dateformat = date('Y-m-d', strtotime($request->date));


            //Employee Id Genrated
            $enmid = $request->empid;
            $enmid = "BBT".rand(00000, 99999);


            $employees = new Employee();
            $employees->employeeId = $enmid;
            $employees->firstName = $request->fName;
            $employees->lastName = $request->lName;
            $employees->gender = $request->Gender;
            $employees->dateOfBirth = $dateformat;
            $employees->email = $request->email;
            $employees->phone = $request->Phone;
            $employees->phone2 = $request->altPhone;
            $employees->addharNo = $addharCard;
            $employees->panNo =  $panCard;
            $employees->address = $request->Address;
            $employees->cityID = $request->City;
            $employees->stateId = $request->State;
            $employees->countryId = $request->Country;
            $employees->bloodGroup = $request->bloodgroup;
            $employees->parents = $request->parents;
            $employees->parentName = $request->parentsName;
            $employees->image =  $image;
            $employees->resume = $resume;
            $employees->addharCard = $addharImage;
            $employees->panCard = $panImg;
            $employees->pincode = $request->Pcode;
            $employees->status = $request->status;
            $employees->designation = $request->Designation;
            $employees->salary = $request->Salary;
            $employees->bankName = $request->Bank;
            $employees->accountName = $request->Holdername;
            $employees->accountNo = $request->Account;
            $employees->ifsc = $request->IFSC;
            $employees->save();

            $request->session()->flash('success', 'Record Added Successfuly');

            return response()->json([
                'status'=>true,
                'message'=>'Record Added Succefully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    //View Employee Profile
    public function profile($id, Request $request)
    {
        $empid =Crypt::decrypt($id);
        $employees = Employee::where('employeeId',$empid)->first();
        return view('Employee.profile',compact('employees'));
    }


    //Edit Employee Profile
    public function edit($id)
    {
        $empid = Crypt::decrypt($id);

        $employees = Employee::where('employeeId', $empid)->first();
        $data['employees'] = $employees;

        //Fetch Countries User Creation Time//
        $countries = DB::table('countries')->orderBy('name', 'ASC')->get();
        $data['countries'] = $countries;

        //Fetch states User Creation Time//
        $states = DB::table('states')->where('country_id',$employees->countryId)->orderBy('name', 'ASC')->get();
        $data['states'] = $states;

        //Fetch cities User Creation Time//
        $cities = DB::table('cities')->where('state_id',$employees->stateId)->orderBy('name','ASC')->get();
        $data['cities'] = $cities;

        return view('Employee.updateemployee', $data);
    }



    // Update Employee Profile
    public function update($id,Request $request)
    {
        // $empid = ($id);
        // return $request->all();die();
        $employees = Employee::where('employeeId',$id)->first();

        $validator = Validator::make($request->all(),[
            'fName'=> 'required',
            'lName'=>'required',
            'Gender'=>'required',
            'Designation'=>'required',
            'date'=> 'required',
            'email'=>'required',
            'Phone'=>'required',
            'altPhone'=>'required',
            'bloodgroup'=>'required',
            'parents'=>'required',
            'parentsName'=>'required',
            'AddharNo'=>'required',
            'panno'=>'required',
            'Address'=>'required',
            'State'=>'required',
            'City'=>'required',
            'Country'=>'required',
            'Pcode'=>'required',
            'Holdername'=>'required',
            'Account'=>'required',
            'Bank'=>'required',
            'IFSC'=>'required',
            'status'=>'required',
            // 'image'=>'required|mimes:jpeg,jpg,png',
            // 'resume'=>'required|mimes:pdf',
            // 'addharimage'=>'required|mimes:jpeg,jpg,png',
            // 'panimage'=>'required|mimes:jpeg,jpg,png',
            'Salary'=>'required',
        ]);


        if($validator->passes())
        {
            //Employee Images
            $image = $request->file('image');
            if(!empty($image)){
                $imageName = time().$request->file('image')->getClientOriginalName();
                $path1 = $request->file('image')->storeAs('EmployeeImg',$imageName,'public');
                $image = '/storage/'.$path1;
            }

            //Employee Resume
           $resume = $request->file('resume');
           if(!empty($resume)){
                $resumeName = time().$request->file('resume')->getClientOriginalName();
                $path2 = $request->file('resume')->storeAs('Resume',$resumeName,'public');
                $resume = '/storage/'.$path2;
           }

            //Employee AddharCard Image
           $addharImage = $request->file('addharimage');
           if(!empty($addharImage)){
                $addharName = time().$request->file('addharimage')->getClientOriginalName();
                $path3 = $request->file('addharimage')->storeAs('AddharImg',$addharName,'public');
                $addharImage = '/storage/'.$path3;
           }

            //Employee PanCard Image
            $panImg = $request->file('panimage');
            if(!empty($panImg)){
                $panImageName = time().$request->file('panimage')->getClientOriginalName();
                $path4 = $request->file('panimage')->storeAs('PanImg',$panImageName,'public');
                $panImg = '/storage/'.$path4;
            }

            //AddharCard/PanCard No Encrypt
            $addharCard = Crypt::encrypt($request->AddharNo);
            $panCard = Crypt::encrypt($request->panno);
            $dateformat = date('Y-m-d', strtotime($request->date));
            //Employee Id Genrated
            // $enmid = $request->empid;
            // $enmid = "BBT".rand(00000,99999);

            $employees->employeeId = $id;
            $employees->firstName = $request->fName;
            $employees->lastName = $request->lName;
            $employees->gender = $request->Gender;
            $employees->dateOfBirth = $dateformat;
            $employees->email = $request->email;
            $employees->phone = $request->Phone;
            $employees->phone2 = $request->altPhone;
            $employees->addharNo = $addharCard;
            $employees->panNo =  $panCard;
            $employees->address = $request->Address;
            $employees->cityID = $request->City;
            $employees->stateId = $request->State;
            $employees->countryId = $request->Country;
            $employees->bloodGroup = $request->bloodgroup;
            $employees->parents = $request->parents;
            $employees->parentName = $request->parentsName;
            $employees->image =  $image;
            $employees->resume = $resume;
            $employees->addharCard = $addharImage;
            $employees->panCard = $panImg;
            $employees->pincode = $request->Pcode;
            $employees->status = $request->status;
            $employees->designation = $request->Designation;
            $employees->salary = $request->Salary;
            $employees->bankName = $request->Bank;
            $employees->accountName = $request->Holdername;
            $employees->accountNo = $request->Account;
            $employees->ifsc = $request->IFSC;
            $employees->save();


            // $request->session()->flash('success', 'Record updated Successfuly');

            return response()->json([
                'status'=>true,
                'message'=>'Record updated Succefully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'data' => $request->all(),
                'errors' => $validator->errors()
            ]);
        }
    }


    //Ajax Pagination
    public function paginate()
    {
        $employees = Employee::paginate(3);
        return view('paginationproduct',compact('employees'))->render();
    }


    // public function search(Request $request){
    //     $employees = Employee::where('firstName', 'LIKE', '%' . $request->searchname . '%')
    //         // ->orWhere('employeeId', 'LIKE', '%' . $request->search . '%')
    //         ->orderBy('id', 'desc')
    //         ->paginate(3);

    //     if (!$employees->count() >= 1) {
    //         return view('Employee.employee', compact('employees'))->render();
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //         ]);
    //     }
    // }


}

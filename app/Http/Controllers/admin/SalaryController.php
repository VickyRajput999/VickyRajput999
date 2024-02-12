<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function index()
    {
        $employees = Employee::all(['employeeId', 'firstName', 'salary']);
        $startDate = Carbon::now()->subMonth()->startOfMonth()->startOfDay();
        $endDate = Carbon::now()->subMonth()->endOfMonth();

        $attendanceCounts = [];

        foreach ($employees as $employee) {
            $presentCount = Attendace::where('empid', $employee->employeeId)
                ->whereBetween('date', [$startDate, $endDate])
                ->where('attendace', 'present')
                ->count();

            $absentCount = Attendace::where('empid', $employee->employeeId)
                ->whereBetween('date', [$startDate, $endDate])
                ->where('attendace', 'absent')
                ->count();

            $leaveCount = Attendace::where('empid', $employee->employeeId)
                ->whereBetween('date', [$startDate, $endDate])
                ->where('attendace', 'leave')
                ->count();

            $totalDays = ($presentCount + $absentCount);

            $totalSalary = round(($employee->salary / 30) * ($presentCount - $absentCount));

            $attendanceCounts[$employee->employeeId] = [
                'firstName' => $employee->firstName,
                'presentCount' => $presentCount,
                'absentCount' => $absentCount,
                'leaveCount' => $leaveCount,
                'salary' => $employee->salary,
                'totalSalary' => $totalSalary,
                'days' => $totalDays,
            ];


        }
        return view('salary.salaryCalculation', ['attendanceCounts' => $attendanceCounts]);
    }

    public function paidSalary(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'months' => 'required',
            'year' => 'required',
            'totalOfcDays' => 'required',
            'present' => 'required',
            'absent' => 'required',
            'leave' => 'required',
            'salary' => 'required',
            'totalsalary' => 'required',
            'bouns' => 'required',
            'deductions' => 'required',
            'status' => 'required',
            'paidDate' => 'required'
        ]);


        if($validator->passes())
        {
            $paidSalary = Salary::where('empid',$request->employeeID)
                ->where('month',$request->months)
                ->first();

            if($paidSalary){
                $employeeSalary = new Salary;
                $employeeSalary->empid  = $request->employeeId;
                $employeeSalary->name  = $request->firstName;
                $employeeSalary->month  = $request->months;
                $employeeSalary->year   = $request->year;
                $employeeSalary->totalDays = $request->totalOfcDays;
                $employeeSalary->presentDays = $request->present;
                $employeeSalary->absentDays = $request->absent;
                $employeeSalary->leaveDays = $request->leave;
                $employeeSalary->baisc = $request->salary;
                $employeeSalary->bonus = $request->bonus;
                $employeeSalary->deductions = $request->deductions;
                $employeeSalary->totalSalary = $request->totalsalary;
                $employeeSalary->status = $request->status;
                $employeeSalary->paidDate = $request->paidDate;
                $employeeSalary->save();

                return response()->json([
                    'status'=>'success',
                    'message'=>'Salary Paid Successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Already Paid Salary'
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }
}

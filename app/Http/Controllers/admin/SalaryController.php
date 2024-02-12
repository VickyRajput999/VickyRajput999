<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
{
    public function index()
    {
        $employees = Employee::all(['employeeId', 'firstName', 'salary']);
        $startDate = Carbon::now()->subMonth()->startOfMonth()->startOfDay();
        $endDate = Carbon::now()->subMonth()->endOfMonth();

        // return [
        //     'start_date' => $startDate->toDateString(),

        //     'end_date' => $endDate->toDateString()
        // ];

        // $startDate = Carbon::now()->firstOfMonth()->startOfDay();
        // $endDate = Carbon::now()->endOfMonth()->endOfDay();

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

    public function paidSalary(Request $request){

        $validator = Validator::make($request->all(),[
            'date' => 'required',
            'employeeId' => 'required',
            'firstName' => 'required',
            'totalOfcDays' => 'required',
            'present' => 'required',
            'absent' => 'required',
            'leave' => 'required',
            'salary' => 'required',
            'totalsalary' => 'required',
        ]);

        if($validator->passes()){


            $salary = new Salary();

            $salary->empid = $request->employeeId;
            $salary->month = $request->months;
            $salary->year = $request->year;
            $salary->totalDays = $request->totalOfcDays;
            $salary->presentDays = $request->present;
            $salary->absentDays = $request->absent;
            $salary->leaveDays = $request->leave;
            $salary->basic = $request->salary;
            $salary->bonus = $request->bouns;
            $salary->deductions = $request->deductions;
            $salary->totalSalary = $request->totalsalary;
            $salary->status = $request->selectstatus;
            $salary->paidDate = $request->paidDate;
            $salary->save();

            // 3016-8871-5756
            // chnpn9707p
        }
    }
}

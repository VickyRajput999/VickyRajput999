<?php

use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\HolidaysController;
use App\Http\Controllers\admin\SalaryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.logpage')
// })->name('home');

Route::get('/',function(){
    return view('admin.logpage');
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::group(['middleware'=>'guest'],function(){
        Route::get('/dashboard',function(){
            return view('dashboard');
        })->name('dashboard');

        Route::get('/logout',[LoginController::class,'logout'])->name('logout');


       //Countries.States.Cities Routes
       Route::post('/fetchstates/{id}',[EmployeeController::class, 'fetchstates'])->name('fetchstates');
       Route::post('/fetchcities/{id}',[EmployeeController::class, 'fetchcities'])->name('fetchcities');

        //Employee Routes
       Route::get('/emp',[EmployeeController::class, 'index'])->name('emp.index');
       Route::get('/emp/create',[EmployeeController::class, 'create'])->name('emp.create');
       Route::post('/emp-store',[EmployeeController::class, 'store'])->name('emp.store');
       Route::get('/emp/{employeeId}/profile',[EmployeeController::class, 'profile'])->name('emp.profile');
       Route::get('/emp/{employeeId}/edit',[EmployeeController::class, 'edit'])->name('emp.edit');
       Route::post('/emp/{employeeId}/update',[EmployeeController::class, 'update'])->name('emp.update');
       Route::get('/emp/search',[EmployeeController::class, 'search'])->name('emp.search');


       //Employee Page Pagination Routes
       Route::get('/pagination/page-data',[EmployeeController::class,'paginate']);


       //Holidays Routes
       Route::get('/holiday',[HolidaysController::class,'index'])->name('holiday.index');
       Route::post('/holiday',[HolidaysController::class, 'holidaysStore'])->name('holiday.store');
       Route::post('/holiday/edit',[HolidaysController::class, 'edit'])->name('holiday.edit');
       Route::post('/holiday/update',[HolidaysController::class, 'update'])->name('holiday.update');


        //Attendace Page Pagination Routes
        Route::get('/holidayspagination/page-data',[HolidaysController::class,'paginate']);

        //Attendace Routes
        Route::get('/attendace',[AttendanceController::class, 'index'])->name('attend.index');
        Route::get('/attendance/userDetails',[AttendanceController::class, 'getEmpDetails'])->name('attend.userDetails');
        Route::post('/attendance/store',[AttendanceController::class,'store'])->name('attend.store');
        Route::get('/attendace/Attends',[AttendanceController::class,'showAttendace'])->name('attend.Attends');
        Route::post('/attendace/edit',[AttendanceController::class,'edit'])->name('attend.edit');
        Route::post('/attendace/update',[AttendanceController::class, 'update'])->name('attend.update');



        //SalaryCalcultion Route
        Route::get('/salary',[SalaryController::class, 'index'])->name('salary.index');
        Route::post('/salary/paid',[SalaryController::class, 'paidSalary'])->name('salary.paid');




    });




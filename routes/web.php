<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SalariesController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('handle-login', [AuthenticationController::class, 'handleLogin'])->name('handleLogin');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/contact-us', [ContactUsController::class, 'showForm']);
Route::post('/contact-us', [ContactUsController::class, 'store']);

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/salaries', [SalaryController::class, 'index'])->name('salaries.index');

Route::get('/departments/{id}/employees', [DepartmentController::class, 'showEmployees'])->name('departments.show_employees');
Route::get('/employees/{id}/salary', [EmployeeController::class, 'showSalary'])->name('employees.salary');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('salaries', SalariesController::class);

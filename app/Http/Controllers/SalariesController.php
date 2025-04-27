<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalariesController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee.department')
                    ->orderBy('payment_date', 'desc')
                    ->paginate(10);

        $stats = [
            'total_salary_payout' => Salary::sum('base_salary') + Salary::sum('bonuses') - Salary::sum('deductions'),
            'average_basic' => Salary::avg('base_salary'),
            'total_incentives' => Salary::sum('bonuses'),
            'total_deductions' => Salary::sum('deductions')
        ];

        return view('salaries.index', compact('salaries', 'stats'));
    }

    public function create()
    {
        $employees = Employee::with('department')->get();
        $default_date = Carbon::now()->format('Y-m-d');
        return view('salaries.create', compact('employees', 'default_date'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'base_salary' => 'required|numeric|min:0',
            'deductions' => 'required|numeric|min:0',
            'bonuses' => 'required|numeric|min:0',
            'payment_date' => 'required|date'
        ]);

        Salary::create($validated);

        return redirect()->route('salaries.index')->with('success', 'Salary record added successfully!');
    }

    public function edit(Salary $salary)
    {
        return view('salaries.edit', compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'base_salary' => 'required|numeric|min:0',
            'deductions' => 'required|numeric|min:0',
            'bonuses' => 'required|numeric|min:0',
            'payment_date' => 'required|date'
        ]);

        $salary->update($validated);

        return redirect()->route('salaries.index')->with('success', 'Salary record updated successfully!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Salary record deleted successfully!');
    }
}
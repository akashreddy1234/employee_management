<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('department');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")
                ->orWhere('role', 'like', "%$search%");
            });
        }

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->get('department_id'));
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
        
            if ($status == 'Active') {
                $query->where('status', 'Active');
            } elseif ($status == 'On Leave') {
                $query->where('status', 'Inactive');
            }
        }

        $employees = $query->paginate(10);
        $departments = Department::all();

        return view('employees.index', compact('employees', 'departments'));
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all(); 

        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'department_id' => 'required|exists:departments,id',
            'salary' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        $redirectUrl = $request->input('redirect_url', route('employees.index'));

        return redirect($redirectUrl)->with('success', 'Employee updated successfully!');
    }


    public function create()
    {
        $departments = Department::all(); 

        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'department_id' => 'required|exists:departments,id',
            'salary' => 'required|numeric',
            'role' => 'required|string|max:255'
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        $redirectUrl = $request->input('redirect_url', route('employees.index'));

        return redirect($redirectUrl)->with('success', 'Employee deleted successfully!');
    }
}
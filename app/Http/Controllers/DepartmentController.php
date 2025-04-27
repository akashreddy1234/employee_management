<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee; 
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Department::withCount('employees');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        switch ($request->sort) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'employees_asc':
                $query->orderBy('employees_count', 'asc');
                break;
            case 'employees_desc':
                $query->orderBy('employees_count', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc'); 
        }

        $departments = $query->get();

        foreach ($departments as $department) {
            $department->department_head = $department->department_head ?? 'N/A';
        }

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_head' => 'required|string|max:255',
        ]);

        Department::create([
            'name' => $validated['name'],
            'department_head' => $validated['department_head'],
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index');
    }

    public function showEmployees($id)
    {
        $department = Department::with('employees')->findOrFail($id); 
        return view('departments.show_employees', compact('department'));
    }

}

@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #1e272e;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #ecf0f1;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    #clock-section {
        text-align: right;
        font-size: 1rem;
    }

    #greetingText {
        font-size: 1.3rem;
        font-weight: bold;
    }

    #liveClock {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .card-custom {
        background-color: #2f3640;
        border-radius: 15px;
        padding: 1rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 6px 12px rgba(46, 204, 113, 0.2);
        color: #ecf0f1;
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(46, 204, 113, 0.4);
    }

    .card-header-custom {
        font-weight: bold;
        font-size: 1.2rem;
        text-align: center;
        margin-bottom: 10px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        padding-bottom: 8px;
        color: #2ecc71;
    }

    .card-body-custom {
        font-size: 1rem;
        line-height: 1.6;
        color: #bdc3c7;
    }

    .card-footer-custom {
        border-top: 1px solid rgba(255,255,255,0.08);
        display: flex;
        justify-content: space-around;
        margin-top: 12px;
        padding-top: 10px;
    }

    .btn-custom {
        border-radius: 25px;
        padding: 7px 18px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: background 0.3s ease;
        border: none;
    }

    .btn-info {
        background-color: #27ae60;
        color: white;
    }

    .btn-warning {
        background-color: #f39c12;
        color: white;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-primary {
        background-color: #2ecc71;
        color: white;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }

    .stats-box {
        background-color: #2f3640;
        border-radius: 15px;
        padding: 1.2rem;
        text-align: center;
        color: #2ecc71;
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.2);
        transition: all 0.3s ease;
    }

    .stats-box:hover {
        transform: translateY(-4px);
    }

    .btn-create {
        float: right;
        margin-bottom: 20px;
    }

    a.btn-create:hover {
        background-color: #27ae60 !important;
    }
</style>

<div class="container mt-5">
    <div class="dashboard-header">
        <h2 class="text-success">All Departments</h2>
        <div style="margin: 10px;">
            <a href="{{ url('/home') }}" style="background-color: #4CAF50; color: white; padding: 8px 20px; border-radius: 5px; text-decoration: none;">
                ← Back to Dashboard
            </a>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="stats-box">
                <h5>Total Departments</h5>
                <h3>{{ $departments->count() }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stats-box">
                <h5>Total Employees</h5>
                <h3>{{ $departments->sum('employees_count') }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stats-box">
                <h5>No Head Assigned</h5>
                <h3>{{ $departments->whereNull('department_head')->count() }}</h3>
            </div>
        </div>
    </div>

    <form method="GET" action="{{ route('departments.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="text" name="search" class="form-control" placeholder="Search by Department Name" value="{{ request('search') }}">
            </div>
            <div class="col-md-4 mb-2">
                <select name="sort" class="form-control">
                    <option value="">Sort By</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                    <option value="employees_asc" {{ request('sort') == 'employees_asc' ? 'selected' : '' }}>Employees (Low to High)</option>
                    <option value="employees_desc" {{ request('sort') == 'employees_desc' ? 'selected' : '' }}>Employees (High to Low)</option>
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <button type="submit" class="btn btn-success w-100">Apply</button>
            </div>
        </div>
    </form>

    <div class="btn-create">
        <a href="{{ route('departments.create') }}" class="btn btn-primary btn-custom">+ Add Department</a>
    </div>

    <div class="row mt-4">
        @forelse($departments as $department)
            <div class="col-md-4 mb-4">
                <div class="card-custom h-100">
                    <div class="card-header-custom">{{ $department->name }}</div>
                    <div class="card-body-custom">
                        <p><strong>Head:</strong> {{ $department->department_head ?? 'N/A' }}</p>
                        <p><strong>Employees:</strong> {{ $department->employees_count }}</p>
                    </div>
                    <div class="card-footer-custom">
                        <a href="{{ route('departments.show_employees', $department->id) }}" class="btn btn-info btn-sm btn-custom">View</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this department?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-custom">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center w-100">No departments found.</p>
        @endforelse
    </div>
</div>

@endsection

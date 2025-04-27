@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Employees</h2>
        <a href="{{ route('home') }}" class="btn custom-btn-dashboard">← Back to Dashboard</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between bg-dark p-3 rounded">
                <div class="text-white"><strong>Total Employees:</strong> {{ $employees->total() }}</div>
                <div class="text-white"><strong>Average Salary:</strong> ₹{{ number_format($employees->avg('salary'), 2) }}</div>
                <div class="text-white"><strong>Active:</strong> {{ $employees->where('status', 'Active')->count() }}</div>
                <div class="text-white"><strong>On Leave:</strong> {{ $employees->where('status', 'Inactive')->count() }}</div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-8">
            <form method="GET" action="{{ route('employees.index') }}" class="form-inline">
                <label class="mr-2 text-white"><strong>Filter by</strong></label>
                <select class="form-control mr-3 bg-dark text-white" name="department_id" onchange="this.form.submit()">
                    <option value="">All</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ request()->get('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>

                <input type="text" class="form-control mr-2 bg-dark text-white" name="search" placeholder="Search..." value="{{ request()->get('search') }}">
                <button class="btn btn-outline-light" type="submit">Apply</button>
            </form>
        </div>
        <div class="col-md-4 text-right d-flex justify-content-end align-items-center gap-2">
            <a href="{{ route('employees.create') }}" class="btn btn-primary mr-2">Add Employee</a>
            <div class="btn-group ml-2" role="group">
                <a href="{{ route('employees.index') }}" class="btn btn-sm {{ request()->get('status') == '' ? 'btn-secondary' : 'btn-outline-light' }}">All</a>
                <a href="{{ route('employees.index', array_merge(request()->all(), ['status' => 'Active'])) }}" class="btn btn-sm {{ request()->get('status') == 'Active' ? 'btn-success' : 'btn-outline-light' }}">Active</a>
                <a href="{{ route('employees.index', array_merge(request()->all(), ['status' => 'On Leave'])) }}" class="btn btn-sm {{ request()->get('status') == 'On Leave' ? 'btn-warning text-dark' : 'btn-outline-light' }}">On Leave</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>{{ $employee->department->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $employee->status == 'Active' ? 'badge-success' : 'badge-warning text-dark' }}">
                                    {{ $employee->status }}
                                </span>
                            </td>
                            <td>₹{{ number_format($employee->salary, 2) }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $employees->links('pagination::bootstrap-4') }}
    </div>
</div>

{{-- Custom Styles --}}
<style>
    body {
        background-color: #1a1a1a;
        color: #ffffff;
    }

    .bg-dark {
        background-color: #343a40!important;
    }

    .table-dark {
        background-color: #343a40;
        color: #ffffff;
    }

    .table-dark thead th {
        border-color: #454d55;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-bordered td, .table-dark.table-bordered th {
        border-color: #454d55;
    }

    .form-control.bg-dark {
        background-color: #343a40!important;
        border-color: #454d55;
        color: #ffffff;
    }

    .form-control.bg-dark:focus {
        background-color: #343a40;
        color: #ffffff;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-outline-light {
        color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-outline-light:hover {
        color: #212529;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-link {
        color: #007bff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .page-link:hover {
        color: #0056b3;
        background-color: #2c3136;
        border-color: #454d55;
    }

    @media (max-width: 768px) {
        .form-inline {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-inline .form-control {
            margin-bottom: 0.5rem;
            width: 100%;
        }

        .text-right {
            text-align: left!important;
            margin-top: 1rem;
        }
    }
    .custom-btn-dashboard {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
    }

    .custom-btn-dashboard:hover {
        background-color: #3e8e41;
        color: white;
    }
</style>
@endsection
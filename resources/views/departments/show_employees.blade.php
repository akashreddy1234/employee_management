@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Employees in {{ $department->name }}</h2>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to Departments</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($department->employees->count() > 0)
        <div class="row">
            @foreach($department->employees as $employee)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $employee->role }}</h6>

                            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                            <p class="card-text"><strong>Salary:</strong> ₹{{ number_format($employee->salary, 2) }}</p>
                            <p class="card-text"><strong>Join Date:</strong> {{ $employee->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No employees found in this department.</p>
    @endif
</div>
@endsection
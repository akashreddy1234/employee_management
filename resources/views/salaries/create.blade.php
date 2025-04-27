@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Salary Record</h2>

    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Employee</label>
                    <select name="employee_id" class="form-control bg-secondary text-white" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                                ({{ $employee->department->name ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Base Salary ($)</label>
                    <input type="number" step="0.01" name="base_salary" class="form-control bg-secondary text-white" required>
                </div>
                <div class="form-group mb-3">
                    <label>Bonuses ($)</label>
                    <input type="number" step="0.01" name="bonuses" class="form-control bg-secondary text-white" value="0" required>
                </div>
                <div class="form-group mb-3">
                    <label>Deductions ($)</label>
                    <input type="number" step="0.01" name="deductions" class="form-control bg-secondary text-white" value="0" required>
                </div>
                <div class="form-group mb-3">
                    <label>Payment Date</label>
                    <input type="date" name="payment_date" class="form-control bg-secondary text-white" value="{{ $default_date }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Record</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
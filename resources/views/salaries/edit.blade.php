@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Salary Record</h2>

    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group mb-3">
                    <label>Employee</label>
                    <input type="text" class="form-control bg-secondary text-white" 
                           value="{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label>Base Salary (₹)</label>
                    <input type="number" step="0.01" name="base_salary" 
                           class="form-control bg-secondary text-white" 
                           value="{{ $salary->base_salary }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>Bonuses (₹)</label>
                    <input type="number" step="0.01" name="bonuses" 
                           class="form-control bg-secondary text-white" 
                           value="{{ $salary->bonuses }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>Deductions (₹)</label>
                    <input type="number" step="0.01" name="deductions" 
                           class="form-control bg-secondary text-white" 
                           value="{{ $salary->deductions }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>Payment Date</label>
                    <input type="date" name="payment_date" 
                           class="form-control bg-secondary text-white" 
                           value="{{ $salary->payment_date }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Record</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
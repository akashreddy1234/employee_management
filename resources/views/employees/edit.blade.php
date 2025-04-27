@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 40px;">
    <h2 style="text-align: center; margin-bottom: 30px;">Edit Employee Details</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required value="{{ old('first_name', $employee->first_name) }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required value="{{ old('last_name', $employee->last_name) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required value="{{ old('email', $employee->email) }}">
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ (old('department_id', $employee->department_id) == $department->id) ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" class="form-control" required value="{{ old('salary', $employee->salary) }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="Active" {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

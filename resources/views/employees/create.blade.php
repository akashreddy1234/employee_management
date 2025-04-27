@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Employee</h2>

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required value="{{ old('first_name') }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required value="{{ old('last_name') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" required value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" id="role" name="role" class="form-control" required value="{{ old('role') }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select id="department_id" name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" class="form-control" required value="{{ old('salary') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

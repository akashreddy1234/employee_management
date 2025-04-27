@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Add New Department</h2>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="department_head">Department Head</label>
            <input type="text" class="form-control" id="department_head" name="department_head" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Department</button>
    </form>
</div>
@endsection

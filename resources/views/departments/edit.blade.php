@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Department</h2>
    
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Department Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $department->name) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ old('description', $department->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Department</button>
    </form>
</div>
@endsection

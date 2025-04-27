@extends('layouts.app')

@section('content')
<div class="container-fluid dark-theme">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">Salary Management</h2>
        <a href="{{ route('home') }}" class="btn custom-btn-dashboard">← Back to Dashboard</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Salary Payout</h5>
                    <p class="h4">₹{{ number_format($stats['total_salary_payout'], 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Average Basic Pay</h5>
                    <p class="h4">₹{{ number_format($stats['average_basic'], 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Incentives</h5>
                    <p class="h4">₹{{ number_format($stats['total_incentives'], 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Deductions</h5>
                    <p class="h4">₹{{ number_format($stats['total_deductions'], 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card main-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Salary Details</h5>
            <a href="{{ route('salaries.create') }}" class="btn btn-add">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table salary-table">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Department</th>
                            <th>Basic Pay</th>
                            <th>Incentives</th>
                            <th>Deductions</th>
                            <th>Net Salary</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salaries as $salary)
                        <tr>
                            <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                            <td>{{ $salary->employee->department->name ?? 'N/A' }}</td>
                            <td>₹{{ number_format($salary->base_salary, 2) }}</td>
                            <td class="text-incentives">+₹{{ number_format($salary->bonuses, 2) }}</td>
                            <td class="text-deductions">-₹{{ number_format($salary->deductions, 2) }}</td>
                            <td class="text-net"><strong>₹{{ number_format($salary->base_salary + $salary->bonuses - $salary->deductions, 2) }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($salary->payment_date)->format('d/m/Y') }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-edit">Edit
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this record?')">Delete
                                        <i class="fas fa-trash"></i>
                                    </button>
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
        {{ $salaries->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
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
    
    .dark-theme {
        background-color: #1e1e1e;
        color: #ffffff;
        min-height: 100vh;
        padding: 20px;
    }
    
    .stats-card {
        background-color: #2d2d2d;
        border: 1px solid #3d3d3d;
        border-radius: 8px;
        transition: transform 0.2s;
    }
    
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    
    .stats-card .card-body {
        padding: 1.5rem;
    }
    
    .stats-card .card-title {
        color: #a0a0a0;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .stats-card .h4 {
        color: #ffffff;
        font-weight: 600;
    }
    
    .main-card {
        background-color: #252525;
        border: 1px solid #3d3d3d;
        border-radius: 8px;
    }
    
    .main-card .card-header {
        background-color: #2d2d2d;
        border-bottom: 1px solid #3d3d3d;
        padding: 1rem 1.5rem;
    }
    
    .btn-add {
        background-color: #3a5e8c;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
    }
    
    .btn-add:hover {
        background-color: #4a6e9c;
    }

    .btn-info {
        background-color: #17a2b8;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
    }
    
    .btn-info:hover {
        background-color: #138496;
    }
    
    .btn-edit {
        background-color: #3a5e8c;
        color: white;
        border: none;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        margin-right: 5px;
    }
    
    .btn-delete {
        background-color: #8c3a3a;
        color: white;
        border: none;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
    }
    
    .salary-table {
        background-color: #252525;
        color: #e0e0e0;
        margin-bottom: 0;
    }
    
    .salary-table thead {
        background-color: #2d2d2d;
    }
    
    .salary-table th {
        border-bottom: 2px solid #3d3d3d;
        font-weight: 500;
        color: #a0a0a0;
    }
    
    .salary-table td {
        border-top: 1px solid #3d3d3d;
        vertical-align: middle;
    }
    
    .salary-table tbody tr:hover {
        background-color: #2d2d2d;
    }
    
    .text-incentives {
        color: #4caf50;
    }
    
    .text-deductions {
        color: #f44336;
    }
    
    .text-net {
        color: #ffffff;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #3a5e8c;
        border-color: #3a5e8c;
    }
    
    .pagination .page-link {
        background-color: #2d2d2d;
        color: #e0e0e0;
        border-color: #3d3d3d;
    }
    
    .pagination .page-link:hover {
        background-color: #3d3d3d;
    }
    
    @media (max-width: 768px) {
        .stats-card .card-body {
            padding: 1rem;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        .btn-edit, .btn-delete {
            width: 100%;
        }

        .d-flex.justify-content-between.align-items-center.mb-4 {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }
</style>
@endsection
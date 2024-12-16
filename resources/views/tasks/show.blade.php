@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Task Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fw-bold">Name:</label>
                        <p>{{ $task->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Details:</label>
                        <p>{{ $task->details }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Price:</label>
                        <p>{{ $task->price }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Publish Status:</label>
                        <p>{{ $task->publish ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Created At:</label>
                        <p>{{ $task->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Last Updated:</label>
                        <p>{{ $task->updated_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
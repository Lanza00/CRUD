@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Tasks</h2>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary float-end">Create New Task</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Search Form -->
                    <div class="d-flex justify-content-end mb-4">
                        <form action="{{ route('tasks.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control" placeholder="Search by name or details..." value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Search</button>
                                @if(request('search'))
                                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-danger btn-sm">Clear</a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Price (RM)</th>
                                <th>Publish</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->details }}</td>
                                <td>{{ $task->price }}</td>
                                <td>{{ $task->publish ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">Show</a>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
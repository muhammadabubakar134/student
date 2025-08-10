@extends('layout')

@section('content')
    <h2 class="mb-4">Student Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $student->id }}</p>
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Phone:</strong> {{ $student->phone }}</p>
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection

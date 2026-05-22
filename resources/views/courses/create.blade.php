@extends('layouts.main')

@section('title', 'Add Course')
@section('header', 'Add New Course')
@section('content')
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <label>Title*</label><br>
    <input type="text" name="title" required><br><br>
    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>
    <label>Instructor</label><br>
    <input type="text" name="instructor"><br><br>
    <label>Duration (hours)</label><br>
    <input type="number" name="duration"><br><br>
    <button type="submit">Save</button>
</form>
@endsection
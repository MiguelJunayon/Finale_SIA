<!-- resources/views/suppliers/create.blade.php -->

@extends('layout')

@section('title', 'Add New Supplier')

@section('content')
<h2>Add New Supplier</h2>

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="contact_information">Contact Information</label>
        <input type="text" name="contact_information" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-outline-primary">Save</button>
</form>
@endsection

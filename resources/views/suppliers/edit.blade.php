<!-- resources/views/suppliers/edit.blade.php -->

@extends('layout')

@section('title', 'Edit Supplier')

@section('content')
<h2>Edit Supplier</h2>

<form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
    </div>
    <div class="form-group">
        <label for="contact_information">Contact Information</label>
        <input type="text" name="contact_information" class="form-control" value="{{ $supplier->contact_information }}" required>
    </div>
    <button type="submit" class="btn btn-outline-primary">Update</button>
</form>
@endsection

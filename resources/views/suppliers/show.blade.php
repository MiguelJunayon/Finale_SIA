<!-- resources/views/suppliers/show.blade.php -->

@extends('layout')

@section('title', 'Supplier Details')

@section('content')
<h2>Supplier Details</h2>

<table>
    <tr>
        <th>ID</th>
        <td>{{ $supplier->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $supplier->name }}</td>
    </tr>
    <tr>
        <th>Contact Information</th>
        <td>{{ $supplier->contact_information }}</td>
    </tr>
</table>

<a href="{{ route('suppliers.index') }}" class="btn btn-outline-primary mt-3">Back to Suppliers</a>
@endsection

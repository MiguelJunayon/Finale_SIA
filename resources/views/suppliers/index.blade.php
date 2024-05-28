@extends('layout')

@section('title', 'Suppliers')

@section('content')
<style>
    /* General table styling */
    body{
      background-color: #e0f7fa;
   }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #375f74;
        color: white;
    }

    /* Styling for table data */
    td {
        background-color: #ffffff;
        color: #0277bd;
    }

    /* Styling for buttons */
    .btn-outline-primary {
        color: #375f74;
        border: 2px solid #375f74;
        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #375f74;
        color: white;
    }

    .btn {
    color: #375f74; /* Text color */
    border-color: #375f74; /* Border color */
    background-color: transparent; /* Transparent background */
    padding: 5px; /* Adjust padding */
}

.btn:hover {
    background-color: #375f74; /* Background color on hover */
    color: #fff; /* Text color on hover */
}

.icon {
    width: 20px; /* Adjust icon size */
    height: 20px;
    margin-right: 5px; /* Add spacing between icon and text */
}

</style>

<h2>Suppliers</h2>

<a href="{{ route('suppliers.create') }}" class="btn btn-outline-primary mb-3">Add New Supplier</a>
<a href="{{ route('suppliers.csv') }}" class="btn btn-outline-primary mb-3" type="button">Download CSV</a>
<a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm align-items-center mb-3">
    <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88">
        <title>scan</title>
        <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
    </svg>
</a>
<form method="POST" action="{{ route('suppliers.import') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_file">Upload CSV File</label>
            <input type="file" class="form-control-file" id="csv_file" name="csv_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Import CSV</button>
    </form>


<table>
    <thead>
        <tr>
            <th>Supplier ID</th>
            <th>Name</th>
            <th>Contact Information</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->contact_information }}</td>
            <td>
                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-outline-warning">Edit</a>
                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

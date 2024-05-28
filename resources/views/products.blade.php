@extends('layout')

@section('title', 'Products')

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
        background-color: #375f74 ;
        color: white;
    }

    /* Styling for table data */
    td {
        background-color: #ffffff;
        color: #0277bd;
    }
</style>

<h2>Products</h2>

<a href="products/pdf" class="btn btn-outline-warning mb-3" style="color: #375f74; border-color: #375f74;">Generate PDF</a>


<table>
    <thead>
        <tr>
            <th>Product ID</th>     
            <th>SKU</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Expiration Date</th>
            <th>Supplier</th> 
            <th>QR Code</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>   
            <td>{{ $product->sku }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->expiration_date ? \Carbon\Carbon::parse($product->expiration_date)->format('Y-m-d') : 'N/A' }}</td>
            <td>{{ $product->supplier ? $product->supplier->name : 'N/A' }}</td>
            <td>{!! QrCode::size(100)->generate($product->id) !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

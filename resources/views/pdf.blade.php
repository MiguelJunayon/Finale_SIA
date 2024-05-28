<!DOCTYPE html>
<html>
<head>
    <title>Products PDF</title>
    <style>
        /* General table styling */
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
    </style>
</head>
<body>
    <h2>Products</h2>
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
                <th>QR</th>
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
                <td>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate(
                        'Product: ' . $product->name . '\n' .
                        'SKU: ' . $product->sku . '\n' .
                        'Description: ' . $product->description . '\n' .
                        'Expiration Date: ' . ($product->expiration_date ? \Carbon\Carbon::parse($product->expiration_date)->format('Y-m-d') : 'N/A') . '\n' .
                        'Supplier: ' . ($product->supplier ? $product->supplier->name : 'N/A') . '\n' .
                        'Contact Information: ' . ($product->supplier ? $product->supplier->contact_information : 'N/A') . '\n' .
                        'Quantity: ' . $product->quantity
                    )) !!}">
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

@extends('layout')

@section('content')
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f7fa;
            color: #0277bd;
        }
            

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #495057;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .info {
            text-align: center;
        }

        .info img {
            margin-bottom: 20px;
        }

        .info .title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #007bff;
        }

        .qr-code-box {
            margin: 20px 0;
        }

        .qr-code-box img {
            width: 200px;
            height: 200px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .code {
            font-size: 18px;
            color: #007bff;
            margin-top: 15px;
        }
    </style>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" id="sku" class="common-input">
            </div>
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" class="common-input">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" class="common-input">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" class="common-input">
            </div>
            <div class="form-group">
                <label for="expiration_date">Expiration Date:</label>
                <input type="date" id="expiration_date" class="common-input">
            </div>
            <div class="form-group">
                <button type="button" onclick="generateQR()">Save</button>
            </div>
        </div>
        <div class="info">
            <div class="title">QR Code Generator</div>
            <div class="qr-code-box">
                <img id="qrcode" src="https://static.vecteezy.com/system/resources/previews/019/786/999/original/qr-code-scanning-icon-in-smartphone-on-transparent-background-free-png.png" alt="QR Code">
            </div>
            <header id="header"></header>
            <p id="quantityText"></p>
            <h1 class="code">SCAN QR CODE</h1>
        </div>
    </div>
    <script>
        function generateQR() {
            var sku = document.getElementById('sku').value;
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var quantity = document.getElementById('quantity').value;
            var expirationDate = document.getElementById('expiration_date').value;

            // Check if all fields are filled
            if (sku === "" || name === "" || description === "" || quantity === "" || expirationDate === "") {
                alert("Please fill in all fields before saving.");
                return;
            }

            var qrCodeText = "SKU: " + sku + "\nProduct Name: " + name + "\nDescription: " + description + "\nQuantity: " + quantity + "\nExpiration Date: " + expirationDate;

            var qrCodeImage = document.getElementById('qrcode');
            qrCodeImage.src = 'https://api.qrserver.com/v1/create-qr-code/?data=' + encodeURIComponent(qrCodeText);

            var header = document.getElementById('header');
            header.textContent = name;

            var quantityText = document.getElementById('quantityText');
            quantityText.textContent = "Quantity: " + quantity;

            // Clear form fields
            document.getElementById('sku').value = "";
            document.getElementById('name').value = "";
            document.getElementById('description').value = "";
            document.getElementById('quantity').value = "";
            document.getElementById('expiration_date').value = "";
        }
    </script>
@endsection

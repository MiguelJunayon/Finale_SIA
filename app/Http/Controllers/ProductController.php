<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products and eager load their suppliers
        $products = Product::with('supplier')->get();

        // Pass the products data to the view
        return view('products', compact('products'));
    }

    public function generateQrCode(Product $product)
    {
        $qrCode = QrCode::size(300)->generate($url);
        return response($qrCode)->header('Content-Type', 'image/png');
    }

    public function pdf()
    {
        $products = Product::orderBy('id')->get();

        foreach ($products as $product) {
            $product->qrCode=QrCode::size(100)->generate($product->id);
        }

        $pdf = Pdf::loadView('pdf', compact('products'));

        return $pdf->download('products.pdf');
    }

}

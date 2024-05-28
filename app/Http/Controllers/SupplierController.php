<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }


    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_information' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'contact_information' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function exportCsv()
    {
        $suppliers = Supplier::all();
        $filename = 'suppliers.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['ID', 'Name', 'Contact Information']);

        foreach ($suppliers as $supplier) {
            fputcsv($handle, [
                $supplier->id,
                $supplier->name,
                $supplier->contact_information
            ]);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
    }

    public function import(Request $request)
{
    // Validate the CSV file
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt'
    ]);

    // Process the CSV file
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    // Assuming CSV structure: id, name, contact_information
    foreach ($data as $row) {
        Supplier::create([
            'id' => $row[0],
            'name' => $row[1],
            'contact_information' => $row[2]
        ]);
    }

    // Redirect back with success message
    return redirect()->back()->with('success', 'CSV imported successfully.');
}
}

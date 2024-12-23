<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.home', compact('certificates'));
    }

    public function list()
    {
        $certificates = Certificate::all();
        return view('certificates.main', compact('certificates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'year' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240', // Validasi file PDF
        ]);

        // Menyimpan file PDF
        $filePath = $request->file('file')->store('certificates', 'public');

        // Menyimpan data sertifikat ke database
        Certificate::create([
            'name' => $request->name,
            'type' => $request->type,
            'year' => $request->year,
            'file_path' => $filePath,
            'status' => 'pending',  // Status default
            'points' => 0,          // Poin default
        ]);

        return redirect()->route('certificates.index')->with('success', 'Certificate uploaded successfully.');
    }


    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'year' => 'required|year',
        ]);

        // Menambahkan nilai default untuk status dan points jika tidak ada
        $data = $request->all();
        $data['status'] = $data['status'] ?? 'pending'; // Defaultkan 'status' menjadi 'pending'
        $data['points'] = $data['points'] ?? 0; // Defaultkan 'points' menjadi 0

        $certificate->update($data);
        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

}
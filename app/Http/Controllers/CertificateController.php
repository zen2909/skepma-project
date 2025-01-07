<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\certificate_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = certificate_user::all();
        return view('certificates.home', compact('certificates'));
    }

    public function list()
    {
        $certificates = certificate_user::all();
        $totalPoints = $certificates->where('status', 'valid')->sum('points');
        return view('certificates.main', compact('certificates', 'totalPoints'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'tahun' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240', // Validasi file PDF
        ]);

        // Validasi tambahan berdasarkan jenis sertifikat
        switch ($request->jenis) {
            case 'Sertifikat Lomba Karya Tulis Ilmiah':
            case 'Sertifikat Lomba Kreatifitas dan Inovasi':
            case 'Sertifikat Lomba Minat dan Bakat':
                $validatedData = array_merge($validatedData, $request->validate([
                    'tingkat_lomba' => 'required|string',
                    'prestasi' => 'nullable|string',
                ]));
                break;

            case 'Sertifikat Forum Komunikasi Ilmiah':
                $validatedData = array_merge($validatedData, $request->validate([
                    'tingkat_kegiatan' => 'required|string',
                    'status_keikutsertaan' => 'nullable|string',
                ]));
                break;

            case 'Sertifikat Pengurus Himpunan':
            case 'Sertifikat Pengurus Ukm':
            case 'Sertifikat Kegiatan Himpunan':
            case 'Sertifikat Kegiatan Ukm':
                $validatedData = array_merge($validatedData, $request->validate([
                    'jabatan' => 'required|string',
                    'deskripsi_detail' => 'nullable|string',
                ]));
                break;
        }

        // Simpan file
        $filePath = $request->file('file')->store('certificates', 'public');

        // Buat instance Certificate dan simpan data
        $certificate = new Certificate_user(); // Pastikan nama model sesuai
        $certificate->nama = $request->nama;
        $certificate->jenis = $request->jenis;
        $certificate->tahun = $request->tahun;
        $certificate->file_path = $filePath; // Simpan path file

        // Simpan data tambahan berdasarkan jenis Sertifikat
        if (in_array($request->jenis, ['Sertifikat Lomba Karya Tulis Ilmiah', 'Sertifikat Lomba Kreatifitas dan Inovasi', 'Sertifikat Lomba Minat dan Bakat'])) {
            $certificate->tingkat_lomba = $request->tingkat_lomba;
            $certificate->prestasi = $request->prestasi;
        } elseif ($request->jenis === 'Sertifikat Forum Komunikasi Ilmiah') {
            $certificate->tingkat_kegiatan = $request->tingkat_kegiatan;
            $certificate->status_keikutsertaan = $request->status_keikutsertaan;
        } elseif (in_array($request->jenis, ['Sertifikat Pengurus Himpunan', 'Sertifikat Pengurus Ukm'])) {
            $certificate->jabatan = $request->jabatan;
            $certificate->deskripsi_detail = $request->deskripsi_detail;
        }

        // Simpan ke database
        $certificate->save();

        // Redirect dengan pesan sukses
        return redirect()->route('certificates.index')->with('success', 'Certificate uploaded successfully.');
    }



    public function update(Request $request, certificate_user $certificate)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'year' => 'required|year',
        ]);

        $data = $request->all();
        $data['status'] = $data['status'] ?? 'pending';
        $data['points'] = $data['points'] ?? 0;

        $certificate->update($data);
        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

}
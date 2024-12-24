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

        dd($request->all());

        // Validasi awal
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'tahun' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240', // Validasi file PDF
        ]);

        switch ($request->jenis) {
            case 'sertifikat_lomba_karya_tulis_ilmiah':
            case 'sertifikat_lomba_kreatifitas_dan_inovasi':
            case 'sertifikat_lomba_minat_dan_bakat':
                $validatedData = array_merge($validatedData, $request->validate([
                    'tingkat_lomba' => 'required|string',
                    'prestasi' => 'nullable|string',
                ]));
                break;

            case 'sertifikat_forum_komunikasi_ilmiah':
                $validatedData = array_merge($validatedData, $request->validate([
                    'tingkat_kegiatan' => 'required|string',
                    'status_keikutsertaan' => 'nullable|string',
                ]));
                break;

            case 'sertifikat_pengurus_himpunan':
            case 'sertifikat_pengurus_ukm':
                $validatedData = array_merge($validatedData, $request->validate([
                    'jabatan' => 'required|string',
                    'deskripsi_detail' => 'nullable|string',
                ]));
                break;
        }

        $filePath = $request->file('file')->store('certificates', 'public');

        $data = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,
            'file_path' => $filePath,
        ];

        if ($request->jenis === 'sertifikat_lomba_karya_tulis_ilmiah' || 'sertifikat_lomba_kreatifitas_dan_inovasi' || 'sertifikat_lomba_minat_dan_bakat') {
            $data['tingkat_lomba'] = $request->tingkat_lomba;
            $data['prestasi'] = $request->prestasi;
        } else if ($request->jenis === 'sertifikat_forum_komunikasi_ilmiah') {
            $data['tingkat_kegiatan'] = $request->tingkat_kegiatan;
            $data['status_keikutsertaan'] = $request->status_keikutsertaan;
        } else if ($request->jenis === 'sertifikat_pengurus_himpunan' || 'sertifikat_pengurus_ukm') {
            $data['jabatan'] = $request->jabatan;
            $data['deskripsi_detail'] = $request->deskripsi_detail;
        }

        // Menyimpan data ke database
        $certificate = new Certificate();
        $certificate->nama = $request->nama;
        $certificate->jenis = $request->jenis;
        $certificate->tingkat_lomba = $request->tingkat;
        $certificate->tingkat_kegiatan = $request->tingkat_kegiatan;
        $certificate->status_keikutsertaan = $request->status_keikutsertaan;
        $certificate->jabatan = $request->jabatan;
        $certificate->deskripsi_detail = $request->deskripsi_detail;
        $certificate->prestasi = $request->prestasi;
        $certificate->tahun = $request->tahun;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/certificates');
            $certificate->file = $path; // Kolom file di database
        }


        // Redirect dengan pesan sukses
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
        $data['status'] = $data['status'] ?? 'pending';
        $data['points'] = $data['points'] ?? 0;

        $certificate->update($data);
        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

}
<?php

namespace App\Http\Controllers;


use App\Models\Certificate;
use App\Models\certificate_data;
use App\Models\certificate_user;
use App\Models\SertifikatLomba;
use Illuminate\Support\Facades\Log;
use App\Models\JenisSertifikat;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {

        // $sertifikat = certificate_user::all();

        $sertifikat = Certificate_user::orderBy('id', 'asc')->get();

        return view('dosen.index', compact('sertifikat'));

    }

    public function approve_lomba($id)
    {

        $certificateUpload = certificate_user::findOrFail($id);

        $points = 0;

        if ($certificateUpload->jenis === 'Sertifikat Lomba Karya Tulis Ilmiah') {
            if ($certificateUpload->tingkat_lomba === 'Internasional') {
                if ($certificateUpload->prestasi === 'Juara 1/2/3') {
                    $points = 150;
                } elseif ($certificateUpload->prestasi === 'Finalis') {
                    $points = 100;
                } elseif ($certificateUpload->prestasi === 'Peserta') {
                    $points = 75;
                }
            } elseif ($certificateUpload->tingkat_lomba === 'Nasional') {
                if ($certificateUpload->prestasi === 'Juara 1/2/3') {
                    $points = 100;
                } elseif ($certificateUpload->prestasi === 'Finalis') {
                    $points = 75;
                } elseif ($certificateUpload->prestasi === 'Peserta') {
                    $points = 60;
                }
            }
        } else if ($certificateUpload->jenis === 'Sertifikat Lomba Kreatifitas dan Inovasi') {
            if ($certificateUpload->tingkat_lomba === 'Internasional') {
                if ($certificateUpload->prestasi === 'Juara 1/2/3') {
                    $points = 150;
                } elseif ($certificateUpload->prestasi === 'Finalis') {
                    $points = 100;
                } elseif ($certificateUpload->prestasi === 'Peserta') {
                    $points = 75;
                }
            } elseif ($certificateUpload->tingkat_lomba === 'Nasional') {
                if ($certificateUpload->prestasi === 'Juara 1/2/3') {
                    $points = 100;
                } elseif ($certificateUpload->prestasi === 'Finalis') {
                    $points = 75;
                } elseif ($certificateUpload->prestasi === 'Peserta') {
                    $points = 60;
                }
            }
        }

        $certificateUpload->points = $points;
        $certificateUpload->status = 'valid';
        $certificateUpload->save();

        return redirect()->route('dosen.index')->with('success', 'Sertifikat berhasil disetujui dan poin telah diperbarui.');
    }



    public function reject($id)
    {
        $certificate = certificate_user::findOrFail($id);
        $certificate->status = 'invalid';
        $certificate->save();

        return redirect()->route('dosen.index')->with('success', 'Certificate rejected successfully.');
    }
}
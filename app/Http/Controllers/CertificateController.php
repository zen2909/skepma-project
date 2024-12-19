<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'criteria' => 'required',
            'points' => 'required|integer',
        ]);

        Certificate::create($request->all());
        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'name' => 'required',
            'criteria' => 'required',
            'points' => 'required|integer',
        ]);

        $certificate->update($request->all());
        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
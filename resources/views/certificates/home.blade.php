@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

<style>
    .custom-table th,
    .custom-table td {

        /* Memberikan padding yang lebih besar untuk ruang lebih pada kolom */
        text-align: center;
        /* Menyusun teks di tengah */
    }

    .custom-table th {
        width: 200px;
        /* Lebar kolom header yang lebih lebar */
    }

    .custom-table td {
        max-width: 200px;
        /* Lebar kolom data yang lebih lebar */
        align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .table-responsive {
        max-width: 100%;
        overflow-x: auto;
    }

</style>

<div class="d-flex">
    <div class="content">
        <div class="container mt-5">
            <h2>Upload Sertifikat</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class=row>
                <div class=col>
                    <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Sertifikat</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis Sertifikat</label>
                                    <select name="jenis" id="jenis" class="form-select" required onchange="handleTypeChange(this.value)">
                                        <option value="" disabled selected>Pilih Jenis</option>
                                        <option value="Sertifikat Lomba Karya Tulis Ilmiah">Sertifikat Lomba Karya Tulis Ilmiah</option>
                                        <option value="Sertifikat Lomba Kreatifitas dan Inovasi">Sertifikat Lomba Kreatifitas dan inovasi</option>
                                        <option value="Sertifikat Lomba Minat dan Bakat">Sertifikat Lomba Minat dan Bakat</option>
                                        <option value="Sertifikat Forum Komunikasi Ilmiah">Sertifikat Forum Komunikasi Ilmiah</option>
                                        <option value="Sertifikat Pengurus Himpunan">Sertifikat Pengurus Himpunan</option>
                                        <option value="Sertifikat Pengurus Ukm">Sertifikat Pengurus UKM</option>
                                        <option value="Sertifikat Kegiatan Himpunan">Sertifikat Kegiatan Himpunan</option>
                                        <option value="Sertifikat Kegiatan Ukm">Sertifikat Kegiatan UKM</option>
                                    </select>
                                </div>

                                <div id="dynamic-fields"></div>

                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload PDF</label>
                                    <input type="file" name="file" id="file" class="form-control" accept="application/pdf" required>
                                    <small class="form-text text-muted">Only PDF files are allowed (max 10MB).</small>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Upload Sertifikat</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class=col>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-light">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Sertifikat</th>
                                    <th>Jenis</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($certificates as $certificate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $certificate->nama }}</td>
                                    <td>{{ $certificate->jenis }}</td>
                                    <td>{{ $certificate->tahun }}</td>
                                    <td>
                                        <span class="badge {{ $certificate->status == 'valid' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($certificate->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Sertifikat Tidak Ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnCollapse = document.getElementById('sidebar-toggler');
        if (btnCollapse) {
            btnCollapse.addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar-toggler');
                if (sidebar) {
                    sidebar.classList.toggle('show');
                } else {
                    console.error('Element with ID "sidebarMenu" not found.');
                }
            });
        } else {
            console.error('Element with ID "collapseMenu" not found.');
        }
    });

</script> --}}

<script>
    function handleTypeChange(selectedType) {
        const dynamicFields = document.getElementById('dynamic-fields');
        dynamicFields.innerHTML = ''; // Hapus isi sebelumnya

        if (selectedType === 'Sertifikat Lomba Karya Tulis Ilmiah' || selectedType === 'Sertifikat Lomba Kreatifitas dan Inovasi' || selectedType === 'Sertifikat Lomba Minat dan Bakat') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="tingkat_lomba" class="form-label">Tingkat_lomba Lomba</label>
                    <select name="tingkat_lomba" id="tingkat_lomba" class="form-select" required>
                        <option value="" disabled selected>Pilih Tingkat Lomba</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Regional">Regional</option>
                        <option value="Institut">Institut</option>
                        <option value="Fakultas">Fakultas</option>
                        <option value="Jurusan">Jurusan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="prestasi" class="form-label">Prestasi</label>
                    <select name="prestasi" id="prestasi" class="form-select" required>
                        <option value="" disabled selected>Pilih Prestasi</option>
                        <option value="Juara 1/2/3">Juara 1/2/3</option>
                        <option value="Finalis">Finalis</option>
                        <option value="Peserta">Peserta</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'Sertifikat Forum Komunikasi Ilmiah') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="tingkat_kegiatan" class="form-label">Tingkat_kegiatan Kegiatan</label>
                    <select name="tingkat_kegiatan" id="tingkat_kegiatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Tingkat Kegiatan</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Regional">Regional</option>
                        <option value="Institut">Institut</option>
                        <option value="Fakultas">Fakultas</option>
                        <option value="Jurusan">Jurusan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_keikutsertaan" class="form-label">Status Keikutsertaan</label>
                    <select name="status_keikutsertaan" id="status_keikutsertaan" class="form-select" required>
                        <option value="" disabled selected>Pilih Status Keikutsertaan</option>
                        <option value="Pembicara">Pembicara</option>
                        <option value="Peserta">Peserta</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'Sertifikat Pengurus Himpunan' || selectedType === 'Sertifikat Pengurus Ukm') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Pengurus inti">Pengurus Inti</option>
                        <option value="Koordinator">Koordinator</option>
                        <option value="Anggota aktif">Anggota Aktif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_detail" class="form-label">Deskripsi Detail</label>
                    <select name="deskripsi_detail" id="deskripsi_detail" class="form-select" required>
                        <option value="" disabled selected>Pilih Deskripsi</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Koordinator">Koordinator</option>
                        <option value="Anggota aktif">Anggota</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'Sertifikat Kegiatan Himpunan' || selectedType === 'Sertifikat Kegiatan Ukm') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="Panitia_inti">Panitia Inti</option>
                        <option value="Koordinator">Koordinator</option>
                        <option value="Panitia_aktif">Panitia Aktif</option>
                        <option value="Peserta">Peserta</option>
                    </select>
                </div>
               <div class="mb-3">
                    <label for="deskripsi_detail" class="form-label">Deskripsi Detail</label>
                    <select name="deskripsi_detail" id="deskripsi_detail" class="form-select" required>
                        <option value="" disabled selected>Pilih Deskripsi</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Koordinator">Koordinator</option>
                        <option value="Anggota aktif">Anggota</option>
                        <option value="Peserta">Peserta</option>
                    </select>
                </div>
            `;
        }
    }

</script>

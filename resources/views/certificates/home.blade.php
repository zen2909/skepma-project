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
                                        <option value="sertifikat_lomba_karya_tulis_ilmiah">Sertifikat Lomba Karya Tulis Ilmiah</option>
                                        <option value="sertifikat_lomba_kreatifitas_dan_inovasi">Sertifikat Lomba Kreatifitas dan inovasi</option>
                                        <option value="sertifikat_lomba_minat_dan_bakat">Sertifikat Lomba Minat dan Bakat</option>
                                        <option value="sertifikat_forum_komunikasi_ilmiah">Sertifikat Forum Komunikasi Ilmiah</option>
                                        <option value="sertifikat_pengurus_himpunan">Sertifikat Pengurus Himpunan</option>
                                        <option value="sertifikat_pengurus_ukm">Sertifikat Pengurus UKM</option>
                                        <option value="sertifikat_kegiatan_himpunan">Sertifikat Kegiatan Himpunan</option>
                                        <option value="sertifikat_kegiatan_ukm">Sertifikat Kegiatan UKM</option>
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
                                    <td>{{ $certificate->name }}</td>
                                    <td>{{ $certificate->type }}</td>
                                    <td>{{ $certificate->year }}</td>
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

        if (selectedType === 'sertifikat_lomba_karya_tulis_ilmiah' || selectedType === 'sertifikat_lomba_kreatifitas_dan_inovasi' || selectedType === 'sertifikat_lomba_minat_dan_bakat') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="tingkat" class="form-label">Tingkat Lomba</label>
                    <select name="tingkat" id="tingkat" class="form-select" required>
                        <option value="" disabled selected>Pilih Tingkat Lomba</option>
                        <option value="internasional">Internasional</option>
                        <option value="nasional">Nasional</option>
                        <option value="regional">Regional</option>
                        <option value="institut">Institut</option>
                        <option value="fakultas">Fakultas</option>
                        <option value="jurusan">Jurusan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="prestasi" class="form-label">Prestasi</label>
                    <select name="prestasi" id="prestasi" class="form-select" required>
                        <option value="" disabled selected>Pilih Prestasi</option>
                        <option value="juara_123">Juara 1/2/3</option>
                        <option value="finalis">Finalis</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'sertifikat_forum_komunikasi_ilmiah') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="tingkat" class="form-label">Tingkat Kegiatan</label>
                    <select name="tingkat" id="tingkat" class="form-select" required>
                        <option value="" disabled selected>Pilih Tingkat Kegiatan</option>
                        <option value="internasional">Internasional</option>
                        <option value="nasional">Nasional</option>
                        <option value="regional">Regional</option>
                        <option value="institut">Institut</option>
                        <option value="fakultas">Fakultas</option>
                        <option value="jurusan">Jurusan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_keikutsertaan" class="form-label">Status Keikutsertaan</label>
                    <select name="status_keikutsertaan" id="status_keikutsertaan" class="form-select" required>
                        <option value="" disabled selected>Pilih Status Keikutsertaan</option>
                        <option value="pembicara">Pembicara</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'sertifikat_pengurus_himpunan' || selectedType === 'sertifikat_pengurus_ukm') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="pengurus_inti">Pengurus Inti</option>
                        <option value="koordinator">Koordinator</option>
                        <option value="anggota_aktif">Anggota Aktif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_detail" class="form-label">Deskripsi Detail</label>
                    <select name="deskripsi_detail" id="deskripsi_detail" class="form-select" required>
                        <option value="" disabled selected>Pilih Deskripsi</option>
                        <option value="ketua">Ketua</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="bendahara">Bendahara</option>
                        <option value="koordinator">Koordinator</option>
                        <option value="anggota_aktif">Anggota</option>
                    </select>
                </div>
            `;
        } else if (selectedType === 'sertifikat_kegiatan_himpunan' || selectedType === 'sertifikat_kegiatan_ukm') {
            dynamicFields.innerHTML = `
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        <option value="panitia_inti">Panitia Inti</option>
                        <option value="koordinator">Koordinator</option>
                        <option value="panitia_aktif">Panitia Aktif</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
               <div class="mb-3">
                    <label for="deskripsi_detail" class="form-label">Deskripsi Detail</label>
                    <select name="deskripsi_detail" id="deskripsi_detail" class="form-select" required>
                        <option value="" disabled selected>Pilih Deskripsi</option>
                        <option value="ketua">Ketua</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="bendahara">Bendahara</option>
                        <option value="koordinator">Koordinator</option>
                        <option value="anggota_aktif">Anggota</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
            `;
        }
    }

</script>

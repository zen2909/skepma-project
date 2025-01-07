@extends('layouts.app')

@section('content')

<div class="d-flex">
    <div class="content">
        <div class="container mt-5">
            <h2>Certificate List</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-light">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Sertifikat</th>
                            <th>Jenis</th>
                            <th>Tingkat Lomba</th>
                            <th>Tingkat Kegiatan</th>
                            <th>Jabatan</th>
                            <th>Prestasi</th>
                            <th>Status Keikutsertaan</th>
                            <th>Deskripsi Detail</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Poin</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sertifikat as $certificate)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $certificate->nama }}</td>
                            <td>{{ $certificate->jenis }}</td>
                            <td>{{ $certificate->tingkat_lomba }}</td>
                            <td>{{ $certificate->tingkat_kegiatan }}</td>
                            <td>{{ $certificate->jabatan }}</td>
                            <td>{{ $certificate->prestasi }}</td>
                            <td>{{ $certificate->status_keikutsertaan }}</td>
                            <td>{{ $certificate->deskripsi_detail }}</td>
                            <td class="text-center">{{ $certificate->tahun }}</td>
                            <td class="text-center">
                                <span class="badge {{ $certificate->status == 'valid' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($certificate->status) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $certificate->points }}</td>
                            <td class="text-center">
                                <a href="{{ asset('storage/' . $certificate->file_path) }}" target="_blank" class="btn btn-sm btn-primary">
                                    View PDF
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#" onclick="approveCertificate('{{ $certificate->id }}', '{{ $certificate->jenis }}'); return false;" class="btn btn-sm btn-success">Approve</a>

                                <form id="approve-form-{{ $certificate->id }}" action="" method="POST" style="display:none;">
                                    @csrf
                                </form>

                                <form action="{{ route('dosen.reject', $certificate->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center">Sertifikat Tidak Ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function approveCertificate(id, jenis) {
        let url;

        // Tentukan URL berdasarkan jenis sertifikat
        if (jenis === 'Sertifikat Lomba Karya Tulis Ilmiah' ||
            jenis === 'Sertifikat Lomba Kreatifitas dan Inovasi' ||
            jenis === 'Sertifikat Lomba Minat dan Bakat') {
            url = "{{ route('approve.lomba', '') }}/" + id;
        } else if (jenis === 'Sertifikat Forum Komunikasi Ilmiah') {
            url = "{{ route('approve.forum', '') }}/" + id;
        } else if (jenis === 'Sertifikat Pengurus Himpunan' ||
            jenis === 'Sertifikat pengurus ukm') {
            url = "{{ route('approve.pengurus', '') }}/" + id;
        } else if (jenis === 'Sertifikat Kegiatan Himpunan' ||
            jenis === 'Sertifikat Kegiatan Ukm') {
            url = "{{ route('approve.kegiatan', '') }}/" + id;
        } else {
            alert('Jenis Sertifikat tidak dikenali.');
            return;
        }

        // Set action form dan kirim
        document.getElementById('approve-form-' + id).action = url;
        document.getElementById('approve-form-' + id).submit();
    }

</script>

@endsection

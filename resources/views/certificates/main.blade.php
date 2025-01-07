@extends('layouts.app')

@section('title', 'Certificates List')

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
            <h2>Certificate List</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped custom-table table-light">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Sertifikat</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Poin</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="text-end mt-3">
                            <strong>Total Points : </strong> {{ $totalPoints }}
                        </div>
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
                            <td>{{ $certificate->points }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $certificate->file_path) }}" target="_blank" class="btn btn-sm btn-primary">
                                    View PDF
                                </a>
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
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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
                                    <label for="name" class="form-label">Nama Sertifikat</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Jenis</label>
                                    <input type="text" name="type" id="type" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label">Tahun</label>
                                    <input type="number" name="year" id="year" class="form-control" required>
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
<script>
    const sidebarToggler = document.querySelector('.sidebar-toggler');
    const body = document.body;

    sidebarToggler.addEventListener('click', () => {
        body.classList.toggle('collapsed');
    });

</script>

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-1">Transaksi Peminjaman Buku</h3>
                <p class="text-muted small mb-0">Catat peminjaman buku oleh anggota perpustakaan.</p>
            </div>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="anggota_id" class="form-label">Pilih Anggota</label>
                        <select class="form-select @error('anggota_id') is-invalid @enderror"
                        id="anggota_id" name="anggota_id">
                        <option value="">-- Pilih Anggota --</option>
                        @foreach ($anggota as $a)
                        <option value="{{ $a->id }}"
                        {{ old('anggota_id') == $a->id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                    @endforeach
                </select>
                @error('anggota_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="buku_id" class="form-label">Pilih Buku</label>
                <select class="form-select @error('buku_id') is-invalid @enderror"
                id="buku_id" name="buku_id">
                <option value="">-- Pilih Buku --</option>
                @foreach ($buku as $b)
                <option value="{{ $b->id }}"
                {{ old('buku_id') == $b->id ? 'selected' : '' }}>
                {{ $b->judul }} (Stok: {{ $b->stok }})
            </option>
            @endforeach
        </select>
        @error('buku_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
        <input type="date"
        class="form-control @error('tanggal_pinjam') is-invalid @enderror"
        id="tanggal_pinjam"
        name="tanggal_pinjam"
        value="{{ old('tanggal_pinjam', date('Y-m-d')) }}">
        @error('tanggal_pinjam')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
        <i class="bi bi-save me-1"></i> Simpan Peminjaman
    </button>
</div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin', ['title' => 'Tambah Kantor Pusat','icon' => 'fas fa-building'])
@section('content')

@if(session()->has('error_create'))
<div class="alert alert-danger" role="alert">
    <i class="fas fa-info mr-1"></i> {{ session('error_create') }}
</div>
@endif
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.kantor.pusat.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('admin.kantor.pusat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kantor <span class="text-danger">* <sup class="font-italic">Kapital</sup></span></label>
                        <input type="text" name="nama_kantor" class="form-control @error('nama_kantor') is-invalid @enderror" value="{{ @old('nama_kantor') }}" placeholder="Nama Kantor..." autofocus>
                        @error('nama_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email') }}" placeholder="Email...">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>No. Telepone <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                        <input type="number" name="no_telepone" class="form-control @error('no_telepone') is-invalid @enderror" value="{{ @old('no_telepone') }}" placeholder="No. Telepone...">
                        @error('no_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="5" rows="5" placeholder="Alamat...">{{ @old('alamat') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-md btn-block btn-primary shadow-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.kantor.pusat.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endpush

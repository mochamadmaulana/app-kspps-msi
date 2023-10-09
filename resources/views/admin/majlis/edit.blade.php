@extends('layouts.admin', ['title' => 'Edit Majlis','icon' => 'fas fa-house-user'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.majlis.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('admin.majlis.update',$majlis->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama Majlis <span class="text-danger">*</span></label>
                        <input type="text" name="nama_majlis" class="form-control @error('nama_majlis') is-invalid @enderror" value="{{ @old('nama_majlis',$majlis->nama_majlis) }}" placeholder="Nama Majlis..." autofocus>
                        @error('nama_majlis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-block btn-primary shadow-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.majlis.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Edit</li>
@endpush

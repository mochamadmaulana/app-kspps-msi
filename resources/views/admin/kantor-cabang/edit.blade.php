@extends('layouts.admin', ['title' => 'Edit Kantor Cabang','icon' => 'fas fa-building'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.kantor.cabang.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('admin.kantor.cabang.update',$kantor->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Nama Kantor <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kantor" class="form-control @error('nama_kantor') is-invalid @enderror" value="{{ @old('nama_kantor',$kantor->nama_kantor) }}" placeholder="Nama Kantor..." autofocus>
                        @error('nama_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email',$kantor->email) }}" placeholder="Email...">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>No. Telepone <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                        <input type="number" name="no_telepone" class="form-control @error('no_telepone') is-invalid @enderror" value="{{ @old('no_telepone',$kantor->no_telepone) }}" placeholder="No. Telepone...">
                        @error('no_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="5" rows="5" placeholder="Alamat...">{{ @old('alamat',$kantor->alamat) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-md btn-block btn-primary shadow-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.kantor.cabang.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Edit</li>
@endpush

@extends('layouts.admin', ['title' => 'Kantor Pusat','icon' => 'fas fa-building'])

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('success') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        @if (!empty($pusat))
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h5 class="card-title">Detail</h5>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-building mr-1"></i> Kantor Pusat</strong>
                        <p class="text-muted">{{ $pusat->nama_kantor }}</p>
                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> No. Tlp</strong>
                        <p class="text-muted">{{ $pusat->no_telepone }}</p>
                        <hr>

                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                        <p class="text-muted">{{ $pusat->email }}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{ $pusat->alamat }}</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Edit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.kantor.pusat.update',$pusat->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nama Kantor <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kantor" class="form-control @error('nama_kantor') is-invalid @enderror" value="{{ @old('nama_kantor',$pusat->nama_kantor) }}" placeholder="Nama Kantor...">
                                @error('nama_kantor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>No. Telepone <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                                <input type="number" name="no_telepone" class="form-control @error('no_telepone') is-invalid @enderror" value="{{ @old('no_telepone',$pusat->no_telepone) }}" placeholder="No. Telepone...">
                                @error('no_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">* <sup class="font-italic">Unique</sup></span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email',$pusat->email) }}" placeholder="Email...">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="5" rows="5" placeholder="Alamat...">{{ @old('alamat',$pusat->alamat) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-md btn-block btn-primary shadow-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="callout callout-warning">
            <h5><i class="fas fa-info"></i> Kantor Pusat Belum Didefinisikan</h5>
            Untuk mendefinisikan kantor pusat silahkan klik link berikut : <i><b><a href="javascript:void(0)" data-toggle="modal" data-target="#ModalMendefinikanKantor">Mendefisinikan kantor pusat</a></b></i>
        </div>
        @endif

    </div>
</div>
@endsection

@push('modal')
<!-- Modal Mendefisinikan Kantor -->
<div class="modal fade" id="ModalMendefinikanKantor" tabindex="-1" aria-labelledby="ModalMendefinikanKantorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalMendefinikanKantorLabel">Mendefinisikan Kantor Pusat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <button type="button" class="btn btn-md btn-block btn-secondary shadow-sm" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush

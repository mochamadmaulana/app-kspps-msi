@extends('layouts.admin', ['title' => 'Kantor Cabang','icon' => 'fas fa-building'])

@section('content')
@if (session()->has('success'))
<div class="callout callout-success">
    <h5><i class="fas fa-check mr-1"></i> {{ session('success') }}</h5>
    <span>No. Induk Karyawan : <b><i>{{ session('nik_karyawan') }}</i></b></span><br>
    <span>Nama Admin : <b><i>{{ session('nama_karyawan') }}</i></b></span><br>
    <span>Password : <b><i>{{ session('password') }}</i></b></span><br>
    <span>Kantor : <b><i>{{ session('nama_kantor') }}</i></b></span><br>
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.kantor.cabang.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus mr-1"></i> Tambah Data</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTambahAdmin"><i class="fas fa-plus mr-1"></i> Tambah Admin</a>
                @if (request('search'))
                <div class="float-right">
                    <a href="{{ route('admin.kantor.cabang.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt mr-1"></i> Refresh</a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control form-control-sm" value="{{ request('search') }}" placeholder="Search..." autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search mr-1"></i> Search</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tableKantor" class="table table-bordered table-hover mb-2">
                        <thead class="bg-secondary">
                            <tr>
                                <th>Nama</th>
                                <th>No. Telepone</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cabang->count() > 0)
                            @foreach ($cabang as $val)
                                <tr>
                                    <td>{{ $val->nama_kantor }}</td>
                                    <td>{{ $val->no_telepone }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->alamat }}</td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-xs btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.kantor.cabang.edit',$val->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('admin.kantor.cabang.destroy', $val->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus kantor cabang {{ $val->nama_kantor }} ?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center"><span class="text-muted font-italic">Data tidak ditemukan!</span></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <span class="float-right">{{ $cabang->links() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item active">List Data</li>
@endpush

@if ($cabang->count() > 0)
@push('modal')
<!-- Modal Tambah Admin -->
<div class="modal fade" id="ModalTambahAdmin" aria-labelledby="ModalTambahAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahAdminLabel">Tambah Admin Kantor Cabang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.kantor.cabang.cek-admin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Kantor Cabang <span class="text-danger">*</span></label>
                        <select name="kantor_cabang" class="form-control @error('kantor_cabang') is-invalid @enderror" id="selectKantorCabang">
                            <option value="">- pilih -</option>
                            @foreach ($all_cabang as $val_all_cabang)
                            <option value="{{ $val_all_cabang->id }}" @if (@old('kantor_cabang') == $val_all_cabang->id) selected @endif>{{ $val_all_cabang->nama_kantor }}</option>
                            @endforeach
                        </select>
                        @error('kantor_cabang')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">Lanjutkan</button>
                    <button type="button" class="btn btn-sm btn-secondary shadow-sm" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush

@push('js')
<script>
$(document).ready(function (e) {
    $('#selectKantorCabang').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
});
</script>
@endpush
@endif

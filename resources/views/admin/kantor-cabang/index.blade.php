@extends('layouts.admin', ['title' => 'Kantor Cabang','icon' => 'fas fa-building'])

@section('content')
<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.kantor.cabang.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus mr-1"></i> Tambah Data</a>
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

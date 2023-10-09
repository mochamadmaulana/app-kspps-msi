@extends('layouts.admin', ['title' => 'Majlis','icon' => 'fas fa-house-user'])

@section('content')
<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.majlis.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus mr-1"></i> Tambah Data</a>
                @if (request('search'))
                <div class="float-right">
                    <a href="{{ route('admin.majlis.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt mr-1"></i> Refresh</a>
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
                                <th>Nama Majlis</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($majelis->count() > 0)
                            @foreach ($majelis as $val)
                                <tr>
                                    <td>{{ $val->nama_majlis }}</td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-xs btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.majlis.edit',$val->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('admin.majlis.destroy', $val->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus majlis {{ $val->nama_majlis }} ?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="2" class="text-center"><span class="text-muted font-italic">Data tidak ditemukan!</span></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <span class="float-right">{{ $majelis->links() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item active">List Data</li>
@endpush

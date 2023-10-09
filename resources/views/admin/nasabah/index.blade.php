@extends('layouts.admin', ['title' => 'Nasabah','icon' => 'fas fa-address-book'])

@section('content')
<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.nasabah.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus mr-1"></i> Tambah Data</a>
                @if (request('search'))
                <div class="float-right">
                    <a href="{{ route('admin.nasabah.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt mr-1"></i> Refresh</a>
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
                    <table id="tableKaryawan" class="table table-bordered table-hover mb-2">
                        <thead class="bg-secondary">
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>No. Pendaftaran</th>
                                <th>No. Identitas</th>
                                <th>Nama</th>
                                <th>Majlis</th>
                                <th>No. Tlp</th>
                                <th>Status</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($nasabah->count() > 0)
                            @foreach ($nasabah as $val)
                                <tr>
                                    {{-- <td>{{ $nasabah->count() * ($nasabah->currentPage() - 1) + $loop->iteration }}</td> --}}
                                    <td>{{ $val->no_pendaftaran }}</td>
                                    <td>
                                        @if ($val->jenis_identitas == 'KTP')
                                        {{ $val->no_identitas }} <span class="badge badge-primary ml-1">{{ $val->jenis_identitas }}</span>
                                        @else
                                        {{ $val->no_identitas }} <span class="badge badge-secondary ml-1">{{ $val->jenis_identitas }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $val->nama_lengkap }}</td>
                                    <td>{{ $val->majlis->nama_majlis }}</td>
                                    <td>{{ $val->no_telepone }}</td>
                                    <td>
                                        @if ($val->status_pendaftaran == 'Pending')
                                            <span class="badge badge-info"><i class="fas fa-spinner mr-1"></i> {{ $val->status_pendaftaran }}</span>
                                        @elseif ($val->status_pendaftaran == 'Survei')
                                            <span class="badge badge-warning"><i class="fas fa-clock mr-1"></i> {{ $val->status_pendaftaran }}</span>
                                        @elseif ($val->status_pendaftaran == 'Ditolak')
                                            <span class="badge badge-danger"><i class="fas fa-ban mr-1"></i> {{ $val->status_pendaftaran }}</span>
                                        @else
                                            <span class="badge badge-success"><i class="fas fa-check-double mr-1"></i> {{ $val->status_pendaftaran }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-xs btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.nasabah.show',$val->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Detail</a>
                                                <a href="{{ route('admin.nasabah.edit',$val->id) }}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('admin.nasabah.destroy', $val->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus nasabah {{ $val->nama_lengkap }} ?')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-center"><span class="text-muted font-italic">Data tidak ditemukan!</span></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md">
                        <span class="float-right">{{ $nasabah->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item active">List Data</li>
@endpush

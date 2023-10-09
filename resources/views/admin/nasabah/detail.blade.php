@extends('layouts.admin', ['title' => 'Detail Nasabah','icon' => 'fas fa-address-book'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.nasabah.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong><i class="fas fa-list-ol mr-1"></i> No. Pendaftaran</strong>
                        <p class="text-muted">{{ $nasabah->no_pendaftaran }}</p>
                        <hr>

                        <strong><i class="fas fa-address-card mr-1"></i> No. Identitas</strong>
                        <p class="text-muted">
                            @if ($nasabah->jenis_identitas == 'KTP')
                            {{ $nasabah->no_identitas }} <span class="badge badge-primary ml-1">{{ $nasabah->jenis_identitas }}</span>
                            @else
                            {{ $nasabah->no_identitas }} <span class="badge badge-secondary ml-1">{{ $nasabah->jenis_identitas }}</span>
                            @endif
                        </p>
                        <hr>

                        <strong><i class="fas fa-user-tie mr-1"></i> Nama Lengkap</strong>
                        <p class="text-muted">{{ $nasabah->nama_lengkap }}</p>
                        <hr>

                        <strong><i class="fas fa-user mr-1"></i> Nama Ibu Kandung</strong>
                        <p class="text-muted">{{ $nasabah->nama_ibu_kandung }}</p>
                        <hr>

                        <strong><i class="fas fa-house-user mr-1"></i> Majlis</strong>
                        <p class="text-muted">{{ $nasabah->majlis->nama_majlis }}</p>
                        <hr>

                        <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
                        <p class="text-muted">{{ $nasabah->jenis_kelamin }}</p>
                        <hr>

                        <strong><i class="fas fa-store mr-1"></i> Jenis Usaha</strong>
                        <p class="text-muted">{{ $nasabah->jenis_usaha->nama_usaha }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status</strong>
                        @if ($nasabah->is_aktif)
                        <p class="text-muted"><span class="badge badge-success"><i class="fas fa-check mr-1"></i> Aktif</span></p>
                        @else
                        <p class="text-muted"><span class="badge badge-danger"><i class="fas fa-times mr-1"></i> Tidak Aktif</span></p>
                        @endif
                        <hr>

                        <strong><i class="fas fa-building mr-1"></i> Kantor</strong>
                        <p class="text-muted">
                            @if ($nasabah->kantor->is_pusat)
                                KP - {{ $nasabah->kantor->nama_kantor }}
                            @else
                                KC - {{ $nasabah->kantor->nama_kantor }}
                            @endif
                        </p>
                        <hr>

                        <strong><i class="fas fa-birthday-cake mr-1"></i> Tempat, Tanggal Lahir</strong>
                        <p class="text-muted">{{ $nasabah->kota->nama_kota }}, {{ \Carbon\Carbon::parse($nasabah->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                        <hr>

                        <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan Terakhir</strong>
                        <p class="text-muted">{{ $nasabah->pendidikan_terakhir }}</p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <strong><i class="fas fa-praying-hands mr-1"></i> Agama</strong>
                        <p class="text-muted">{{ $nasabah->agama }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status Pernikahan</strong>
                        <p class="text-muted">{{ $nasabah->status_pernikahan }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status Pendaftaran</strong>
                        @if ($nasabah->status_pendaftaran == 'Pending')
                        <p class="text-muted"><span class="badge badge-info"><i class="fas fa-spinner mr-1"></i> {{ $nasabah->status_pendaftaran }}</span></p>
                        @elseif ($nasabah->status_pendaftaran == 'Survei')
                        <p class="text-muted"><span class="badge badge-warning"><i class="fas fa-clock mr-1"></i> {{ $nasabah->status_pendaftaran }}</span></p>
                        @elseif ($nasabah->status_pendaftaran == 'Ditolak')
                        <p class="text-muted"><span class="badge badge-danger"><i class="fas fa-ban mr-1"></i> {{ $nasabah->status_pendaftaran }}</span></p>
                        @else
                        <p class="text-muted"><span class="badge badge-success"><i class="fas fa-check-double mr-1"></i> {{ $nasabah->status_pendaftaran }}</span></p>
                        @endif
                        <hr>

                        <strong><i class="fas fa-file-invoice-dollar mr-1"></i> Metode Bayar Pendaftaran</strong>
                        <p class="text-muted">{{ $nasabah->metode_bayar_pendaftaran }}</p>
                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> No. Telepone</strong>
                        <p class="text-muted">{{ $nasabah->no_telepone }}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{ $nasabah->alamat }}</p>
                        <hr>

                        <strong><i class="fas fa-image mr-1"></i> Foto {{ $nasabah->jenis_identitas }}</strong>
                        <p class="text-muted"><a href="{{ asset('storage/image/'.$nasabah->foto_identitas) }}" target="_blank">{{ $nasabah->no_identitas }} <i class="fas fa-eye ml-1"></i></a></p>
                        <hr>

                        <strong><i class="fas fa-image mr-1"></i> Foto KK (Kartu Keluarga)</strong>
                        <p class="text-muted"><a href="{{ asset('storage/image/'.$nasabah->foto_kk) }}" target="_blank">Foto KK (Kartu Keluarga) <i class="fas fa-eye ml-1"></i></a></p>
                        <hr>

                        <strong><i class="fas fa-image mr-1"></i> Bukti Bayar Pendaftaran</strong>
                        <p class="text-muted"><a href="{{ asset('storage/image/'.$nasabah->foto_kk) }}" target="_blank">{{ $nasabah->no_pendaftaran }} <i class="fas fa-eye ml-1"></i></a></p>
                        <hr>

                        <strong><i class="fas fa-image mr-1"></i> Foto Usaha</strong>
                        <p class="text-muted"><a href="{{ asset('storage/image/'.$nasabah->foto_usaha) }}" target="_blank">{{ $nasabah->jenis_usaha->nama_usaha }} <i class="fas fa-eye ml-1"></i></a></p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.nasabah.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Detail</li>
@endpush

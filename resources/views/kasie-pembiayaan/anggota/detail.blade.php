@extends('layouts.kasie_pembiayaan', ['title' => 'Detail Anggota','icon' => 'fas fa-address-book'])

@section('content')
<div class="row mb-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kasie-pembiayaan.anggota.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <strong><i class="fas fa-list-ol mr-1"></i> No. Pendaftaran</strong>
                        <p class="text-muted">{{ $anggota->no_pendaftaran }}</p>
                        <hr>

                        <strong><i class="fas fa-address-card mr-1"></i> No. Identitas</strong>
                        <p class="text-muted">
                            {{ $anggota->no_identitas }}
                            @if ($anggota->jenis_identitas == 'KTP')
                            <span class="badge badge-primary ml-1">{{ $anggota->jenis_identitas }}</span>
                            @else
                            <span class="badge badge-secondary ml-1">{{ $anggota->jenis_identitas }}</span>
                            @endif
                        </p>
                        <hr>

                        <strong><i class="fas fa-user-tie mr-1"></i> Nama Lengkap</strong>
                        <p class="text-muted">{{ $anggota->nama_lengkap }}</p>
                        <hr>

                        <strong><i class="fas fa-user mr-1"></i> Nama Ibu Kandung</strong>
                        <p class="text-muted">{{ $anggota->nama_ibu_kandung }}</p>
                        <hr>

                        <strong><i class="fas fa-house-user mr-1"></i> Majlis</strong>
                        <p class="text-muted">{{ $anggota->majlis->nama_majlis }}</p>
                        <hr>

                        <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
                        <p class="text-muted">{{ $anggota->jenis_kelamin }}</p>
                        <hr>

                        <strong><i class="fas fa-store mr-1"></i> Jenis Usaha</strong>
                        <p class="text-muted">{{ $anggota->jenis_usaha->nama_usaha }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status</strong>
                        @if ($anggota->is_aktif)
                        <p class="text-muted"><span class="badge badge-success"> Aktif</span></p>
                        @else
                        <p class="text-muted"><span class="badge badge-danger"> Tidak Aktif</span></p>
                        @endif
                        <hr>

                        <strong><i class="fas fa-building mr-1"></i> Kantor</strong>
                        <p class="text-muted">
                            @if ($anggota->kantor->is_pusat)
                                KP - {{ $anggota->kantor->nama_kantor }}
                            @else
                                KC - {{ $anggota->kantor->nama_kantor }}
                            @endif
                        </p>
                        <hr>

                        <strong><i class="fas fa-birthday-cake mr-1"></i> Tempat, Tanggal Lahir</strong>
                        <p class="text-muted">{{ $anggota->kota->nama_kota }}, {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                        <hr>

                        <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan Terakhir</strong>
                        <p class="text-muted">{{ $anggota->pendidikan_terakhir }}</p>
                        <hr>

                        @if($anggota->id_penginput != Auth::user()->id)
                        <strong><i class="fas fa-user-tie mr-1"></i> Penginput</strong>
                        <p class="text-muted">{{ $anggota->penginput->nama_lengkap }}</p>
                        <hr>
                        @endif

                        <strong><i class="fas fa-praying-hands mr-1"></i> Agama</strong>
                        <p class="text-muted">{{ $anggota->agama }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status Pernikahan</strong>
                        <p class="text-muted">{{ $anggota->status_pernikahan }}</p>
                        <hr>

                        <strong><i class="fas fa-info mr-1"></i> Status Pendaftaran</strong>
                        @if ($anggota->status_pendaftaran == 'Pending')
                        <p class="text-muted"><span class="badge badge-info"><i class="fas fa-spinner mr-1"></i> {{ $anggota->status_pendaftaran }}</span></p>
                        @elseif ($anggota->status_pendaftaran == 'Survei')
                        <p class="text-muted"><span class="badge badge-warning"><i class="fas fa-clock mr-1"></i> {{ $anggota->status_pendaftaran }}</span></p>
                        @elseif ($anggota->status_pendaftaran == 'Ditolak')
                        <p class="text-muted"><span class="badge badge-danger"><i class="fas fa-ban mr-1"></i> {{ $anggota->status_pendaftaran }}</span></p>
                        @else
                        <p class="text-muted"><span class="badge badge-success"><i class="fas fa-check-double mr-1"></i> {{ $anggota->status_pendaftaran }}</span></p>
                        @endif
                        <hr>

                        <strong><i class="fas fa-file-invoice-dollar mr-1"></i> Metode Bayar Pendaftaran</strong>
                        <p class="text-muted">{{ $anggota->metode_bayar_pendaftaran }}</p>
                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> No. Telepone</strong>
                        <p class="text-muted">{{ $anggota->no_telepone }}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{ $anggota->alamat }}</p>
                        <hr>

                        @if ($anggota->catatan_pendaftaran_ditolak->count() > 0)
                        <strong><i class="fas fa-file-alt mr-1"></i> Catatan Ditolak</strong>
                        <p class="text-muted">
                            @foreach ($anggota->catatan_pendaftaran_ditolak as $val_cpd)
                            <i><b>{{ \Carbon\Carbon::parse($val_cpd->tanggal_ditolak)->translatedFormat('d, M Y'); }} :</b><br>
                                {{ $val_cpd->isi_catatan }}
                            </i><br>
                            @endforeach
                        </p>
                        <hr>
                        @endif
                    </div>
                </div>
            </div>
            @if ($anggota->status_pendaftaran == 'Ditolak')
            <div class="card-footer">
                <a href="#" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-ttile">Foto-Foto</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <strong><i class="fas fa-image mr-1"></i> Foto {{ $anggota->jenis_identitas }}</strong>
                            <p class="text-muted"><a href="{{ asset('storage/image/'.$anggota->foto_identitas) }}" target="_blank">{{ $anggota->no_identitas }} <i class="fas fa-eye ml-1"></i></a></p>
                            <hr>

                            <strong><i class="fas fa-image mr-1"></i> Foto KK (Kartu Keluarga)</strong>
                            <p class="text-muted">
                                <a href="{{ asset('storage/image/'.$anggota->foto_kk) }}" target="_blank">Foto KK (Kartu Keluarga) <i class="fas fa-eye ml-1"></i></a>
                                <a href="javascript:void(0)" class="badge badge-success ml-2" data-toggle="modal" data-target="#ModalEditFotoKK"><i class="fas fa-pencil-alt"></i> Edit</a>
                            </p>
                            <hr>

                            <strong><i class="fas fa-image mr-1"></i> Bukti Bayar Pendaftaran</strong>
                            <p class="text-muted"><a href="{{ asset('storage/image/'.$anggota->foto_kk) }}" target="_blank">{{ $anggota->no_pendaftaran }} <i class="fas fa-eye ml-1"></i></a></p>
                            <hr>

                            <strong><i class="fas fa-image mr-1"></i> Foto Usaha</strong>
                            <p class="text-muted"><a href="{{ asset('storage/image/'.$anggota->foto_usaha) }}" target="_blank">{{ $anggota->jenis_usaha->nama_usaha }} <i class="fas fa-eye ml-1"></i></a></p>
                            <hr>
                    </div>
                </div>
            </div>
            @if ($anggota->status_pendaftaran == 'Ditolak')
            <div class="card-footer">
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-arrow-right mr-1"></i> Ajukan Ulang</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('kasie-pembiayaan.anggota.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Detail</li>
@endpush

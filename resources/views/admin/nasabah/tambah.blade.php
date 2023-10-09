@extends('layouts.admin', ['title' => 'Tambah Nasabah','icon' => 'fas fa-address-book'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.nasabah.index') }}" class="btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('admin.nasabah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ @old('nama_lengkap') }}" placeholder="Nama Lengkap..." autofocus>
                                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Nama Ibu Kandung -->
                            <div class="form-group">
                                <label>Nama Ibu Kandung <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" value="{{ @old('nama_ibu_kandung') }}" placeholder="Nama Ibu Kandung..." autofocus>
                                @error('nama_ibu_kandung')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- No. Identitas (KTP/SIM) -->
                            <div class="form-group">
                                <label>No. Identitas (KTP/SIM) <span class="text-danger">*</span></label>
                                <input type="text" name="no_identitas" class="form-control @error('no_identitas') is-invalid @enderror" value="{{ @old('no_identitas') }}" placeholder="No. Identitas..." autofocus>
                                @error('no_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Jenis Identitas -->
                            <div class="form-group">
                                <label class="form-label">Jenis Identitas <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input name="jenis_identitas" class="form-check-input" type="radio" value="KTP" id="KTP" @if(@old('jenis_identitas') == 'KTP') checked @endif checked />
                                    <label class="form-check-label" for="KTP"> KTP </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="jenis_identitas" class="form-check-input" type="radio" value="SIM" id="SIM" @if(@old('jenis_identitas') == 'SIM') checked @endif/>
                                    <label class="form-check-label" for="SIM"> SIM </label>
                                </div>
                                @error('jenis_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-danger">*</span></label>
                                <select name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="selectTempatLahir">
                                    <option value="">- pilih -</option>
                                    @foreach ($kota as $val_kota)
                                    <option value="{{ $val_kota->id }}" @if (@old('tempat_lahir') == $val_kota->id) selected @endif>{{ $val_kota->nama_kota }}</option>
                                    @endforeach
                                </select>
                                @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ @old('tanggal_lahir') }}" placeholder="Tanggal Lahir...">
                                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- No. Telepone -->
                            <div class="form-group">
                                <label>No. Telepone <span class="text-danger">*</span></label>
                                <input type="text" name="no_telepone" class="form-control @error('no_telepone') is-invalid @enderror" value="{{ @old('no_telepone') }}" placeholder="No. Telepone...">
                                @error('no_telepone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-Laki" id="Laki-Laki" @if(@old('jenis_kelamin') == 'Laki-Laki') checked @endif checked />
                                    <label class="form-check-label" for="Laki-Laki"> Laki-Laki </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="Perempuan" @if(@old('jenis_kelamin') == 'Perempuan') checked @endif/>
                                    <label class="form-check-label" for="Perempuan"> Perempuan </label>
                                </div>
                                @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Pendidikan Terakhir -->
                            <div class="form-group">
                                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="selectPendidikanTerakhir">
                                    <option value="">- pilih -</option>
                                    <option value="Tidak Bersekolah" @if (@old('pendidikan_terakhir') == 'Tidak Bersekolah') selected @endif>Tidak Bersekolah</option>
                                    <option value="SD" @if (@old('pendidikan_terakhir') == 'SD') selected @endif>SD (Sekolah Dasar)</option>
                                    <option value="SMP" @if (@old('pendidikan_terakhir') == 'SMP') selected @endif>SMP (Sekolah Menengah Pertama)</option>
                                    <option value="SMA" @if (@old('pendidikan_terakhir') == 'SMA') selected @endif>SMA (Sekolah Menengah Atas)</option>
                                    <option value="D3" @if (@old('pendidikan_terakhir') == 'D3') selected @endif>D3 (Diploma 3)</option>
                                    <option value="Sarjana 1" @if (@old('pendidikan_terakhir') == 'Sarjana 1') selected @endif>S1 (Sarjana 1)</option>
                                    <option value="Sarjana 2" @if (@old('pendidikan_terakhir') == 'Sarjana 2') selected @endif>S2 (Sarjana 2)</option>
                                    <option value="Sarjana 3" @if (@old('pendidikan_terakhir') == 'Sarjana 3') selected @endif>S3 (Sarjana 3)</option>
                                </select>
                                @error('pendidikan_terakhir')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Agama -->
                            <div class="form-group">
                                <label>Agama <span class="text-danger">*</span></label>
                                <select name="agama" class="form-control @error('agama') is-invalid @enderror" id="selectAgama">
                                    <option value="">- pilih -</option>
                                    <option value="Islam" @if (@old('agama') == 'Islam') selected @endif>Islam</option>
                                    <option value="Hindu" @if (@old('agama') == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Budha" @if (@old('agama') == 'Budha') selected @endif>Budha</option>
                                    <option value="Protestan" @if (@old('agama') == 'Protestan') selected @endif>Protestan</option>
                                    <option value="Katolik" @if (@old('agama') == 'Katolik') selected @endif>Katolik</option>
                                    <option value="Khonghucu" @if (@old('agama') == 'Khonghucu') selected @endif>Khonghucu</option>
                                </select>
                                @error('agama')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Status Pernikahan -->
                            <div class="form-group">
                                <label>Status Pernikahan <span class="text-danger">*</span></label>
                                <select name="status_pernikahan" class="form-control @error('status_pernikahan') is-invalid @enderror" id="selectStatusPernikahan">
                                    <option value="">- pilih -</option>
                                    <option value="Belum Menikah" @if (@old('status_pernikahan') == 'Belum Menikah') selected @endif>Belum Menikah</option>
                                    <option value="Nikah" @if (@old('status_pernikahan') == 'Nikah') selected @endif>Nikah</option>
                                    <option value="Cerai" @if (@old('status_pernikahan') == 'Cerai') selected @endif>Cerai</option>
                                    <option value="Janda/Duda" @if (@old('status_pernikahan') == 'Janda/Duda') selected @endif>Janda/Duda</option>
                                </select>
                                @error('status_pernikahan')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Majlis -->
                            <div class="form-group">
                                <label>Majlis <span class="text-danger">* </span> <a href="{{ route('admin.majlis.create') }}" target="_blank" class="badge badge-primary ml-2"><i class="fas fa-plus"></i> Tambah Majlis</a></label>
                                <select name="majlis" class="form-control @error('majlis') is-invalid @enderror" id="selectMajlis">
                                    <option value="">- pilih -</option>
                                    @foreach ($majlis as $val_majlis)
                                    <option value="{{ $val_majlis->id }}" @if (@old('majlis') == $val_majlis->id) selected @endif>{{ $val_majlis->nama_majlis }}</option>
                                    @endforeach
                                </select>
                                @error('majlis')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Jenis Usaha -->
                            <div class="form-group">
                                <label>Jenis Usaha <span class="text-danger">*</span></label>
                                <select name="jenis_usaha" class="form-control @error('jenis_usaha') is-invalid @enderror" id="selectJenisUsaha">
                                    <option value="">- pilih -</option>
                                    @foreach ($jenis_usaha as $val_jenis_usaha)
                                    <option value="{{ $val_jenis_usaha->id }}" @if (@old('jenis_usaha') == $val_jenis_usaha->id) selected @endif>{{ $val_jenis_usaha->nama_usaha }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_usaha')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Metode Bayar Pendaftaran -->
                            <div class="form-group">
                                <label class="form-label">Metode Bayar Pendaftaran <span class="text-danger">* <sup class="font-italic">Rp. 50.000</sup></span></label><br>
                                <div class="form-check form-check-inline">
                                    <input name="metode_bayar_pendaftaran" class="form-check-input" type="radio" value="Cash" id="Cash" @if(@old('metode_bayar_pendaftaran') == 'Cash') checked @endif checked />
                                    <label class="form-check-label" for="Cash"> Cash </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="metode_bayar_pendaftaran" class="form-check-input" type="radio" value="Transfer" id="Transfer" @if(@old('metode_bayar_pendaftaran') == 'Transfer') checked @endif/>
                                    <label class="form-check-label" for="Transfer"> Transfer </label>
                                </div>
                                @error('metode_bayar_pendaftaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="5" rows="5" placeholder="Alamat...">{{ @old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                    </div>

                    <!-- Password -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ @old('password') }}" placeholder="Password...">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Konfirmasi Password <span class="text-danger">*</span></label>
                                <input type="password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" value="{{ @old('konfirmasi_password') }}" placeholder="Konfirmasi Password...">
                                @error('konfirmasi_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Foto Identitas (KTP/SIM) -->
                    <div class="form-group">
                        <label>Foto Identitas (KTP/SIM) <span class="text-danger">*</span><br>
                            <sup class="text-danger font-italic">jpg, jpeg, png (max 1024kb)</sup>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="foto_identitas" class="custom-file-input @error('foto_identitas') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label label-foto-identitas" for="customFile">Choose file</label>
                            @error('foto_identitas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Foto KK (Kartu Keluarga) -->
                    <div class="form-group">
                        <label>Foto KK (Kartu Keluarga) <span class="text-danger">*</span><br>
                            <sup class="text-danger font-italic">jpg, jpeg, png (max 1024kb)</sup>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="foto_kk" class="custom-file-input @error('foto_kk') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label label-foto-kk" for="customFile">Choose file</label>
                            @error('foto_kk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Foto Usaha -->
                    <div class="form-group">
                        <label>Foto Usaha <span class="text-danger">*</span><br>
                            <sup class="text-danger font-italic">jpg, jpeg, png (max 1024kb)</sup>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="foto_usaha" class="custom-file-input @error('foto_usaha') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label label-foto-usaha" for="customFile">Choose file</label>
                            @error('foto_usaha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Bukti Bayar Pendaftaran -->
                    <div class="form-group">
                        <label>Bukti Bayar Pendaftaran <span class="text-danger">*</span><br>
                            <sup class="text-danger font-italic">jpg, jpeg, png (max 1024kb)</sup>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="bukti_bayar_pendaftaran" class="custom-file-input @error('bukti_bayar_pendaftaran') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label label-bukti-bayar-pendaftaran" for="customFile">Choose file</label>
                            @error('bukti_bayar_pendaftaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-block btn-primary shadow-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.nasabah.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endpush

@push('js')
<script>
$(document).ready(function (e) {
    $('input[name="foto_identitas"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.label-foto-identitas').html(fileName);
    });
    $('input[name="foto_kk"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.label-foto-kk').html(fileName);
    });
    $('input[name="foto_usaha"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.label-foto-usaha').html(fileName);
    });
    $('input[name="bukti_bayar_pendaftaran"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.label-bukti-bayar-pendaftaran').html(fileName);
    });
    $('#selectTempatLahir').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
    $('#selectMajlis').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
    $('#selectStatusPernikahan').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
    $('#selectAgama').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
    $('#selectPendidikanTerakhir').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
    $('#selectJenisUsaha').select2({
        theme: 'bootstrap4',
        // placeholder: '-Pilih-'
    })
});
</script>
@endpush

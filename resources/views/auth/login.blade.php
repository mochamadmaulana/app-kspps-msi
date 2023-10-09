@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<form action="{{ route('login.store') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ @old('nik') }}" autofocus placeholder="NIK..">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-address-card"></span>
            </div>
        </div>
        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password..">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt mr-2"></i> Login</button>
        </div>
    </div>
</form>
@endsection

@push('header')
<p class="login-box-msg">
    Login untuk masuk aplikasi <a href="javascript:void(0)" class="badge badge-warning" data-toggle="modal" data-target="#ModalInfo"><i class="fas fa-exclamation"></i> Akun</a>
</p>
@endpush

@push('modal')
<!-- Modal Info Akun -->
<div class="modal fade" id="ModalInfo" tabindex="-1" aria-labelledby="ModalInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalInfoLabel">Info Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre>
                    Admin Teluknaga :
                        NIK : MSI3001
                        PAS : password

                    Admin Pusat :
                        NIK : MSI1001
                        PAS : password
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endpush

@extends('layouts.app')
@section('title', 'Tambah Data User')
@section('pagetitle')
    <h1>Tambah Data User</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}"
                               placeholder="Full Name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                            <option value="" selected>Pilih jabatan user</option>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                        </select>
            
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-4">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirm password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
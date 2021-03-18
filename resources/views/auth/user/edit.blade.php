@extends('layouts.app')
@section('title', 'Edit User')
@section('pagetitle')
    <h1>Edit User</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{route('user.update',[$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}"
                               placeholder="Full Name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                            <option>{{ $user->level }}</option>                      
                            <option value="admin" @if($user->level == 'admin') @endif>Admin</option>
                            <option value="guru" @if($user->level == 'guru') @endif>Guru</option>
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

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
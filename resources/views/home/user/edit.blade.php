@extends('layouts.master')
@section('title','Table User')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data User</h3>
                            <a class="btn btn-warning" href="/user">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{$user->id}}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama User</label>
                                    <input 
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        value="{{ $user->name }}"
                                        placeholder="Masukkan nama pengguna">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input 
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        value="{{ $user->email }}"
                                        placeholder="Masukkan email pengguna">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input 
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        id="password"
                                        value="{{ $user->password }}"
                                        placeholder="Masukkan password">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

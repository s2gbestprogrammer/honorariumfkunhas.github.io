@extends('dashboard.app')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="row page-titles">

            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{auth()->user()->role}}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah User</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('users.store')}}" method="post">
                                @csrf

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  value="{{old('name')}}" name="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Golongan</label>
                                    <div class="col-sm-6">
                                        <select name="golongan" id="golongan" class="default-select form-control wide">
                                            <option value=""></option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="VI">VI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bagian</label>
                                    <div class="col-sm-6">
                                        <select name="division_id" id="division_id" class="default-select form-control wide">
                                            <option value=""></option>
                                            @foreach($divisions->skip(1) as $division)

                                            <option value="{{$division->id}}">{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Rekening</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value=""  name="rekening">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">BANK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  value=""  name="bank">
                                    </div>
                                </div>
                                @if(auth()->user()->role == "super-admin")
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-6">
                                        <select name="role" id="role" class="default-select form-control wide">
                                            <option value=""></option>
                                            <option value="admin">Admin</option>
                                            <option value="dosen">Dosen</option>
                                        </select>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" name="role" id="role" value="dosen">
                                @endif
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" value="" name="password">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


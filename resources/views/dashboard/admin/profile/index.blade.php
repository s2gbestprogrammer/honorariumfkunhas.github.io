@extends('dashboard.app')
@section('content')

<div class="content-body">
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        @if(session()->has('fail'))
        <div class="alert alert-fail" role="alert">
            {{session('fail')}}
        </div>
        @endif
    <div class="container-fluid">

        <div class="row page-titles">

            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{auth()->user()->role}}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('profile.update', auth()->user()->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama..." value="{{auth()->user()->name}}" name="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Golongan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Golonga.." value="{{auth()->user()->golongan}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bagian</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Bagian.." value="{{auth()->user()->division->name}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Username.." value="{{auth()->user()->username}}" readonly>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Update profile</button>
                                        <a href="{{route('profile.index')}}" class="btn btn-danger">Batal</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ganti password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('change.passwords')}}" method="post">
                                @csrf


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Username.." value="{{auth()->user()->username}}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Password baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password baru..">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Password baru..">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                        <a href="{{route('profile.index')}}" class="btn btn-danger">Batal</a>
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



{{-- {{auth()->user()->golongan}}
{{auth()->user()->bagian}} --}}

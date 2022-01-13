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

            <div class="col-xl-6 ">
                <div class="card">

                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('users.store')}}" method="post">
                                @csrf

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control can-delete"  value="{{old('name')}}" name="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Golongan</label>
                                    <div class="col-sm-6">
                                        <select name="golongan" id="golongan" class="default-select form-control wide can-deletes">
                                            <option value=""></option>
                                            <option value="I" >I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bagian</label>
                                    <div class="col-sm-6">
                                        <select name="division_id" id="division_id" class="default-select form-control wide can-deletes" >
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
                                        <input type="text" class="form-control can-delete" value=""  name="rekening">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">BANK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control can-delete"  value=""  name="bank">
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
                                        <input type="text" class="form-control @error('username')
                                        is-invalid
                                    @enderror" name="username">
                                    @error('username')
                                    <p class="fs-11">{{$message}}</p>
                                @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password">
                                        @error('password')
                                            <p class="fs-11">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <button class="btn btn-primary light btn-sl-sm" id="discard" type="submit"><span class="me-2"><i class="fa fa-save"></i></span>Simpan</button>
                                </div>

                                <div class="mb-3 row">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-danger light btn-sl-sm" id="discard" type="a"><span class="me-2"><i class="fa fa-times"></i></span>Batalkan</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
            $('.btn-danger').click(function(){
                $('.form-control').val('');
                $(".can-deletes").find('select').select2().val('').trigger('change');
            });


        });
</script>
@endsection


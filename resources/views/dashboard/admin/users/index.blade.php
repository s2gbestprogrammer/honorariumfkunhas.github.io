@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
<div class="col-12">
    <div class="ms-3 mb-3">

        <a href="{{route('users.create')}}" class="btn btn-primary"><b> + Tambah Dosen</b></a>

    </div>
    <div class="card">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="card-header">
            <h4 class="card-title">Profile Datatable</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Golongan</th>
                            <th>Bagian</th>
                            <th>Rekening</th>
                            <th>Bank</th>

                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 0; ?>
                        @foreach($users as $user)
                        {{-- < kondisi untuk menghilangkan superadmin   --}}
                        <?php
                        if($user->role == "super-admin" || $user->role == "admin"){
                          $hidden = "hidden";

                        } else {
                            $hidden = "";
                        }
                        ?>
                        <tr {{$hidden}}>

                            <td>{{$user->name}}</td>
                            <td>{{$user->golongan}}</td>
                            <td>{{$user->division->name}}</td>
                            <td>{{$user->rekening}}</td>
                            <td>{{$user->bank}}</td>
                            <td>{{$user->created_at}}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger shadow btn-xs sharp me-1 border-0" onclick="return confirm('are u sure?')"><i class="fas fa-trash"></i></button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection

<script>


</script>

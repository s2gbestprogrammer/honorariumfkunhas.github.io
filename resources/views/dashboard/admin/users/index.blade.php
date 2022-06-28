@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="ms-3 mb-3">
                    <a href="{{route('users.create')}}" class="btn btn-primary"><b> <i class="fas fa-user-plus"></i>  &nbsp; Dosen </b></a>
                </div>
                <div class="card">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>

                    <div class="card-body">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import Data Dosen
                        </button>

                        <br><br>


                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Golongan</th>
                                        <th>Fungsional</th>
                                        <th>Bagian</th>
                                        <th>Rekening</th>
                                        <th>Bank</th>

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
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->golongan}}</td>
                                        <td>{{ $user->fungsional }}</td>
                                        <td>{{$user->division_id}}</td>
                                        <td>{{$user->rekening}}</td>
                                        <td>{{$user->bank}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger shadow btn-xs sharp me-1 border-0" onclick="return confirm('Jika anda menghapus ini maka seluruh data honornya akan terhapus, Apakah anda yakin menghapus ini?')"><i class="fas fa-trash"></i></button>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Dosen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('importdatadosen')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
            <b class="text-primary"><a href="{{asset('datadosen.xlsx')}}">Download Format Excel</a></b>
            </div>

            <div class="form-group">
                <label for="">Import Data Dosen</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </form>
        </div>
      </div>
    </div>
  </div>


    @endsection

<script>


</script>

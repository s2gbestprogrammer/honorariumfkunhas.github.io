@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Profile Datatable</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Gender</th>
                            <th>Education</th>
                            <th>Mobile</th>
                            <th>Email</th>
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
                        <tr>
                            <td><img class="rounded-circle" width="35" src="/images/profile/small/pic1.jpg" alt=""></td>
                            <td>Tiger Nixon</td>
                            <td>Architect</td>
                            <td>Male</td>
                            <td>M.COM., P.H.D.</td>
                            <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                            <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                            <td>2011/04/25</td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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


  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif


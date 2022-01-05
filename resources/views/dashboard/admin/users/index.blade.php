  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif
  <a href="{{route('users.create')}}" class="btn btn-primary">tambah user</a>
  <table cellspacing="20px">

      <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Username</td>
          <td>role</td>

      </tr>
      @foreach($users as $user)

      {{-- < kondisi untuk menghilangkan superadmin   --}}
      <?php
      if($user->role == "super-admin"){
        $hidden = "hidden";
      } else {
          $hidden = "";
      }
      ?>
      {{-- kondisi untuk menghilangkan superadmin >  --}}

      <tr {{$hidden}}>
          <td>{{$loop->iteration - 1}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->role}}</td>
      </tr>
      @endforeach
  </table>

  <a href="/dashboard/admin" class="btn btn-primary">kembali ke home</a>

  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif

  <table cellspacing="20px" border="1px">

      <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Username</td>
          <td>Golongan</td>
          <td>Bagian</td>
          <td>rekening</td>
          <td>bank</td>
          <td>role</td>
          <td>Aksi</td>

      </tr>
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
      {{-- kondisi untuk menghilangkan superadmin >  --}}

      <tr {{$hidden}}>
          <td>{{$nomor++ - 1}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->golongan}}</td>
          <td>{{$user->division_id}}</td>
          <td>{{$user->rekening}}</td>
          <td>{{$user->bank}}</td>
          <td>{{$user->role}}</td>
          <td>
              <a href="{{route('users.edit', $user->id)}}">Beri honor</a>
              <form action="{{route('users.destroy', $user->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button>Delete</button>
              </form>
          </td>
      </tr>

      @endforeach
  </table>

  <a href="/dashboard/admin" class="btn btn-primary">kembali ke home</a>

  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif
  <a href="{{route('honor.create')}}" class="btn btn-primary">tambah honor</a>
  <table cellspacing="20px" border="1px">

      <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Golongan</td>
          <td>Bagian</td>
          <td>Jumlah honor</td>
          <td>Potongan</td>
          <td>Jumlah Diterima</td>
          <td>Keterangan</td>
          <td>role</td>
          <td>Aksi</td>

      </tr>
      <?php $nomor = 0; ?>
      @foreach($honors as $user)
      {{-- < kondisi untuk menghilangkan superadmin   --}}
      <?php
      ?>
      {{-- kondisi untuk menghilangkan superadmin >  --}}

      <tr {{$hidden}}>
          <td>{{$nomor++ - 1}}</td>
          <td>{{$honor->user->name}}</td>
          <td>{{$honor->user->golongan}}</td>
          <td>{{$honor->user->division->name}}</td>
          <td>{{$honor->jumlah_honor}}</td>
          <td>{{$honor->potongan}}</td>
          <td>{{$honor->jumlah_diterima}}</td>
          <td>{{$honor->keterangan}}</td>
          <td>{{$honor->user->role}}</td>
          <td>
              <a href="">edit</a>
              <a href=""> detail </a>
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

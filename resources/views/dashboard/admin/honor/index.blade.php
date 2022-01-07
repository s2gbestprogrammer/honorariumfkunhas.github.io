<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <div class="content">
        @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif
  <a href="{{route('honor.create')}}" class="btn btn-primary">tambah honor</a>
  <table class="table">

      <tr>
          <td>No</td>
          <td>Tanggal</td>
          <td>Nama</td>
          <td>Jumlah honor</td>
          <td>Potongan</td>
          <td>Jumlah Diterima</td>
          <td>Keterangan</td>
          <td>REKENING</td>
          <td>BANK</td>
          <td>Aksi</td>

      </tr>
      <?php $nomor = 1; ?>
      @foreach($honors as $honor)
      {{-- < kondisi untuk menghilangkan superadmin   --}}
      <?php
      ?>
      {{-- kondisi untuk menghilangkan superadmin >  --}}

      <tr>
          <td>{{$nomor++}}</td>
          <td>{{$honor->created_at}}</td>
          <td>{{$honor->user->name}}</td>
          <td>{{$honor->jumlah_honor}}</td>
          <td>{{$honor->potongan}}</td>
          <td>{{$honor->jumlah_diterima}}</td>
          <td>{{$honor->category->name}}</td>
          <td>{{$honor->user->rekening}}</td>
          <td>{{$honor->user->bank}}</td>
          <td>
              <a href="">edit</a>
              <a href="{{route('honor.show', $honor->user->id)}}"> detail </a>
              <form action="{{route('honor.destroy', $honor->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button>Delete</button>
              </form>
          </td>
      </tr>

      @endforeach
  </table>

  <a href="/dashboard/admin" class="btn btn-primary">kembali ke home</a>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>



@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">

<div class="col-12">
    <div class="ms-3 mb-3">

        <a href="{{route('honor.index')}}" class="btn btn-primary"><b> + Tambah Honor</b></a>

    </div>
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Data honor</h4>
        </div>

        <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success m-3" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
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
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        @foreach($honors as $honor)

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
                                <div class="d-flex">
                                    <a href="{{route('honor.show',$honor->user->id)}}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                    <form action="{{route('honor.destroy', $honor->id)}}" method="post" class="d-inline">
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




@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">

<div class="col-12">
    <div class="ms-3 mb-3 d-inline">

        <a href="{{route('honor.index')}}" class="btn btn-primary"><b> + TAMBAH HONOR   </b></a>

    </div>
    <div class="ms-3 mb-3 d-inline">

        <a href="{{route('print.honor')}}" class="btn btn-primary"><b> <i class="fas fa-print"></i> PRINT </b></a>

    </div>
    <div class="card mt-3">

        <div class="card-header">
            <h4 class="card-title"> <b>Data honor</b></h4>
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
                            <td>Aksi</td>
                            <td>Nama</td>
                            <td>Jumlah Kotor</td>
                            <td>Potongan</td>
                            <td>Jumlah Bersih</td>
                            <td>Kategori</td>
                            <td>REKENING</td>
                            <td>BANK</td>
                            <td>Bulan</td>
                            <td>Keterangan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        @foreach($honors as $honor)


                        <tr>


                            <td>{{$nomor++}}</td>
                            <td>
                                <div class="d-flex">
                                <a href="{{route('honor.show',$honor->user->id)}}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                <form action="{{route('honor.destroy', $honor->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger shadow btn-xs sharp me-1 border-0" onclick="return confirm('are u sure?')"><i class="fas fa-trash"></i></button>

                                </form>

                            </div></td>
                            <td>{{$honor->user->name}}</td>
                            <td>{{number_format($honor->jumlah_kotor)}}</td>
                            <td>{{number_format($honor->potongan)}}</td>
                            <td>{{number_format($honor->jumlah_bersih)}}</td>
                            <td>{{$honor->category->name}}</td>

                            <td>{{$honor->user->rekening}}</td>
                            <td>{{$honor->user->bank}}</td>


                            <td>
                                {{$honor->created_at->format('M/y')}}
                            </td>
                            <td>{{ $honor->keterangan }}</td>
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


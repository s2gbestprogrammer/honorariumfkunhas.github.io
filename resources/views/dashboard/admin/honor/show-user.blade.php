

@extends('dashboard.app')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Honor <b>{{$users->name}}</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah honor</th>
                                        <th>Potongan</th>
                                        <th>Jumlah Diterima</th>
                                        <th>Keterangan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($honors as $honor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$honor->created_at->format('M/d/Y')}}</td>
                                        <td>{{number_format($honor->jumlah_honor)}}</td>
                                        <td>{{$honor->potongan}}</td>
                                        <td>{{number_format($honor->jumlah_diterima)}}</td>
                                        <td>{{$honor->category->name}}</td>

                                    </tr>
                                    @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

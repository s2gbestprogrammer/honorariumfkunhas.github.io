@extends('dashboard.app')
@section('content')


<div class="content-body">

    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card tryal-gradient">
                <div class="card-body tryal row">
                    <div class="col-xl-7 col-sm-6">
                        <h2>Selamat datang {{auth()->user()->name}}</h2>

                        @if (!$users[0]->honor->isEmpty())

                        <h4 class="text-white">Anda baru saja mendapatkan honor sebesar Rp.{{number_format($honor->jumlah_honor)}}</h4>
                        @endif
                    </div>

                </div>
            </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header" >Total pendapatan</div>
                    <div class="card-body">
                        {{'Rp. '. number_format($sum_honor)}}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Balasan feedback</div>
                    <div class="card-body">
                        @foreach ($feedback as $f)
                        @if ($f->balasan !== '')

                        <b>{{$f->title}}</b> <br>
                        {{$f->body}} <br><hr>
                        @else
                        <p>belum ada balasan dari admin</p>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

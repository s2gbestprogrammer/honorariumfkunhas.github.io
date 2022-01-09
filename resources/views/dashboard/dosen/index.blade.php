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
        </div>
    </div>
</div>
@endsection

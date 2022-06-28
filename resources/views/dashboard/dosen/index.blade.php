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

                        <h4 class="text-white">Anda baru saja mendapatkan honor sebesar Rp.{{number_format($honor->jumlah_bersih)}}</h4>
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

{{-- <div class="card">
    <div class="card-header"><h3><b>Feedback</b></h3></div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example3" class="display" style="min-width: 845px">

                <tbody>

                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <form action="{{route('adminfeedback.update', $feedback->id)}}" method="post">
                            @csrf
                            @method('put')
                        <td>
                        <div class="email-list mt-3">
                        <div class="message">
                            <div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#sendmodal"
                                data-created_at="{{$feedback->created_at}}"
                                data-id="{{$feedback->id}}"
                                data-name="{{$feedback->user->name}}"
                                data-title="{{$feedback->title}}"
                                data-body="{{$feedback->body}}"
                                data-balasan="{{$feedback->balasan}}"
                                 class="col-mail fs-15">
                                    <div class="subject"> <b class="text-black">{{$feedback->user->name}}.</b> {{$feedback->title}} , {{$feedback->body}} <br><b class="text-black">{{$feedback->created_at}}</b></div>
                                </a>
                            </div>
                        </div>
                        </div>
                        </td>


                    </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

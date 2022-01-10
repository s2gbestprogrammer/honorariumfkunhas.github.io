@extends('dashboard.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3>Print</h3></div>
                    <div class="card-body">

                        <div class="mb-3">
                            <div class="col-sm-6">
                                <form action="{{route('print.searchByDate')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="">From</label>
                                        <input type="date" class="form-control" value="" name="from">
                                    </div>
                                    <div class="mb-3">
                                        <label class="">To</label>
                                        <input type="date" class="form-control" value="" name="to">
                                    </div>
                                    <button class="btn btn-primary" type="submit">FILTER BY DATE</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

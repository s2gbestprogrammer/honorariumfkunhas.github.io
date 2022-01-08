@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

@extends('dashboard.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
<div class="col-12">
    <div class="ms-3 mb-3">

        <a href="{{route('categories.create')}}" class="btn btn-primary"><b> + Tambah Kategori</b></a>

    </div>
    <div class="card">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="card-header">
            <h4 class="card-title">Profile Datatable</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 0; ?>
                        @foreach($categories as $category)

                        <tr>

                            <td>{{$category->name}}</td>
                            <td>Type</td>


                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route('users.destroy', $category->id)}}" method="post" class="d-inline">
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


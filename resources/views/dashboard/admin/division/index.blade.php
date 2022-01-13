@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

@extends('dashboard.app')
@section('content')
<div class="content-body">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="container-fluid">
        <div class="col-12">
            <div class="ms-3 mb-3">
                <a href="#" class="btn btn-primary" data-bs-target="#modal-create" data-bs-toggle="modal"><b> + Tambah Bagian</b></a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">Daftar Divisi</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>

                                    <th>Name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 0; ?>
                                @foreach($divisions->skip(1) as $division)

                                <tr>

                                    <td>{{$division->name}}</td>


                                    <td>
                                        <div class="d-flex">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id="{{$division->id}}" data-name="{{$division->name}}" class="btn btn-primary shadow btn-xs sharp me-1 editdivisi"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{route('users.destroy', $division->id)}}" method="post" class="d-inline">
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add divisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" id="modalpay">
            <form action="{{route('divisions.store')}}" method="post">
            @csrf
            <input type="text" value="" class="form-control" id="name" name="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Divisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" id="modalpay">
            <form action="{{route('edit.division')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="id-edit">
            <input type="text" value="" class="form-control" id="name-edit" name="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
     $(document).ready(function(){
            $('.editdivisi').click(function(){
                var category_id = $(this).data('id');
                var category_name = $(this).data('name');

                $.ajax({
                    success: function(response) {
                        $('#id-edit').val(category_id);
                        $('#name-edit').val(category_name);
                    }
                });
            });
        });
</script>
@endsection


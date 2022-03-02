

@extends('dashboard.app')
@section('content')
<div class="content-body">
    @if(session()->has('success'))
<div class="alert alert-success m-3" role="alert">
    {{session('success')}}
</div>
@endif
    <div class="container-fluid">
<div class="col-12">
    <div class="ms-3 mb-3">

        <a href="#" id="btn-create" data-bs-target="#modal-create" data-bs-toggle="modal" class="btn btn-primary"><b> + TAMBAH KATEGORI</b></a>

    </div>
    <div class="card">



        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>

                            <th>NAMA KATEGORI / KETERANGAN</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 0; ?>
                        @foreach($categories as $category)

                        <tr>

                            <td>{{$category->name}}</td>



                            <td>
                                <div class="d-flex">
                                <a href="#" data-bs-target=".bd-example-modal-lg" data-bs-toggle="modal" data-id="{{$category->id}}" data-name="{{$category->name}}" class="btn btn-primary shadow btn-xs sharp me-1 editcategory"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="post" class="d-inline">
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="payModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" id="modalpay">
            <form action="{{route('edit.category')}}" method="post">
            @csrf
            <input type="hidden" value="" class="form-control" id="id" name="id">
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" id="modalpay">
            <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Nama Kategori</label>
                <input type="text" value="" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3 col-6">
                <label for="">Type Kategori</label>
                <select name="type" id="type" class="default-select form-control wide">
                    <option value=""></option>
                    <option value="semester">semester</option>
                    <option value="bulan">bulan</option>
                    <option value="kegiatan">kegiatan</option>
                    <option value="tertentu">tertentu</option>
                </select>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<form action="{{route('categories.store')}}"></form>
<script>
    $(document).ready(function(){
            $('.editcategory').click(function(){
                var category_id = $(this).data('id');
                var category_name = $(this).data('name');

                $.ajax({
                    success: function(response) {
                        $('#payModal').modal('show');
                        $('#id').val(category_id);
                        $('#name').val(category_name);
                    }
                });
            });
        });
</script>


@endsection


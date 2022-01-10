

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

        <a href="{{route('categories.create')}}" class="btn btn-primary"><b> + Tambah Kategori</b></a>

    </div>
    <div class="card">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif


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
                <h5 class="modal-title">Beri Honor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" id="modalpay">

            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form> --}}
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
                        $('.modal-body').html(`<form  action = "{{route('edit.category')}}" method="post">
                        @csrf

                        <div class="mb-3">
                        <label for="id">Nama Keterangan :</label>
                        <input type="hidden" class="form-control" name="id" value="`+category_id+`">
                        <input type="text" class="form-control" name="name" value="`+category_name+`">
                        </div>
                        <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>`);
                        // $('.modal-body').html(`<form action="{{route("categories.store",`+category_id+`)}}" method="post">@csrf<div class="modal-body"><div class="mb-3"><label for="id">ID :</label><input type="text" class="form-control" name="id"> </div><div class="mb-3"> <label for="id">Nama Category :</label> <input type="text" class="form-control" name="name"></div></div>`);
                    }
                });
            });


        });
</script>


@endsection


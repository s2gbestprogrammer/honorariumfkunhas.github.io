

@extends('dashboard.app')

@section('content')
<div class="content-body">
    
@if ($errors->any())
<div class="alert alert-danger m-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success m-3" role="alert">
    {{session('success')}}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger m-3" role="alert">
    {{session('error')}}
</div>
@endif
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
                                        <th>Tanggal Ke Bank</th>
                                        <th>Jumlah kotor</th>
                                        <th>Potongan</th>
                                        <th>Jumlah Bersih</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($honors as $honor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @php
                                                $data = date_create($honor->tanggal_bank);
                                                echo date_format($data, "d-m-Y");
                                            @endphp
                                        </td>
                                        <td>{{number_format($honor->jumlah_kotor)}}</td>
                                        <td>{{number_format($honor->potongan)}}</td>
                                        <td>{{number_format($honor->jumlah_bersih)}}</td>
                                        <td>{{$honor->keterangan}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" id="edtButton" class="btn btn-warning shadow btn-xs sharp me-1 edtButton"
                                                data-id="{{ $honor->id }}"
                                                data-tgl_bank="{{ $honor->tanggal_bank }}"
                                                data-jumlah_kotor="{{ $honor->jumlah_kotor }}"
                                                data-potongan="{{ $honor->potongan }}"
                                                data-jumlah_bersih="{{ $honor->jumlah_bersih }}"
                                                data-category_name="{{ $honor->category->name }}"
                                                data-category_id="{{ $honor->category->id }}"
                                                data-keterangan = "{{ $honor->keterangan }}"
                                                ><i class="fas fa-edit"></i></a>
                                                <form action="{{route('honor.destroy', $honor->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger shadow btn-xs sharp me-1 border-0" onclick="return confirm('are u sure?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>

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


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edtModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Detail Honor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{route('honor.update', 000)}}" method="post">
                @method('PUT')
                @csrf
              <div class="modal-body">
                <div class="mb-3" hidden>
                    <input type="text" class="form-control" id="honor_id" name="id">
                </div>

                <div class="mb-3">
                    <label for="tanggal_bank">Tanggal Ke Bank</label>
                    <input type="date" name="tanggal_bank" class="form-control" id="tanggal_bank">
                </div>

                <div class="mb-3">
                    <label for="jumlah_kotor">Jumlah Kotor</label>
                    <input type="number" name="jumlah_kotor" class="form-control" id="jumlah_kotor">
                </div>

                <div class="mb-3">
                    <label for="potongan">Potongan pajak</label>
                    <input type="number" name="potongan" id="potongan" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="jumlah_bersih">Jumlah Bersih</label>
                    <input type="number" name="jumlah_bersih" id="jumlah_bersih" class="form-control" readonly>
                </div>

                
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                </div>



                <div class="mb-3" id="category_div">
                    
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

<script>
     $(document).ready(function(){
            $('.edtButton').click(function(){

                $('#edtModal').modal('show')
                var id = $(this).data('id');
                var tanggal_bank = $(this).data('tgl_bank');
                var jumlah_kotor = $(this).data('jumlah_kotor')

                var potongan = $(this).data('potongan')
                var jumlah_bersih = $(this).data('jumlah_bersih')
                var category_id = $(this).data('category_id')
                var category_name = $(this).data('category_name')
                var keterangan = $(this).data('keterangan')
                

                $('#honor_id').val(id)

                $('#tanggal_bank').val(tanggal_bank)
                $('#jumlah_kotor').val(jumlah_kotor)
                $('#potongan').val(potongan)
                $('#jumlah_bersih').val(jumlah_bersih)
                $('#keterangan').html(keterangan)
                

                $('#category_div').html(`
                <label>Kategori</label>
                <select name="category_id" id="category" class="default-select form-control mb-2">
                    <option  value="`+category_id+`" >`+category_name+`</option>
                     @foreach ($categories as $category)
                     <option  value="{{$category->id}}" >{{$category->name}}</option>
                     @endforeach
                    </select>`)
                });

        });
</script>
@endsection



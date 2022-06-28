@extends('dashboard.app')
@section('content')
 <div class="content-body">
    @error('jumlah_honor')
    <div class="alert alert-danger m-3" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('category_id')
    <div class="alert alert-danger m-3" role="alert">
        {{$message}}
    </div>
    @enderror
        <!-- row -->
        <div class="container-fluid">
          <div
            class="d-flex justify-content-between align-items-center flex-wrap">
            <form action="/dashboard/admin/honor">
            <div class="input-group contacts-search mb-4">
              <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search here..."
                value="{{request('search')}}"
              />
              <span class="input-group-text"
                ><a href="javascript:void(0)"
                  ><button type="submit" class="btn border-0"><i class="flaticon-381-search-2"></i></button></a
              ></span>
            </div>


            </form>
            <div class="mb-4">
                <a
                  href="{{route('honor.index')}}"
                  class="btn btn-success btn-md"
                  ></i>Tampilkan Semua</a
                >
            </div>
            <div class="mb-4">
                <a
                  href="{{route('honor.create')}}"
                  class="btn btn-primary btn-md"
                  ><i class="fas fa-list"></i> Honor</a
                >
            </div>

            {{-- <div class="input-group contacts-search mb-4">
                <a href="{{route('honor.create')}}"
                  type="text"
                  class="btn btn-primary"
                  placeholder="Search here..."
                >Lihat daftar honor </a>
              </div> --}}
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                  @foreach ($users as $user)
                    @php

                        if($user->role == "super-admin" || $user->role == "admin") {
                            $hidden = "hidden";
                        } else {
                            $hidden = "";
                        }
                    @endphp
                  <div {{$hidden}}
                    class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items"
                  >
                    <div class="card contact-bx item-content">
                      <div class="card-header border-0">
                        <div class="action-dropdown">
                          <div class="dropdown">
                            <div class="btn-link" data-bs-toggle="dropdown">
                              <svg
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body user-profile">
                        {{-- <div class="image-bx">
                          <img
                            src="/images/pic3.jpg"
                            data-src="images/contacts/Untitled-3.jpg"
                            alt=""
                            class="rounded-circle"
                          />
                          <span class="active"></span>
                        </div> --}}
                        <div class="media-body user-meta-info">
                          <h6 class="fs-18 font-w600 my-1">
                            <a
                              href="#"
                              class="text-black user-name"
                              data-name="Alan Green"
                              >{{$user->name}}</a
                            >
                          </h6>
                          <p
                            class="fs-14 mb-3 user-work"
                            data-occupation="UI Designer"
                          >
                           Bagian : {{$user->division_id}}
                          </p>
                          <p
                          class="fs-14 mb-3 user-work"
                          data-occupation="UI Designer"
                        >
                         Fungsional : {{$user->fungsional}}
                        </p>
                          <p
                            class="fs-14 mb-3 user-work"
                            data-occupation="UI Designer"
                          >

                            Golongan : {{$user->golongan}}


                           <?php
                            $gos = $user->honor->first();
                          $total_honor = $user->honor->sum('jumlah_bersih');
                            $sekarang = now()->format('M/Y');
                          ?>

                          <p class="fs-12">Total honor : Rp.{{number_format($total_honor)}}</p>
                            @if ($gos !== null)
                            @php
                                $honor_now = $gos->created_at->format('M/Y');

                            @endphp

                            @if ($sekarang == $honor_now)
                            @php
                                $hidden = "hidden";
                            @endphp

                            <p class="fs-12 fw-bold">  Honor terbaru bulan ini : {{'Rp.'.number_format($gos->jumlah_bersih)}}</b> </p>
                            @else
                            @php
                                $hidden = "";
                            @endphp
                            @endif
                            @endif


                            <p class="fs-12 text-danger" {{$hidden}}>Belum mendapatkan honor bulan ini</p>

                          <ul>

                            <li>
                              <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm" data-name="{{ $user->name }}" data-id="{{$user->id}}" data-golongan="{{$user->golongan}}" data-rek="{{$user->rekening}}" data-bank="{{$user->bank}}" class="payhonor"
                                ><i class="fas fa-donate"></i></a>
                            </li>
                            <li>
                                <a href="{{route('honor.show', $user->id)}}"><i class="fas fa-eye"></i></a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>

                {{$users->links('pagination::bootstrap-4')}}
          </div>
        </div>
      </div>


      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="payModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titlePayModal">Beri Honor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('honor.store')}}" method="post">
                    @csrf
                  <div class="modal-body">
                  
                  <div class="mb-3">
                    <select name="category_id" id="category_id" class="default-select form-control mb-2">
                      <option value="">PILIH KATEGORI</option>
                     @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                    </select>
                  </div>

                  <div class="mb-3" hidden>
                    <input type="text" name="user_id" class="form-control" placeholder="user_id" id="user_id">
                  </div>


                  <div class="mb-2 ms-3">
                    <b>Jumlah Honor</b>
                  </div>
                  <div class="mb-3">
                    <input type="number" name="jumlah_kotor" class="form-control" placeholder="Jumlah Kotor ...">
                  </div>

                  <div class="mb-3">
                    <input type="number" name="potongan" class="form-control" placeholder="Potongan Pajak...">
                  </div>

                  <div class="mb-2 ms-3">
                    <b>Keterangan</b>
                  </div>
                  <div class="mb-3">
                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" placeholder="Keterangan ..."></textarea>
                  </div>

                  <div class="mb-2 ms-3">
                    <b>Tanggal Ke Bank</b>
                  </div>
                  <div class="mb-3 col-sm-4">
                    <input type="date" name="tanggal_bank" id="tanggal_bank" class="form-control">
                  </div>

                  <div class="mb-2 ms-3">
                    <p> <b>Nomor Rekening :</b>  <b id="rekening"></b>, <b id="bank"></b></p>
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
            $('.payhonor').click(function(){
                var userid = $(this).data('id');
                var name = $(this).data('name');
                var golongan = $(this).data('golongan');
                var rekening = $(this).data('rek');
                var bank = $(this).data('bank');
                

                $('#user_id').val(userid)
                $('#rekening').html(rekening)
                $('#bank').html(bank)

                $('#titlePayModal').html('Beri Honor <b>'+name+'</b>')



                



                $('#payModal').modal('show');
                
            });
        });
    </script>

@endsection



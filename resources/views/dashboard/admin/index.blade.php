@extends('dashboard.app')

@section('content')
	<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                        <div class="card tryal-gradient">
                        <div class="card-body tryal row">
                            <div class="col-xl-7 col-sm-6">
                                <h2>Selamat datang {{auth()->user()->name}}</h2>

                            </div>

                        </div>
                    </div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection


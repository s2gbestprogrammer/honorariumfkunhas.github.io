@extends('dashboard.app')
@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Email</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Compose</a></li>
            </ol>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" ms-0 ms-sm-4 ms-sm-0">
                            <div class="compose-content">
                                <form action="{{route('feedback.store')}}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" class="form-control bg-transparent" placeholder=" To:" name="kepada">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control bg-transparent" placeholder=" Subject:" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="email-compose-editor" name="body" class="textarea_editor form-control bg-transparent" rows="15" placeholder="Enter text ..."></textarea>
                                    </div>

                            </div>
                            <div class="text-start mt-4 mb-3">
                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                            </form>
                                <button class="btn btn-danger light btn-sl-sm" id="discard" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>

    $(document).ready(function(){
            $('.btn-danger').click(function(){
                $('.form-control').val('');
            });


        });
</script>
@endsection



@extends('dashboard.app')

@section('content')
    <div class="content-body">
        @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="sendmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Feed back</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <script>
          $(document).ready(function(){
            $('.col-mail').click(function(){
                var id = $(this).data('id');
                var created_at = $(this).data('created_at');
                var title = $(this).data('title');
                var name = $(this).data('name');
                var body = $(this).data('body');
                var balasan = $(this).data('balasan');
                $.ajax({
                    success: function(response) {
                        $('.modal-body').html(` `+created_at+` <br>
                        Subject : `+title+` <br><br>
                        <p> `+body+` </p> <hr> <form action="<?= route('adminfeedback.store') ?>" method="post">
                        @csrf
                            <input type="hidden" value="`+id+`" name="id">
                        <textarea  name="balasan" id="write-email" cols="30" rows="5" class="form-control" placeholder="It's really an amazing.I want to know more about it..!" style="height: 137px;">`+balasan+`</textarea>
                        <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fs fs-send"></i>Send</button>
                </div>
            </form>`

                        );
                    }
                });
            });
        });
    </script>
@endsection







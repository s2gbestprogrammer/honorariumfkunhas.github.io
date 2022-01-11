@extends('dashboard.app')

@section('content')
    <div class="content-body">
        @if (session()->has('success'))
            {{session('success')}}
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3>Feedback</h3></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Balasan</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($feedbacks as $feedback)
                                        <tr>
                                            <form action="{{route('adminfeedback.update', $feedback->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                            <td>{{$feedback->user->name}}</td>
                                            <td>{{$feedback->title}}</td>
                                            <td><textarea name="body" id="body" cols="30" rows="10" class="form-control" style="height: 150px">{{$feedback->body}}</textarea></td>
                                            <td>
                                                <textarea name="balasan[{{$feedback->id}}]" id="balasan" cols="30" style="height: 150px" rows="10" class="form-control">{{$feedback->balasan}}</textarea>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary" >send</button>
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
@endsection







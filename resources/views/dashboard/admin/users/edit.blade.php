@extends('dashboard.app')
@section('content')

<div class="content-body">
    <div class="container-fluid">

        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="row page-titles">

            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{auth()->user()->role}}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-xl-8 ">
                <div class="card">

                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('users.update', $user->id)}}" method="post">
                                @csrf
                                @method('put')

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Golongan</label>
                                    <div class="col-sm-6">
                                        @php

                                        @endphp
                                        <select name="golongan" id="golongan" class="default-select form-control wide">
                                            <option value="" @php
                                            if ($user->golongan == "") {
                                                echo "selected";
                                            }
                                            @endphp>Tidak ada</option>
                                            <option value="I" @php
                                            if ($user->golongan == "I") {
                                                echo "selected";
                                            }
                                            @endphp>I</option>
                                            <option value="II"@php
                                            if ($user->golongan == "II") {
                                                echo "selected";
                                            }
                                            @endphp>II</option>
                                            <option value="III"@php
                                            if ($user->golongan == "III") {
                                                echo "selected";
                                            }
                                            @endphp>III</option>
                                            <option value="IV"@php
                                            if ($user->golongan == "IV") {
                                                echo "selected";
                                            }
                                            @endphp>IV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bagian</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"  value="{{$user->division_id}}" name="division_id">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Fungsional</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  value="{{$user->fungsional}}" name="fungsional">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Rekening</label>
                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" value="{{$user->rekening}}"  name="rekening">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">BANK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  value="{{$user->bank}}"  name="bank">
                                    </div>
                                </div>
                                @if(auth()->user()->role == "super-admin")
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-6">
                                        <select name="role" id="role" class="default-select form-control wide">
                                            <option value=""></option>
                                            <option value="admin">Admin</option>
                                            <option value="dosen">Dosen</option>
                                        </select>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" name="role" id="role" value="dosen">
                                @endif
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}" readonly>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <button class="btn btn-primary light btn-sl-sm" id="discard" type="submit"><span class="me-2"><i class="fa fa-save"></i></span>Simpan</button>
                                </div>


                            </form>
                            <div class="mb-3 row">
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-danger light btn-sl-sm" id="discard" type="a"><span class="me-2"><i class="fa fa-times"></i></span>Batalkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>

</script>
@endsection

@section('js')
<script>
    var maxHeight = 400; $(function(){

$(".dropdown > li").hover(function() {

     var $container = $(this),
         $list = $container.find("ul"),
         $anchor = $container.find("a"),
         height = $list.height() * 1.1,       // make sure there is enough room at the bottom
         multiplier = height / maxHeight;     // needs to move faster if list is taller

    // need to save height here so it can revert on mouseout            
    $container.data("origHeight", $container.height());

    // so it can retain it's rollover color all the while the dropdown is open
    $anchor.addClass("hover");

    // make sure dropdown appears directly below parent list item    
    $list
        .show()
        .css({
            paddingTop: $container.data("origHeight")
        });

    // don't do any animation if list shorter than max
    if (multiplier > 1) {
        $container
            .css({
                height: maxHeight,
                overflow: "hidden"
            })
            .mousemove(function(e) {
                var offset = $container.offset();
                var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                if (relativeY > $container.data("origHeight")) {
                    $list.css("top", -relativeY + $container.data("origHeight"));
                };
            });
    }

}, function() {

    var $el = $(this);

    // put things back to normal
    $el
        .height($(this).data("origHeight"))
        .find("ul")
        .css({ top: 0 })
        .hide()
        .end()
        .find("a")
        .removeClass("hover");

});

// Add down arrow only to menu items with submenus
$(".dropdown > li:has('ul')").each(function() {
    $(this).find("a:first").append("<img src='images/down-arrow.png' />");
});

    });
</script>
@endsection
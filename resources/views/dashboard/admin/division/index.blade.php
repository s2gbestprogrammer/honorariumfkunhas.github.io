@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif
<a href="{{route('divisions.create')}}">Tambah bagian</a>
<table cellspacing="5px" border="1px">
    <tr>
        <td>Bagian</td>
    </tr>
    @foreach($divisions as $division)
    <tr>
        <td>{{$division->name}}</td>
    </tr>
    @endforeach

</table>

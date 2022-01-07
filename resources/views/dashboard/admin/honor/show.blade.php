<form action="{{route('honor.store')}}" method="post">
    @csrf

    <input name="jumlah_honor">

    <button type="submit">tambah honor</button>
</form>


{{$users}}

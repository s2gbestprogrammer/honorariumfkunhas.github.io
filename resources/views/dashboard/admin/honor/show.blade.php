<form action="{{route('honor.store')}}" method="post">
    @csrf

     <input type="hidden" name="user_id" value="{{$users->id}}"><br>
    jumlah honor :<input type="text" name="jumlah_honor"><br>
    <input type="hidden" name="golongan" value="{{$users->golongan}}"> <br>

    keterangan

    <select name="category_id">
        @foreach ($keterangan as $k)

        <option value="{{$k->id}}">{{$k->name}}</option>
        @endforeach
    </select>



    <button type="submit">tambah honor</button>
</form>

<form action="{{route('categories.store')}}" method="post">
    @csrf
    name : <input type="text" value="" name="name"> <br>
    type :
    <select name="type">
        <option value="semester">semester</option>
        <option value="bulan">bulan</option>
        <option value="kegiatan">kegiatan</option>
        <option value="tertentu">tertentu</option>
    </select>
    <br>

    <button type="submit">Tambah category</button>
</form>

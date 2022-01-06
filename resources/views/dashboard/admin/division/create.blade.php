<form action="{{route('divisions.store')}}" method="POST">
    @csrf
    <input type="text" name="name">
    <button type="submit">tambah divisi</button>
</form>

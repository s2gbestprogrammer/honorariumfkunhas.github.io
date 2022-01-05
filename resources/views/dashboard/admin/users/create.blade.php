Tambah User
<form action="{{route('users.store')}}" method="post">
    @csrf
    name :<input type="text" name="name"> <br>
    username :<input type="text" name="username"> <br>
    password : <input type="text" name="password"> <br>
    @if(auth()->user()->role == "super-admin")
    <select name="role">
        <option value="">---- pilih role -----</option>
        <option value="admin">Admin biasa</option>
        <option value="dosen">Dosen</option>
    </select>
    @else
    <input type="hidden" name="role" value="dosen"> <br>
    @endif

    <br>
    <button type="submit">Daftar</button>
</form>

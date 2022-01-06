@error('golongan')
{{$message}}
@enderror
@error('bagian')
{{$message}}
@enderror
<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    name :<input type="text" name="name"> <br>
    username :<input type="text" name="username"> <br>
    golongan :
    <select name="golongan" id="golongan">
        <option value="">---- pilih golongan -----</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="II">III</option>
        <option value="IV">IV</option>
    </select> <br>
    bagian :
    <select name="bagian" id="bagian">
        <option value="">---- pilih role -----</option>
        <option value="1">Ilmu kesehatan anak</option>
    </select> <br>
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

@error('golongan')
{{$message}}
@enderror
@error('division_id')
{{$message}}
@enderror
<form action="{{route('users.store')}}" method="post">
    @csrf
    name :<input type="text" name="name"> <br>
    username :<input type="text" name="username"> <br>
    golongan :
    <select name="golongan" id="golongan">
        <option value="">---- pilih golongan -----</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
        <option value="IV">IV</option>
    </select> <br>
    bagian :
    <select name="division_id" id="division_id">
        <option value="">---- pilih role -----</option>
        @foreach($divisions as $division)

        <option value="{{$division->id}}">{{$division->name}}</option>
        @endforeach
    </select> <br>

    rekening :<input type="text" name="rekening"> <br>
    bank :<input type="text" name="bank"> <br>

    @if(auth()->user()->role == "super-admin")
    <select name="role">
        <option value="">---- pilih role -----</option>
        <option value="admin">Admin biasa</option>
        <option value="dosen">Dosen</option>
    </select>
    @else

    password : <input type="text" name="password"> <br>

    <input type="hidden" name="role" value="dosen"> <br>
    @endif

    <br>
    <button type="submit">Daftar</button>
</form>

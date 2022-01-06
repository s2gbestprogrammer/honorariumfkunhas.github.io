Profilku
<form action="{{route('profile.update', auth()->user()->id)}}" method="POST">
    @csrf
    @method('put')
    nama : <input type="text" value="{{auth()->user()->name}}" name="name"> |
    {{auth()->user()->division->name}} |
    {{auth()->user()->golongan}} |<br>

    <button type="submit">ganti nama</button>
</form>


<form action="/password/{{auth()->user()->id}}" method="POST">
    @csrf
    @method('put')
    password baru : <input type="text" value="" name="password"> <br>
    <button type="submit">ganti password</button>
</form>

{{-- {{auth()->user()->golongan}}
{{auth()->user()->bagian}} --}}

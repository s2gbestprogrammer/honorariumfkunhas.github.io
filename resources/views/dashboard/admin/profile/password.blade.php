<form action="{{route('profile.update', auth()->user()->id)}}">
    nama : <input type="text" value="{{auth()->user()->name}}"> |
    {{auth()->user()->division->name}} |
    {{auth()->user()->golongan}} |<br>

    <button type="submit">ganti nama</button>
</form>

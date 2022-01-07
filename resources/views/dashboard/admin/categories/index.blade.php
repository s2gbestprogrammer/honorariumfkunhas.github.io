<a href="{{route('categories.create')}}">tambah category </a>
<table border="1px">
    <tr>
        <td>nama</td>
        <td>type</td>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->name}}</td>
        <td>{{$category->type}}</td>
    </tr>
    @endforeach
</table>

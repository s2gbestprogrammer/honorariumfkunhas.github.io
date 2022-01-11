
<table border="1px">
    <tr>
        <td>no</td>
        <td>nama</td>
        <td>jumlah diterima</td>
    </tr>
@foreach ($search as $s)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$s->user->name}}</td>
        <td>{{$s->jumlah_diterima}}</td>
    </tr>
    @endforeach
</table>

<script>
    window.print();
</script>

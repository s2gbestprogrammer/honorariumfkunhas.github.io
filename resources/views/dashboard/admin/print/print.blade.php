
@foreach ($search as $s)

{{$s->user->name}}
{{$s->jumlah_diterima}}

@endforeach

<script>
    window.print();
</script>

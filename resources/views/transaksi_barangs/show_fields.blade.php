<!-- Id Inventaris Field -->
<div class="col-sm-12">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    <p>{{ $transaksiBarang->id_inventaris }}</p>
</div>

<!-- Id Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('id_transaksi', 'Id Transaksi:') !!}
    <p>{{ $transaksiBarang->id_transaksi }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $transaksiBarang->jumlah }}</p>
</div>


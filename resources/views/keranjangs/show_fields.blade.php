<!-- Id Barang Field -->
<div class="col-sm-12">
    {!! Form::label('id_barang', 'Id Barang:') !!}
    <p>{{ $keranjang->id_barang }}</p>
</div>

<!-- Id Pembeli Field -->
<div class="col-sm-12">
    {!! Form::label('id_pembeli', 'Id Pembeli:') !!}
    <p>{{ $keranjang->id_pembeli }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $keranjang->harga }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $keranjang->jumlah }}</p>
</div>


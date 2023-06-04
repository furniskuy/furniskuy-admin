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

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $keranjang->jumlah }}</p>
</div>


<!-- Selected Field -->
<div class="col-sm-12">
    {!! Form::label('selected', 'Selected:') !!}
    <p>{{ $keranjang->selected }}</p>
</div>

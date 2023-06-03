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


<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $keranjang->barang->nama }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('image', 'Gambar:') !!}
    <img src="{{ env('SUPABASE_IMAGE_URL') . $keranjang->barang->image }}" width="200" height="200"
        alt="{{ $keranjang->barang->nama }}">
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $keranjang->barang->jumlah }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $keranjang->barang->harga }}</p>
</div>

<!-- Id Supplier Field -->
<div class="col-sm-12">
    {!! Form::label('id_supplier', 'Supplier:') !!}
    <div class="col-sm-12">
        {!! Form::label('nama', 'Id:') !!}
        <p>{{ $keranjang->barang->supplier->id }}</p>
    </div>
    <div class="col-sm-12">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{{ $keranjang->barang->supplier->nama }}</p>
    </div>

    <!-- Alamat Field -->
    <div class="col-sm-12">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $keranjang->barang->supplier->alamat }}</p>
    </div>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $barangMasuk->jumlah }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $barangMasuk->harga }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $barangMasuk->nama }}</p>
</div>

<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $barangMasuk->tanggal }}</p>
</div>

<!-- Id Inventaris Field -->
<div class="col-sm-12">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    <p>{{ $barangMasuk->id_inventaris }}</p>
</div>

<!-- Id Supplier Field -->
<div class="col-sm-12">
    {!! Form::label('id_supplier', 'Id Supplier:') !!}
    <p>{{ $barangMasuk->id_supplier }}</p>
</div>


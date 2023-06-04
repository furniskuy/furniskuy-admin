<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $inventaris->nama }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $inventaris->jumlah }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $inventaris->harga }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $inventaris->deskripsi }}</p>
</div>

<!-- Foto Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Gambar:') !!}
    <img src="{{ env('SUPABASE_IMAGE_URL') . $inventaris->image }}" width="200" height="200"
        alt="{{ $inventaris->nama }}">
</div>

<!-- Id User Field -->
<div class="col-sm-12">
    {!! Form::label('id_user', 'Id User:') !!}
    <p>{{ $inventaris->id_user }}</p>
</div>

<!-- Id Kategori Field -->
<div class="col-sm-12">
    {!! Form::label('id_kategori', 'Id Kategori:') !!}
    <p>{{ $inventaris->id_kategori }}</p>
</div>

<!-- Id Supplier Field -->
<div class="col-sm-12">
    {!! Form::label('id_supplier', 'Id Supplier:') !!}
    <p>{{ $inventaris->id_supplier }}</p>
</div>

<!-- Tags Field -->
<div class="col-sm-12">
    {!! Form::label('tags', 'Tags:') !!}
    <p>{{ $inventaris->tags }}</p>
</div>

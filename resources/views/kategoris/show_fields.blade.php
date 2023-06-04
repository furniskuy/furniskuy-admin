<!-- Nama Kategori Field -->
<div class="col-sm-12">
    {!! Form::label('nama_kategori', 'Nama Kategori:') !!}
    <p>{{ $kategori->nama_kategori }}</p>
</div>

<!-- Slug Kategori Field -->
<div class="col-sm-12">
    {!! Form::label('slug_kategori', 'Slug Kategori:') !!}
    <p>{{ $kategori->slug_kategori }}</p>
</div>

<!-- Tags Field -->
<div class="col-sm-12">
    {!! Form::label('tags', 'Tags:') !!}
    <p>{{ $kategori->tags }}</p>
</div>


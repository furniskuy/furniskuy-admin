<!-- Nama Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kategori', 'Nama Kategori:') !!}
    {!! Form::text('nama_kategori', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Slug Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug_kategori', 'Slug Kategori:') !!}
    {!! Form::text('slug_kategori', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::textarea('tags', null, ['class' => 'form-control', 'required']) !!}
</div>
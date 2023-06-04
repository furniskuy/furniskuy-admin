<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 255,
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, [
        'class' => 'form-control',
        'required',
    ]) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto') !!}

    @if (isset($inventaris) && $inventaris->foto)
        <img src="{{ env('SUPABASE_IMAGE_URL') . $inventaris->foto }}" width="200" height="200"
            alt="{{ $inventaris->nama }}">
    @endif

    {!! Form::file('foto', ['id' => 'foto', 'accept' => '.jpeg , .png , .svg']) !!}
</div>

<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::number('id_user', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kategori', 'Id Kategori:') !!}
    {!! Form::number('id_kategori', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_supplier', 'Id Supplier:') !!}
    {!! Form::number('id_supplier', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tags', null, ['class' => 'form-control', 'required']) !!}
</div>

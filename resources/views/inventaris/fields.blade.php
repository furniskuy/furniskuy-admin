<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, [
        'class' => 'form-control',
        'maxlength' => 50,
        'maxlength' => 50,
        'maxlength' => 50,
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', ['id' => 'image', 'accept' => '.jpeg , .png , .svg']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_supplier', 'Supplier:') !!}
    {!! Form::select('id_supplier', $suppliers, null, ['class' => 'form-control']) !!}
</div>

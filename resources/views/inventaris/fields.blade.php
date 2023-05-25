<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50, 'maxlength' => 50]) !!}
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

<!-- Last Updt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_updt', 'Last Updt:') !!}
    {!! Form::text('last_updt', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_supplier', 'Id Supplier:') !!}
    {!! Form::number('id_supplier', null, ['class' => 'form-control']) !!}
</div>
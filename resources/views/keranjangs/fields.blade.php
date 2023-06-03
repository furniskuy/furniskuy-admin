<!-- Id Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_barang', 'Id Barang:') !!}
    {!! Form::number('id_barang', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Pembeli Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pembeli', 'Id Pembeli:') !!}
    {!! Form::number('id_pembeli', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control', 'required']) !!}
</div>

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


<!--Selected Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('selected', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('selected', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('selected', 'Selected', ['class' => 'form-check-label']) !!}
    </div>
</div>

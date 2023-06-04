<!-- Id Inventaris Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    {!! Form::number('id_inventaris', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_transaksi', 'Id Transaksi:') !!}
    {!! Form::number('id_transaksi', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control', 'required']) !!}
</div>
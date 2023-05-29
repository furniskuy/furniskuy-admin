<!-- Rating Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::number('rating', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_user', 'Id User:') !!}
    {!! Form::number('id_user', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Id Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_barang', 'Id Barang:') !!}
    {!! Form::number('id_barang', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Review Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('review', 'Review:') !!}
    {!! Form::textarea('review', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>
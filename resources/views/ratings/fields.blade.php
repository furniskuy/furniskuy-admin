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

<!-- Id Inventaris Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    {!! Form::number('id_inventaris', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Review Field -->
<div class="form-group col-sm-6">
    {!! Form::label('review', 'Review:') !!}
    {!! Form::text('review', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
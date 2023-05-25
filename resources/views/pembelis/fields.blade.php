<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::text('jenis_kelamin', null, ['class' => 'form-control', 'maxlength' => 1, 'maxlength' => 1, 'maxlength' => 1]) !!}
</div>

<!-- Pembeli Baru Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('pembeli_baru', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('pembeli_baru', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('pembeli_baru', 'Pembeli Baru', ['class' => 'form-check-label']) !!}
    </div>
</div>
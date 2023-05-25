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

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datepicker()
    </script>
@endpush

<!-- Id Inventaris Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    {!! Form::number('id_inventaris', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_supplier', 'Id Supplier:') !!}
    {!! Form::number('id_supplier', null, ['class' => 'form-control']) !!}
</div>
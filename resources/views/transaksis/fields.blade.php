<!-- Id Pegawai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pegawai', 'Id Pegawai:') !!}
    {!! Form::number('id_pegawai', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Kasir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kasir', 'Id Kasir:') !!}
    {!! Form::number('id_kasir', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Pembeli Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pembeli', 'Id Pembeli:') !!}
    {!! Form::number('id_pembeli', null, ['class' => 'form-control']) !!}
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

<!-- Id Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_barang', 'Id Barang:') !!}
    {!! Form::number('id_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Terbayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terbayar', 'Terbayar:') !!}
    {!! Form::text('terbayar', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>
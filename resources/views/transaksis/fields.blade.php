<!-- Tanggal Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_transaksi', 'Tanggal Transaksi:') !!}
    {!! Form::text('tanggal_transaksi', null, ['class' => 'form-control','id'=>'tanggal_transaksi']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_transaksi').datepicker()
    </script>
@endpush

<!-- Total Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    {!! Form::number('total_harga', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_barang', 'Total Barang:') !!}
    {!! Form::number('total_barang', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_transaksi', 'Status Transaksi:') !!}
    {!! Form::text('status_transaksi', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Tenggat Waktu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenggat_waktu', 'Tenggat Waktu:') !!}
    {!! Form::text('tenggat_waktu', null, ['class' => 'form-control','id'=>'tenggat_waktu']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tenggat_waktu').datepicker()
    </script>
@endpush

<!-- Metode Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metode_pembayaran', 'Metode Pembayaran:') !!}
    {!! Form::number('metode_pembayaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pembayaran', 'Waktu Pembayaran:') !!}
    {!! Form::text('waktu_pembayaran', null, ['class' => 'form-control','id'=>'waktu_pembayaran']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_pembayaran').datepicker()
    </script>
@endpush

<!-- Waktu Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_pengiriman', 'Waktu Pengiriman:') !!}
    {!! Form::text('waktu_pengiriman', null, ['class' => 'form-control','id'=>'waktu_pengiriman']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#waktu_pengiriman').datepicker()
    </script>
@endpush

<!-- Id Pembeli Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pembeli', 'Id Pembeli:') !!}
    {!! Form::number('id_pembeli', null, ['class' => 'form-control', 'required']) !!}
</div>
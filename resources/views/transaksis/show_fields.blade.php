<!-- Tanggal Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_transaksi', 'Tanggal Transaksi:') !!}
    <p>{{ $transaksi->tanggal_transaksi }}</p>
</div>

<!-- Total Harga Field -->
<div class="col-sm-12">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <p>{{ $transaksi->total_harga }}</p>
</div>

<!-- Total Barang Field -->
<div class="col-sm-12">
    {!! Form::label('total_barang', 'Total Barang:') !!}
    <p>{{ $transaksi->total_barang }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaksi->status }}</p>
</div>

<!-- Status Transaksi Field -->
<div class="col-sm-12">
    {!! Form::label('status_transaksi', 'Status Transaksi:') !!}
    <p>{{ $transaksi->status_transaksi }}</p>
</div>

<!-- Tenggat Waktu Field -->
<div class="col-sm-12">
    {!! Form::label('tenggat_waktu', 'Tenggat Waktu:') !!}
    <p>{{ $transaksi->tenggat_waktu }}</p>
</div>

<!-- Metode Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('metode_pembayaran', 'Metode Pembayaran:') !!}
    <p>{{ $transaksi->metode_pembayaran }}</p>
</div>

<!-- Waktu Pembayaran Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_pembayaran', 'Waktu Pembayaran:') !!}
    <p>{{ $transaksi->waktu_pembayaran }}</p>
</div>

<!-- Waktu Pengiriman Field -->
<div class="col-sm-12">
    {!! Form::label('waktu_pengiriman', 'Waktu Pengiriman:') !!}
    <p>{{ $transaksi->waktu_pengiriman }}</p>
</div>

<!-- Id Pembeli Field -->
<div class="col-sm-12">
    {!! Form::label('id_pembeli', 'Id Pembeli:') !!}
    <p>{{ $transaksi->id_pembeli }}</p>
</div>


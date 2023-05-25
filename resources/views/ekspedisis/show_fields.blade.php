<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $ekspedisi->nama }}</p>
</div>

<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $ekspedisi->tanggal }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $ekspedisi->alamat }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $ekspedisi->jumlah }}</p>
</div>

<!-- Id Pegawai Field -->
<div class="col-sm-12">
    {!! Form::label('id_pegawai', 'Id Pegawai:') !!}
    <p>{{ $ekspedisi->id_pegawai }}</p>
</div>


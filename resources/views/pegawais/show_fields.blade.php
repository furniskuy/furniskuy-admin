<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pegawai->nama }}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $pegawai->jenis_kelamin }}</p>
</div>

<!-- No Hp Field -->
<div class="col-sm-12">
    {!! Form::label('no_hp', 'No Hp:') !!}
    <p>{{ $pegawai->no_hp }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pegawai->alamat }}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $pegawai->tanggal_lahir }}</p>
</div>


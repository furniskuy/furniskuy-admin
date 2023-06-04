<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('id_user', 'Id User:') !!}
    <p>{{ $pembeli->id_user }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pembeli->nama }}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="col-sm-12">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $pembeli->jenis_kelamin }}</p>
</div>

<!-- No Hp Field -->
<div class="col-sm-12">
    {!! Form::label('no_hp', 'No Hp:') !!}
    <p>{{ $pembeli->no_hp }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pembeli->alamat }}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $pembeli->tanggal_lahir }}</p>
</div>

<!-- Pembeli Baru Field -->
<div class="col-sm-12">
    {!! Form::label('pembeli_baru', 'Pembeli Baru:') !!}
    <p>{{ $pembeli->pembeli_baru }}</p>
</div>

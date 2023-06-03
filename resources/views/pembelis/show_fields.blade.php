<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $pembeli->id }}</p>
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

<!-- Pembeli Baru Field -->
<div class="col-sm-12">
    {!! Form::label('pembeli_baru', 'Pembeli Baru:') !!}
    <p>{{ $pembeli->pembeli_baru }}</p>
</div>

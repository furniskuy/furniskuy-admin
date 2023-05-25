<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $inventaris->nama }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $inventaris->jumlah }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $inventaris->harga }}</p>
</div>

<!-- Last Updt Field -->
<div class="col-sm-12">
    {!! Form::label('last_updt', 'Last Updt:') !!}
    <p>{{ $inventaris->last_updt }}</p>
</div>

<!-- Id Supplier Field -->
<div class="col-sm-12">
    {!! Form::label('id_supplier', 'Supplier:') !!}
    <div class="col-sm-12">
        {!! Form::label('nama', 'Id:') !!}
        <p>{{ $inventaris->supplier->id }}</p>
    </div>
    <div class="col-sm-12">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{{ $inventaris->supplier->nama }}</p>
    </div>
    
    <!-- Alamat Field -->
    <div class="col-sm-12">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{{ $inventaris->supplier->alamat }}</p>
    </div>
</div>


<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{{ $metodePembayaran->logo }}</p>
</div>

<!-- Nama Bank Field -->
<div class="col-sm-12">
    {!! Form::label('nama_bank', 'Nama Bank:') !!}
    <p>{{ $metodePembayaran->nama_bank }}</p>
</div>

<!-- No Rek Field -->
<div class="col-sm-12">
    {!! Form::label('no_rek', 'No Rek:') !!}
    <p>{{ $metodePembayaran->no_rek }}</p>
</div>

<!-- Atas Nama Field -->
<div class="col-sm-12">
    {!! Form::label('atas_nama', 'Atas Nama:') !!}
    <p>{{ $metodePembayaran->atas_nama }}</p>
</div>


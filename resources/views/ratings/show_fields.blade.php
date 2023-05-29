<!-- Rating Field -->
<div class="col-sm-12">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{{ $rating->rating }}</p>
</div>

<!-- Id User Field -->
<div class="col-sm-12">
    {!! Form::label('id_user', 'Id User:') !!}
    <p>{{ $rating->id_user }}</p>
</div>

<!-- Id Barang Field -->
<div class="col-sm-12">
    {!! Form::label('id_barang', 'Id Barang:') !!}
    <p>{{ $rating->id_barang }}</p>
</div>

<!-- Review Field -->
<div class="col-sm-12">
    {!! Form::label('review', 'Review:') !!}
    <p>{{ $rating->review }}</p>
</div>


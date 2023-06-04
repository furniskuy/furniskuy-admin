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

<!-- Id Inventaris Field -->
<div class="col-sm-12">
    {!! Form::label('id_inventaris', 'Id Inventaris:') !!}
    <p>{{ $rating->id_inventaris }}</p>
</div>

<!-- Review Field -->
<div class="col-sm-12">
    {!! Form::label('review', 'Review:') !!}
    <p>{{ $rating->review }}</p>
</div>


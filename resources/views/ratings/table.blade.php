<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ratings-table">
            <thead>
            <tr>
                <th>Rating</th>
                <th>Id User</th>
                <th>Id Inventaris</th>
                <th>Review</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ratings as $rating)
                <tr>
                    <td>{{ $rating->rating }}</td>
                    <td>{{ $rating->id_user }}</td>
                    <td>{{ $rating->id_inventaris }}</td>
                    <td>{{ $rating->review }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ratings.destroy', $rating->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ratings.show', [$rating->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ratings.edit', [$rating->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $ratings])
        </div>
    </div>
</div>

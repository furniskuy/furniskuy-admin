<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="ekspedisis-table">
            <thead>
            <tr>
                <th>Nama Ekspedisi</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Website</th>
                <th>Logo</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ekspedisis as $ekspedisi)
                <tr>
                    <td>{{ $ekspedisi->nama_ekspedisi }}</td>
                    <td>{{ $ekspedisi->alamat }}</td>
                    <td>{{ $ekspedisi->no_hp }}</td>
                    <td>{{ $ekspedisi->email }}</td>
                    <td>{{ $ekspedisi->website }}</td>
                    <td>{{ $ekspedisi->logo }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['ekspedisis.destroy', $ekspedisi->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ekspedisis.show', [$ekspedisi->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('ekspedisis.edit', [$ekspedisi->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $ekspedisis])
        </div>
    </div>
</div>

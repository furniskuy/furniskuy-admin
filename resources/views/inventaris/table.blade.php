<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="inventaris-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Last Updt</th>
                <th>Id Supplier</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventaris as $inventari)
                <tr>
                    <td>{{ $inventari->nama }}</td>
                    <td>{{ $inventari->jumlah }}</td>
                    <td>{{ $inventari->harga }}</td>
                    <td>{{ $inventari->last_updt }}</td>
                    <td>{{ $inventari->id_supplier }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['inventaris.destroy', $inventari->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('inventaris.show', [$inventari->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('inventaris.edit', [$inventari->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $inventaris])
        </div>
    </div>
</div>

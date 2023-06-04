<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="inventaris-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Id User</th>
                    <th>Id Kategori</th>
                    <th>Id Supplier</th>
                    <th>Tags</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventaris as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->foto }}</td>
                        <td>{{ $item->id_user }}</td>
                        <td>{{ $item->id_kategori }}</td>
                        <td>{{ $item->id_supplier }}</td>
                        <td>{{ $item->tags }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['inventaris.destroy', $item->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('inventaris.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('inventaris.edit', [$item->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
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

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="barang-keluars-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Id Inventaris</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangKeluars as $barangKeluar)
                    <tr>
                        <td>{{ $barangKeluar->id }}</td>
                        <td>{{ $barangKeluar->jumlah }}</td>
                        <td>{{ $barangKeluar->harga }}</td>
                        <td>{{ $barangKeluar->tanggal }}</td>
                        <td>{{ $barangKeluar->id_inventaris }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['barang-keluars.destroy', $barangKeluar->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('barang-keluars.show', [$barangKeluar->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('barang-keluars.edit', [$barangKeluar->id]) }}"
                                    class='btn btn-default btn-xs'>
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
            @include('adminlte-templates::common.paginate', ['records' => $barangKeluars])
        </div>
    </div>
</div>

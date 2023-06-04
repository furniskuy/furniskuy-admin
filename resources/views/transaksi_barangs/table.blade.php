<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="transaksi-barangs-table">
            <thead>
                <tr>
                    <th>Id Inventaris</th>
                    <th>Id Transaksi</th>
                    <th>Jumlah</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiBarangs as $transaksiBarang)
                    <tr>
                        <td>{{ $transaksiBarang->id_inventaris }}</td>
                        <td>{{ $transaksiBarang->id_transaksi }}</td>
                        <td>{{ $transaksiBarang->jumlah }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['transaksi-barangs.destroy', $transaksiBarang->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('transaksi-barangs.show', [$transaksiBarang->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('transaksi-barangs.edit', [$transaksiBarang->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $transaksiBarangs])
        </div>
    </div>
</div>

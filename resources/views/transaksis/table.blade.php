<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="transaksis-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Id Pegawai</th>
                <th>Id Kasir</th>
                <th>Id Pembeli</th>
                <th>Tanggal</th>
                <th>Id Barang</th>
                <th>Terbayar</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->id_pegawai }}</td>
                    <td>{{ $transaksi->id_kasir }}</td>
                    <td>{{ $transaksi->id_pembeli }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->id_barang }}</td>
                    <td>{{ $transaksi->terbayar }}</td>
                    <td>{{ $transaksi->harga }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['transaksis.destroy', $transaksi->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('transaksis.show', [$transaksi->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('transaksis.edit', [$transaksi->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $transaksis])
        </div>
    </div>
</div>

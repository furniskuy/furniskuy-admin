<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="barang-masuks-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Id Inventaris</th>
                    <th>Id Supplier</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangMasuks as $barangMasuk)
                    <tr>
                        <td>{{ $barangMasuk->id }}</td>
                        <td>{{ $barangMasuk->jumlah }}</td>
                        <td>{{ $barangMasuk->harga }}</td>
                        <td>{{ $barangMasuk->nama }}</td>
                        <td>{{ $barangMasuk->tanggal }}</td>
                        <td>{{ $barangMasuk->id_inventaris }}</td>
                        <td>{{ $barangMasuk->id_supplier }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['barang-masuks.destroy', $barangMasuk->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('barang-masuks.show', [$barangMasuk->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('barang-masuks.edit', [$barangMasuk->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $barangMasuks])
        </div>
    </div>
</div>

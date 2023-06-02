<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="keranjangs-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Barang</th>
                    <th>Id Pembeli</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjangs as $keranjang)
                    <tr>
                        <td>{{ $keranjang->id }}</td>
                        <td>{{ $keranjang->id_barang }}</td>
                        <td>{{ $keranjang->id_pembeli }}</td>
                        <td>{{ $keranjang->harga }}</td>
                        <td>{{ $keranjang->jumlah }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['keranjangs.destroy', $keranjang->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('keranjangs.show', [$keranjang->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('keranjangs.edit', [$keranjang->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $keranjangs])
        </div>
    </div>
</div>

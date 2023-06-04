<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="metode-pembayarans-table">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nama Bank</th>
                    <th>No Rek</th>
                    <th>Atas Nama</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metodePembayarans as $metodePembayaran)
                    <tr>
                        <td>{{ $metodePembayaran->logo }}</td>
                        <td>{{ $metodePembayaran->nama_bank }}</td>
                        <td>{{ $metodePembayaran->no_rek }}</td>
                        <td>{{ $metodePembayaran->atas_nama }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['metode-pembayarans.destroy', $metodePembayaran->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('metode-pembayarans.show', [$metodePembayaran->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('metode-pembayarans.edit', [$metodePembayaran->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $metodePembayarans])
        </div>
    </div>
</div>

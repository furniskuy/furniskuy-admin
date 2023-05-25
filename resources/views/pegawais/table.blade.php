<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pegawais-table">
            <thead>
            <tr>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->tanggal_lahir }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pegawais.destroy', $pegawai->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pegawais.show', [$pegawai->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pegawais.edit', [$pegawai->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $pegawais])
        </div>
    </div>
</div>

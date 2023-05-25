<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pembelis-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Pembeli Baru</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pembelis as $pembeli)
                <tr>
                    <td>{{ $pembeli->nama }}</td>
                    <td>{{ $pembeli->jenis_kelamin }}</td>
                    <td>{{ $pembeli->pembeli_baru }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pembelis.destroy', $pembeli->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pembelis.show', [$pembeli->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pembelis.edit', [$pembeli->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $pembelis])
        </div>
    </div>
</div>

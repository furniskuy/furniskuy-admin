 <div class="card-body p-0">
     <div class="table-responsive">
         <table class="table" id="transaksis-table">
             <thead>
                 <tr>
                     <th>Tanggal Transaksi</th>
                     <th>Total Harga</th>
                     <th>Total Barang</th>
                     <th>Status</th>
                     <th>Status Transaksi</th>
                     <th>Tenggat Waktu</th>
                     <th>Metode Pembayaran</th>
                     <th>Waktu Pembayaran</th>
                     <th>Waktu Pengiriman</th>
                     <th>Id Pembeli</th>
                     <th>Set Status</th>
                     <th colspan="3">Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($transaksis as $transaksi)
                     <tr>
                         <td>{{ $transaksi->tanggal_transaksi }}</td>
                         <td>{{ $transaksi->total_harga }}</td>
                         <td>{{ $transaksi->total_barang }}</td>
                         <td>{{ $transaksi->status }}</td>
                         <td>{{ $transaksi->status_transaksi }}</td>
                         <td>{{ $transaksi->tenggat_waktu }}</td>
                         <td>{{ $transaksi->metode_pembayaran }}</td>
                         <td>{{ $transaksi->waktu_pembayaran }}</td>
                         <td>{{ $transaksi->waktu_pengiriman }}</td>
                         <td>{{ $transaksi->id_pembeli }}</td>
                         <td>
                             {!! Form::model($transaksi, ['route' => ['transaksis.updateStatus', $transaksi->id], 'method' => 'patch']) !!}
                             {!! Form::select(
                                 'status',
                                 [
                                     1 => 'Belum Bayar',
                                     2 => 'Sedang Dikemas',
                                     3 => 'Dikirim',
                                     4 => 'Selesai',
                                     5 => 'Dibatalkan',
                                 ],
                                 null,
                                 ['class' => 'form-control'],
                             ) !!}
                             <br>
                             {!! Form::submit('Set Status', ['class' => 'btn btn-primary']) !!}
                             {!! Form::close() !!}
                         </td>
                         <td style="width: 120px">
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
             @include('adminlte-templates::common.paginate', ['records' => $transaksis])
         </div>
     </div>
 </div>

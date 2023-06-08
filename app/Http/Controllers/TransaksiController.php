<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TransaksiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class TransaksiController extends AppBaseController
{
    /** @var TransaksiRepository $transaksiRepository*/
    private $transaksiRepository;

    public function __construct(TransaksiRepository $transaksiRepo)
    {
        $this->transaksiRepository = $transaksiRepo;
    }

    /**
     * Display a listing of the Transaksi.
     */
    public function index(Request $request)
    {
        $transaksis = $this->transaksiRepository->paginate(10);

        return view('transaksis.index')
            ->with('transaksis', $transaksis);
    }

    /**
     * Show the form for creating a new Transaksi.
     */
    public function create()
    {
        return view('transaksis.create');
    }

    /**
     * Store a newly created Transaksi in storage.
     */
    public function store(CreateTransaksiRequest $request)
    {
        $input = $request->all();

        $transaksi = $this->transaksiRepository->create($input);

        Flash::success('Transaksi saved successfully.');

        return redirect(route('transaksis.index'));
    }

    /**
     * Display the specified Transaksi.
     */
    public function show($id)
    {
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        return view('transaksis.show')->with('transaksi', $transaksi);
    }

    /**
     * Show the form for editing the specified Transaksi.
     */
    public function edit($id)
    {
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        return view('transaksis.edit')->with('transaksi', $transaksi);
    }

    /**
     * Update the specified Transaksi in storage.
     */
    public function update($id, UpdateTransaksiRequest $request)
    {
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        $transaksi = $this->transaksiRepository->update($request->all(), $id);

        Flash::success('Transaksi updated successfully.');

        return redirect(route('transaksis.index'));
    }

    /**
     * Remove the specified Transaksi from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        $this->transaksiRepository->delete($id);

        Flash::success('Transaksi deleted successfully.');

        return redirect(route('transaksis.index'));
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        $transaksi->status = $request->status;

        if (env('DB_CONNECTION') == 'mysql') {
            $transaksi->status_transaksi = DB::select("call status_transaksi(?, @status)", [$transaksi->status])[0]->status;
        } elseif (env('DB_CONNECTION') == 'pgsql') {
            $transaksi->status_transaksi = DB::select("select status_transaksi(?)", [$transaksi->status])[0]->status_transaksi;
        }

        if ($request->status == 2) {
            $transaksi->waktu_pembayaran = now();
        } elseif ($request->status == 3) {
            $transaksi->waktu_pengiriman = now();
        }

        $transaksi->save();

        Flash::success('Transaksi updated successfully.');

        return redirect(route('transaksis.index'));
    }
}

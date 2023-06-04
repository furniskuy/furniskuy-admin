<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiBarangRequest;
use App\Http\Requests\UpdateTransaksiBarangRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TransaksiBarangRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TransaksiBarangController extends AppBaseController
{
    /** @var TransaksiBarangRepository $transaksiBarangRepository*/
    private $transaksiBarangRepository;

    public function __construct(TransaksiBarangRepository $transaksiBarangRepo)
    {
        $this->transaksiBarangRepository = $transaksiBarangRepo;
    }

    /**
     * Display a listing of the TransaksiBarang.
     */
    public function index(Request $request)
    {
        $transaksiBarangs = $this->transaksiBarangRepository->paginate(10);

        return view('transaksi_barangs.index')
            ->with('transaksiBarangs', $transaksiBarangs);
    }

    /**
     * Show the form for creating a new TransaksiBarang.
     */
    public function create()
    {
        return view('transaksi_barangs.create');
    }

    /**
     * Store a newly created TransaksiBarang in storage.
     */
    public function store(CreateTransaksiBarangRequest $request)
    {
        $input = $request->all();

        $transaksiBarang = $this->transaksiBarangRepository->create($input);

        Flash::success('Transaksi Barang saved successfully.');

        return redirect(route('transaksi-barangs.index'));
    }

    /**
     * Display the specified TransaksiBarang.
     */
    public function show($id)
    {
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            Flash::error('Transaksi Barang not found');

            return redirect(route('transaksi-barangs.index'));
        }

        return view('transaksi_barangs.show')->with('transaksiBarang', $transaksiBarang);
    }

    /**
     * Show the form for editing the specified TransaksiBarang.
     */
    public function edit($id)
    {
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            Flash::error('Transaksi Barang not found');

            return redirect(route('transaksi-barangs.index'));
        }

        return view('transaksi_barangs.edit')->with('transaksiBarang', $transaksiBarang);
    }

    /**
     * Update the specified TransaksiBarang in storage.
     */
    public function update($id, UpdateTransaksiBarangRequest $request)
    {
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            Flash::error('Transaksi Barang not found');

            return redirect(route('transaksi-barangs.index'));
        }

        $transaksiBarang = $this->transaksiBarangRepository->update($request->all(), $id);

        Flash::success('Transaksi Barang updated successfully.');

        return redirect(route('transaksi-barangs.index'));
    }

    /**
     * Remove the specified TransaksiBarang from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            Flash::error('Transaksi Barang not found');

            return redirect(route('transaksi-barangs.index'));
        }

        $this->transaksiBarangRepository->delete($id);

        Flash::success('Transaksi Barang deleted successfully.');

        return redirect(route('transaksi-barangs.index'));
    }
}

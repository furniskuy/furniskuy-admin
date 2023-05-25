<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangMasukRequest;
use App\Http\Requests\UpdateBarangMasukRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BarangMasukRepository;
use Illuminate\Http\Request;
use Flash;

class BarangMasukController extends AppBaseController
{
    /** @var BarangMasukRepository $barangMasukRepository*/
    private $barangMasukRepository;

    public function __construct(BarangMasukRepository $barangMasukRepo)
    {
        $this->barangMasukRepository = $barangMasukRepo;
    }

    /**
     * Display a listing of the BarangMasuk.
     */
    public function index(Request $request)
    {
        $barangMasuks = $this->barangMasukRepository->paginate(10);

        return view('barang_masuks.index')
            ->with('barangMasuks', $barangMasuks);
    }

    /**
     * Show the form for creating a new BarangMasuk.
     */
    public function create()
    {
        return view('barang_masuks.create');
    }

    /**
     * Store a newly created BarangMasuk in storage.
     */
    public function store(CreateBarangMasukRequest $request)
    {
        $input = $request->all();

        $barangMasuk = $this->barangMasukRepository->create($input);

        Flash::success('Barang Masuk saved successfully.');

        return redirect( route('barang-masuks.index'));
    }

    /**
     * Display the specified BarangMasuk.
     */
    public function show($id)
    {
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            Flash::error('Barang Masuk not found');

            return redirect( route('barang-masuks.index'));
        }

        return view('barang_masuks.show')->with('barangMasuk', $barangMasuk);
    }

    /**
     * Show the form for editing the specified BarangMasuk.
     */
    public function edit($id)
    {
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            Flash::error('Barang Masuk not found');

            return redirect( route('barang-masuks.index'));
        }

        return view('barang_masuks.edit')->with('barangMasuk', $barangMasuk);
    }

    /**
     * Update the specified BarangMasuk in storage.
     */
    public function update($id, UpdateBarangMasukRequest $request)
    {
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            Flash::error('Barang Masuk not found');

            return redirect( route('barang-masuks.index'));
        }

        $barangMasuk = $this->barangMasukRepository->update($request->all(), $id);

        Flash::success('Barang Masuk updated successfully.');

        return redirect( route('barang-masuks.index'));
    }

    /**
     * Remove the specified BarangMasuk from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            Flash::error('Barang Masuk not found');

            return redirect( route('barang-masuks.index'));
        }

        $this->barangMasukRepository->delete($id);

        Flash::success('Barang Masuk deleted successfully.');

        return redirect( route('barang-masuks.index'));
    }
}

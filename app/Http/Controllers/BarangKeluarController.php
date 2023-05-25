<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangKeluarRequest;
use App\Http\Requests\UpdateBarangKeluarRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BarangKeluarRepository;
use Illuminate\Http\Request;
use Flash;

class BarangKeluarController extends AppBaseController
{
    /** @var BarangKeluarRepository $barangKeluarRepository*/
    private $barangKeluarRepository;

    public function __construct(BarangKeluarRepository $barangKeluarRepo)
    {
        $this->barangKeluarRepository = $barangKeluarRepo;
    }

    /**
     * Display a listing of the BarangKeluar.
     */
    public function index(Request $request)
    {
        $barangKeluars = $this->barangKeluarRepository->paginate(10);

        return view('barang_keluars.index')
            ->with('barangKeluars', $barangKeluars);
    }

    /**
     * Show the form for creating a new BarangKeluar.
     */
    public function create()
    {
        return view('barang_keluars.create');
    }

    /**
     * Store a newly created BarangKeluar in storage.
     */
    public function store(CreateBarangKeluarRequest $request)
    {
        $input = $request->all();

        $barangKeluar = $this->barangKeluarRepository->create($input);

        Flash::success('Barang Keluar saved successfully.');

        return redirect(route('barangKeluars.index'));
    }

    /**
     * Display the specified BarangKeluar.
     */
    public function show($id)
    {
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            Flash::error('Barang Keluar not found');

            return redirect(route('barangKeluars.index'));
        }

        return view('barang_keluars.show')->with('barangKeluar', $barangKeluar);
    }

    /**
     * Show the form for editing the specified BarangKeluar.
     */
    public function edit($id)
    {
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            Flash::error('Barang Keluar not found');

            return redirect(route('barangKeluars.index'));
        }

        return view('barang_keluars.edit')->with('barangKeluar', $barangKeluar);
    }

    /**
     * Update the specified BarangKeluar in storage.
     */
    public function update($id, UpdateBarangKeluarRequest $request)
    {
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            Flash::error('Barang Keluar not found');

            return redirect(route('barangKeluars.index'));
        }

        $barangKeluar = $this->barangKeluarRepository->update($request->all(), $id);

        Flash::success('Barang Keluar updated successfully.');

        return redirect(route('barangKeluars.index'));
    }

    /**
     * Remove the specified BarangKeluar from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            Flash::error('Barang Keluar not found');

            return redirect(route('barangKeluars.index'));
        }

        $this->barangKeluarRepository->delete($id);

        Flash::success('Barang Keluar deleted successfully.');

        return redirect(route('barangKeluars.index'));
    }
}

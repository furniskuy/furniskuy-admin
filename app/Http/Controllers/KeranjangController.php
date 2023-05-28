<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KeranjangRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class KeranjangController extends AppBaseController
{
    /** @var KeranjangRepository $keranjangRepository*/
    private $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepo)
    {
        $this->keranjangRepository = $keranjangRepo;
    }

    /**
     * Display a listing of the Keranjang.
     */
    public function index(Request $request)
    {
        $keranjangs = $this->keranjangRepository->paginate(10);

        return view('keranjangs.index')
            ->with('keranjangs', $keranjangs);
    }

    /**
     * Show the form for creating a new Keranjang.
     */
    public function create()
    {
        return view('keranjangs.create');
    }

    /**
     * Store a newly created Keranjang in storage.
     */
    public function store(CreateKeranjangRequest $request)
    {
        $input = $request->all();

        $keranjang = $this->keranjangRepository->create($input);

        Flash::success('Keranjang saved successfully.');

        return redirect(route('keranjangs.index'));
    }

    /**
     * Display the specified Keranjang.
     */
    public function show($id)
    {
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            Flash::error('Keranjang not found');

            return redirect(route('keranjangs.index'));
        }

        return view('keranjangs.show')->with('keranjang', $keranjang);
    }

    /**
     * Show the form for editing the specified Keranjang.
     */
    public function edit($id)
    {
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            Flash::error('Keranjang not found');

            return redirect(route('keranjangs.index'));
        }

        return view('keranjangs.edit')->with('keranjang', $keranjang);
    }

    /**
     * Update the specified Keranjang in storage.
     */
    public function update($id, UpdateKeranjangRequest $request)
    {
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            Flash::error('Keranjang not found');

            return redirect(route('keranjangs.index'));
        }

        $keranjang = $this->keranjangRepository->update($request->all(), $id);

        Flash::success('Keranjang updated successfully.');

        return redirect(route('keranjangs.index'));
    }

    /**
     * Remove the specified Keranjang from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            Flash::error('Keranjang not found');

            return redirect(route('keranjangs.index'));
        }

        $this->keranjangRepository->delete($id);

        Flash::success('Keranjang deleted successfully.');

        return redirect(route('keranjangs.index'));
    }
}

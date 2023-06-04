<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KategoriRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class KategoriController extends AppBaseController
{
    /** @var KategoriRepository $kategoriRepository*/
    private $kategoriRepository;

    public function __construct(KategoriRepository $kategoriRepo)
    {
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * Display a listing of the Kategori.
     */
    public function index(Request $request)
    {
        $kategoris = $this->kategoriRepository->paginate(10);

        return view('kategoris.index')
            ->with('kategoris', $kategoris);
    }

    /**
     * Show the form for creating a new Kategori.
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created Kategori in storage.
     */
    public function store(CreateKategoriRequest $request)
    {
        $input = $request->all();

        $kategori = $this->kategoriRepository->create($input);

        Flash::success('Kategori saved successfully.');

        return redirect(route('kategoris.index'));
    }

    /**
     * Display the specified Kategori.
     */
    public function show($id)
    {
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        return view('kategoris.show')->with('kategori', $kategori);
    }

    /**
     * Show the form for editing the specified Kategori.
     */
    public function edit($id)
    {
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        return view('kategoris.edit')->with('kategori', $kategori);
    }

    /**
     * Update the specified Kategori in storage.
     */
    public function update($id, UpdateKategoriRequest $request)
    {
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        $kategori = $this->kategoriRepository->update($request->all(), $id);

        Flash::success('Kategori updated successfully.');

        return redirect(route('kategoris.index'));
    }

    /**
     * Remove the specified Kategori from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            Flash::error('Kategori not found');

            return redirect(route('kategoris.index'));
        }

        $this->kategoriRepository->delete($id);

        Flash::success('Kategori deleted successfully.');

        return redirect(route('kategoris.index'));
    }
}

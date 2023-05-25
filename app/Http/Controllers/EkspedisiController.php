<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEkspedisiRequest;
use App\Http\Requests\UpdateEkspedisiRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EkspedisiRepository;
use Illuminate\Http\Request;
use Flash;

class EkspedisiController extends AppBaseController
{
    /** @var EkspedisiRepository $ekspedisiRepository*/
    private $ekspedisiRepository;

    public function __construct(EkspedisiRepository $ekspedisiRepo)
    {
        $this->ekspedisiRepository = $ekspedisiRepo;
    }

    /**
     * Display a listing of the Ekspedisi.
     */
    public function index(Request $request)
    {
        $ekspedisis = $this->ekspedisiRepository->paginate(10);

        return view('ekspedisis.index')
            ->with('ekspedisis', $ekspedisis);
    }

    /**
     * Show the form for creating a new Ekspedisi.
     */
    public function create()
    {
        return view('ekspedisis.create');
    }

    /**
     * Store a newly created Ekspedisi in storage.
     */
    public function store(CreateEkspedisiRequest $request)
    {
        $input = $request->all();

        $ekspedisi = $this->ekspedisiRepository->create($input);

        Flash::success('Ekspedisi saved successfully.');

        return redirect(route('ekspedisis.index'));
    }

    /**
     * Display the specified Ekspedisi.
     */
    public function show($id)
    {
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            Flash::error('Ekspedisi not found');

            return redirect(route('ekspedisis.index'));
        }

        return view('ekspedisis.show')->with('ekspedisi', $ekspedisi);
    }

    /**
     * Show the form for editing the specified Ekspedisi.
     */
    public function edit($id)
    {
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            Flash::error('Ekspedisi not found');

            return redirect(route('ekspedisis.index'));
        }

        return view('ekspedisis.edit')->with('ekspedisi', $ekspedisi);
    }

    /**
     * Update the specified Ekspedisi in storage.
     */
    public function update($id, UpdateEkspedisiRequest $request)
    {
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            Flash::error('Ekspedisi not found');

            return redirect(route('ekspedisis.index'));
        }

        $ekspedisi = $this->ekspedisiRepository->update($request->all(), $id);

        Flash::success('Ekspedisi updated successfully.');

        return redirect(route('ekspedisis.index'));
    }

    /**
     * Remove the specified Ekspedisi from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            Flash::error('Ekspedisi not found');

            return redirect(route('ekspedisis.index'));
        }

        $this->ekspedisiRepository->delete($id);

        Flash::success('Ekspedisi deleted successfully.');

        return redirect(route('ekspedisis.index'));
    }
}

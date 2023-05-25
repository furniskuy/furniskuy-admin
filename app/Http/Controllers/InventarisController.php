<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventarisRequest;
use App\Http\Requests\UpdateInventarisRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InventarisRepository;
use Illuminate\Http\Request;
use Flash;

class InventarisController extends AppBaseController
{
    /** @var InventarisRepository $inventarisRepository*/
    private $inventarisRepository;

    public function __construct(InventarisRepository $inventarisRepo)
    {
        $this->inventarisRepository = $inventarisRepo;
    }

    /**
     * Display a listing of the Inventaris.
     */
    public function index(Request $request)
    {
        $inventaris = $this->inventarisRepository->paginate(10);

        return view('inventaris.index')
            ->with('inventaris', $inventaris);
    }

    /**
     * Show the form for creating a new Inventaris.
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created Inventaris in storage.
     */
    public function store(CreateInventarisRequest $request)
    {
        $input = $request->all();

        $inventaris = $this->inventarisRepository->create($input);

        Flash::success('Inventaris saved successfully.');

        return redirect(route('inventaris.index'));
    }

    /**
     * Display the specified Inventaris.
     */
    public function show($id)
    {
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            Flash::error('Inventaris not found');

            return redirect(route('inventaris.index'));
        }

        return view('inventaris.show')->with('inventaris', $inventaris);
    }

    /**
     * Show the form for editing the specified Inventaris.
     */
    public function edit($id)
    {
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            Flash::error('Inventaris not found');

            return redirect(route('inventaris.index'));
        }

        return view('inventaris.edit')->with('inventaris', $inventaris);
    }

    /**
     * Update the specified Inventaris in storage.
     */
    public function update($id, UpdateInventarisRequest $request)
    {
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            Flash::error('Inventaris not found');

            return redirect(route('inventaris.index'));
        }

        $inventaris = $this->inventarisRepository->update($request->all(), $id);

        Flash::success('Inventaris updated successfully.');

        return redirect(route('inventaris.index'));
    }

    /**
     * Remove the specified Inventaris from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            Flash::error('Inventaris not found');

            return redirect(route('inventaris.index'));
        }

        $this->inventarisRepository->delete($id);

        Flash::success('Inventaris deleted successfully.');

        return redirect(route('inventaris.index'));
    }
}

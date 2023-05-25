<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembeliRequest;
use App\Http\Requests\UpdatePembeliRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PembeliRepository;
use Illuminate\Http\Request;
use Flash;

class PembeliController extends AppBaseController
{
    /** @var PembeliRepository $pembeliRepository*/
    private $pembeliRepository;

    public function __construct(PembeliRepository $pembeliRepo)
    {
        $this->pembeliRepository = $pembeliRepo;
    }

    /**
     * Display a listing of the Pembeli.
     */
    public function index(Request $request)
    {
        $pembelis = $this->pembeliRepository->paginate(10);

        return view('pembelis.index')
            ->with('pembelis', $pembelis);
    }

    /**
     * Show the form for creating a new Pembeli.
     */
    public function create()
    {
        return view('pembelis.create');
    }

    /**
     * Store a newly created Pembeli in storage.
     */
    public function store(CreatePembeliRequest $request)
    {
        $input = $request->all();

        $pembeli = $this->pembeliRepository->create($input);

        Flash::success('Pembeli saved successfully.');

        return redirect(route('pembelis.index'));
    }

    /**
     * Display the specified Pembeli.
     */
    public function show($id)
    {
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        return view('pembelis.show')->with('pembeli', $pembeli);
    }

    /**
     * Show the form for editing the specified Pembeli.
     */
    public function edit($id)
    {
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        return view('pembelis.edit')->with('pembeli', $pembeli);
    }

    /**
     * Update the specified Pembeli in storage.
     */
    public function update($id, UpdatePembeliRequest $request)
    {
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        $pembeli = $this->pembeliRepository->update($request->all(), $id);

        Flash::success('Pembeli updated successfully.');

        return redirect(route('pembelis.index'));
    }

    /**
     * Remove the specified Pembeli from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        $this->pembeliRepository->delete($id);

        Flash::success('Pembeli deleted successfully.');

        return redirect(route('pembelis.index'));
    }
}

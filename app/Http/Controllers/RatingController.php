<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RatingController extends AppBaseController
{
    /** @var RatingRepository $ratingRepository*/
    private $ratingRepository;

    public function __construct(RatingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * Display a listing of the Rating.
     */
    public function index(Request $request)
    {
        $ratings = $this->ratingRepository->paginate(10);

        return view('ratings.index')
            ->with('ratings', $ratings);
    }

    /**
     * Show the form for creating a new Rating.
     */
    public function create()
    {
        return view('ratings.create');
    }

    /**
     * Store a newly created Rating in storage.
     */
    public function store(CreateRatingRequest $request)
    {
        $input = $request->all();

        $rating = $this->ratingRepository->create($input);

        Flash::success('Rating saved successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Display the specified Rating.
     */
    public function show($id)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.show')->with('rating', $rating);
    }

    /**
     * Show the form for editing the specified Rating.
     */
    public function edit($id)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.edit')->with('rating', $rating);
    }

    /**
     * Update the specified Rating in storage.
     */
    public function update($id, UpdateRatingRequest $request)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $rating = $this->ratingRepository->update($request->all(), $id);

        Flash::success('Rating updated successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Remove the specified Rating from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $this->ratingRepository->delete($id);

        Flash::success('Rating deleted successfully.');

        return redirect(route('ratings.index'));
    }
}

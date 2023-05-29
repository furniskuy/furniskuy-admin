<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRatingAPIRequest;
use App\Http\Requests\API\UpdateRatingAPIRequest;
use App\Models\Rating;
use App\Repositories\RatingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RatingResource;

/**
 * Class RatingController
 */

class RatingAPIController extends AppBaseController
{
    /** @var  RatingRepository */
    private $ratingRepository;

    public function __construct(RatingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * @OA\Get(
     *      path="/ratings",
     *      summary="getRatingList",
     *      tags={"Rating"},
     *      description="Get all Ratings",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Rating")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $ratings = $this->ratingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RatingResource::collection($ratings), 'Ratings retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/ratings",
     *      summary="createRating",
     *      tags={"Rating"},
     *      description="Create Rating",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Rating")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Rating"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRatingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $rating = $this->ratingRepository->create($input);

        return $this->sendResponse(new RatingResource($rating), 'Rating saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/ratings/{id}",
     *      summary="getRatingItem",
     *      tags={"Rating"},
     *      description="Get Rating",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Rating",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Rating"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var Rating $rating */
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        return $this->sendResponse(new RatingResource($rating), 'Rating retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/ratings/{id}",
     *      summary="updateRating",
     *      tags={"Rating"},
     *      description="Update Rating",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Rating",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Rating")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/Rating"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRatingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Rating $rating */
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        $rating = $this->ratingRepository->update($input, $id);

        return $this->sendResponse(new RatingResource($rating), 'Rating updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/ratings/{id}",
     *      summary="deleteRating",
     *      tags={"Rating"},
     *      description="Delete Rating",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Rating",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var Rating $rating */
        $rating = $this->ratingRepository->find($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        $rating->delete();

        return $this->sendSuccess('Rating deleted successfully');
    }
}

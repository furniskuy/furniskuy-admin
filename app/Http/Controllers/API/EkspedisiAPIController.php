<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEkspedisiAPIRequest;
use App\Http\Requests\API\UpdateEkspedisiAPIRequest;
use App\Models\Ekspedisi;
use App\Repositories\EkspedisiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\EkspedisiResource;

/**
 * Class EkspedisiController
 */

class EkspedisiAPIController extends AppBaseController
{
    /** @var  EkspedisiRepository */
    private $ekspedisiRepository;

    public function __construct(EkspedisiRepository $ekspedisiRepo)
    {
        $this->ekspedisiRepository = $ekspedisiRepo;
    }

    /**
     * @OA\Get(
     *      path="/ekspedisis",
     *      summary="getEkspedisiList",
     *      tags={"Ekspedisi"},
     *      description="Get all Ekspedisi",
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
     *                  @OA\Items(ref="#/components/schemas/Ekspedisi")
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
        $ekspedisis = $this->ekspedisiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(EkspedisiResource::collection($ekspedisis), 'Ekspedisi retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/ekspedisis",
     *      summary="createEkspedisi",
     *      tags={"Ekspedisi"},
     *      description="Create Ekspedisi",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ekspedisi")
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
     *                  ref="#/components/schemas/Ekspedisi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEkspedisiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $ekspedisi = $this->ekspedisiRepository->create($input);

        return $this->sendResponse(new EkspedisiResource($ekspedisi), 'Ekspedisi saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/ekspedisis/{id}",
     *      summary="getEkspedisiItem",
     *      tags={"Ekspedisi"},
     *      description="Get Ekspedisi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ekspedisi",
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
     *                  ref="#/components/schemas/Ekspedisi"
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
        /** @var Ekspedisi $ekspedisi */
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            return $this->sendError('Ekspedisi not found');
        }

        return $this->sendResponse(new EkspedisiResource($ekspedisi), 'Ekspedisi retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/ekspedisis/{id}",
     *      summary="updateEkspedisi",
     *      tags={"Ekspedisi"},
     *      description="Update Ekspedisi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ekspedisi",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Ekspedisi")
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
     *                  ref="#/components/schemas/Ekspedisi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEkspedisiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Ekspedisi $ekspedisi */
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            return $this->sendError('Ekspedisi not found');
        }

        $ekspedisi = $this->ekspedisiRepository->update($input, $id);

        return $this->sendResponse(new EkspedisiResource($ekspedisi), 'Ekspedisi updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/ekspedisis/{id}",
     *      summary="deleteEkspedisi",
     *      tags={"Ekspedisi"},
     *      description="Delete Ekspedisi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Ekspedisi",
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
        /** @var Ekspedisi $ekspedisi */
        $ekspedisi = $this->ekspedisiRepository->find($id);

        if (empty($ekspedisi)) {
            return $this->sendError('Ekspedisi not found');
        }

        $ekspedisi->delete();

        return $this->sendSuccess('Ekspedisi deleted successfully');
    }
}

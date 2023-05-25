<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePembeliAPIRequest;
use App\Http\Requests\API\UpdatePembeliAPIRequest;
use App\Models\Pembeli;
use App\Repositories\PembeliRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PembeliResource;

/**
 * Class PembeliController
 */

class PembeliAPIController extends AppBaseController
{
    /** @var  PembeliRepository */
    private $pembeliRepository;

    public function __construct(PembeliRepository $pembeliRepo)
    {
        $this->pembeliRepository = $pembeliRepo;
    }

    /**
     * @OA\Get(
     *      path="/pembelis",
     *      summary="getPembeliList",
     *      tags={"Pembeli"},
     *      description="Get all Pembeli",
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
     *                  @OA\Items(ref="#/components/schemas/Pembeli")
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
        $pembelis = $this->pembeliRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PembeliResource::collection($pembelis), 'Pembeli retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/pembelis",
     *      summary="createPembeli",
     *      tags={"Pembeli"},
     *      description="Create Pembeli",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pembeli")
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
     *                  ref="#/components/schemas/Pembeli"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePembeliAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pembeli = $this->pembeliRepository->create($input);

        return $this->sendResponse(new PembeliResource($pembeli), 'Pembeli saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/pembelis/{id}",
     *      summary="getPembeliItem",
     *      tags={"Pembeli"},
     *      description="Get Pembeli",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pembeli",
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
     *                  ref="#/components/schemas/Pembeli"
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
        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        return $this->sendResponse(new PembeliResource($pembeli), 'Pembeli retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/pembelis/{id}",
     *      summary="updatePembeli",
     *      tags={"Pembeli"},
     *      description="Update Pembeli",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pembeli",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pembeli")
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
     *                  ref="#/components/schemas/Pembeli"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePembeliAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        $pembeli = $this->pembeliRepository->update($input, $id);

        return $this->sendResponse(new PembeliResource($pembeli), 'Pembeli updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/pembelis/{id}",
     *      summary="deletePembeli",
     *      tags={"Pembeli"},
     *      description="Delete Pembeli",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pembeli",
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
        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->find($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        $pembeli->delete();

        return $this->sendSuccess('Pembeli deleted successfully');
    }
}

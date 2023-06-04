<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMetodePembayaranAPIRequest;
use App\Http\Requests\API\UpdateMetodePembayaranAPIRequest;
use App\Models\MetodePembayaran;
use App\Repositories\MetodePembayaranRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MetodePembayaranResource;

/**
 * Class MetodePembayaranController
 */

class MetodePembayaranAPIController extends AppBaseController
{
    /** @var  MetodePembayaranRepository */
    private $metodePembayaranRepository;

    public function __construct(MetodePembayaranRepository $metodePembayaranRepo)
    {
        $this->metodePembayaranRepository = $metodePembayaranRepo;
    }

    /**
     * @OA\Get(
     *      path="/metode-pembayarans",
     *      summary="getMetodePembayaranList",
     *      tags={"MetodePembayaran"},
     *      description="Get all MetodePembayarans",
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
     *                  @OA\Items(ref="#/components/schemas/MetodePembayaran")
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
        $metodePembayarans = $this->metodePembayaranRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MetodePembayaranResource::collection($metodePembayarans), 'Metode Pembayarans retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/metode-pembayarans",
     *      summary="createMetodePembayaran",
     *      tags={"MetodePembayaran"},
     *      description="Create MetodePembayaran",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MetodePembayaran")
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
     *                  ref="#/components/schemas/MetodePembayaran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMetodePembayaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $metodePembayaran = $this->metodePembayaranRepository->create($input);

        return $this->sendResponse(new MetodePembayaranResource($metodePembayaran), 'Metode Pembayaran saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/metode-pembayarans/{id}",
     *      summary="getMetodePembayaranItem",
     *      tags={"MetodePembayaran"},
     *      description="Get MetodePembayaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MetodePembayaran",
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
     *                  ref="#/components/schemas/MetodePembayaran"
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
        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        return $this->sendResponse(new MetodePembayaranResource($metodePembayaran), 'Metode Pembayaran retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/metode-pembayarans/{id}",
     *      summary="updateMetodePembayaran",
     *      tags={"MetodePembayaran"},
     *      description="Update MetodePembayaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MetodePembayaran",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MetodePembayaran")
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
     *                  ref="#/components/schemas/MetodePembayaran"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMetodePembayaranAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        $metodePembayaran = $this->metodePembayaranRepository->update($input, $id);

        return $this->sendResponse(new MetodePembayaranResource($metodePembayaran), 'MetodePembayaran updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/metode-pembayarans/{id}",
     *      summary="deleteMetodePembayaran",
     *      tags={"MetodePembayaran"},
     *      description="Delete MetodePembayaran",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MetodePembayaran",
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
        /** @var MetodePembayaran $metodePembayaran */
        $metodePembayaran = $this->metodePembayaranRepository->find($id);

        if (empty($metodePembayaran)) {
            return $this->sendError('Metode Pembayaran not found');
        }

        $metodePembayaran->delete();

        return $this->sendSuccess('Metode Pembayaran deleted successfully');
    }
}

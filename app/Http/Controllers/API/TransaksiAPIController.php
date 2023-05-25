<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiAPIRequest;
use App\Http\Requests\API\UpdateTransaksiAPIRequest;
use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TransaksiResource;

/**
 * Class TransaksiController
 */

class TransaksiAPIController extends AppBaseController
{
    /** @var  TransaksiRepository */
    private $transaksiRepository;

    public function __construct(TransaksiRepository $transaksiRepo)
    {
        $this->transaksiRepository = $transaksiRepo;
    }

    /**
     * @OA\Get(
     *      path="/transaksis",
     *      summary="getTransaksiList",
     *      tags={"Transaksi"},
     *      description="Get all Transaksis",
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
     *                  @OA\Items(ref="#/components/schemas/Transaksi")
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
        $transaksis = $this->transaksiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TransaksiResource::collection($transaksis), 'Transaksis retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/transaksis",
     *      summary="createTransaksi",
     *      tags={"Transaksi"},
     *      description="Create Transaksi",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Transaksi")
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
     *                  ref="#/components/schemas/Transaksi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTransaksiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $transaksi = $this->transaksiRepository->create($input);

        return $this->sendResponse(new TransaksiResource($transaksi), 'Transaksi saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/transaksis/{id}",
     *      summary="getTransaksiItem",
     *      tags={"Transaksi"},
     *      description="Get Transaksi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Transaksi",
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
     *                  ref="#/components/schemas/Transaksi"
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
        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        return $this->sendResponse(new TransaksiResource($transaksi), 'Transaksi retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/transaksis/{id}",
     *      summary="updateTransaksi",
     *      tags={"Transaksi"},
     *      description="Update Transaksi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Transaksi",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Transaksi")
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
     *                  ref="#/components/schemas/Transaksi"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTransaksiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        $transaksi = $this->transaksiRepository->update($input, $id);

        return $this->sendResponse(new TransaksiResource($transaksi), 'Transaksi updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/transaksis/{id}",
     *      summary="deleteTransaksi",
     *      tags={"Transaksi"},
     *      description="Delete Transaksi",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Transaksi",
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
        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->find($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        $transaksi->delete();

        return $this->sendSuccess('Transaksi deleted successfully');
    }
}

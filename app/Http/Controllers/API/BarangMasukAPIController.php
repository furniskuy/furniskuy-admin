<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangMasukAPIRequest;
use App\Http\Requests\API\UpdateBarangMasukAPIRequest;
use App\Models\BarangMasuk;
use App\Repositories\BarangMasukRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BarangMasukResource;

/**
 * Class BarangMasukController
 */

class BarangMasukAPIController extends AppBaseController
{
    /** @var  BarangMasukRepository */
    private $barangMasukRepository;

    public function __construct(BarangMasukRepository $barangMasukRepo)
    {
        $this->barangMasukRepository = $barangMasukRepo;
    }

    /**
     * @OA\Get(
     *      path="/barang-masuks",
     *      summary="getBarangMasukList",
     *      tags={"BarangMasuk"},
     *      description="Get all BarangMasuks",
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
     *                  @OA\Items(ref="#/components/schemas/BarangMasuk")
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
        $barangMasuks = $this->barangMasukRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BarangMasukResource::collection($barangMasuks), 'Barang Masuk retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/barang-masuks",
     *      summary="createBarangMasuk",
     *      tags={"BarangMasuk"},
     *      description="Create BarangMasuk",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/BarangMasuk")
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
     *                  ref="#/components/schemas/BarangMasuk"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBarangMasukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $barangMasuk = $this->barangMasukRepository->create($input);

        return $this->sendResponse(new BarangMasukResource($barangMasuk), 'Barang Masuk saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/barang-masuks/{id}",
     *      summary="getBarangMasukItem",
     *      tags={"BarangMasuk"},
     *      description="Get BarangMasuk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangMasuk",
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
     *                  ref="#/components/schemas/BarangMasuk"
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
        /** @var BarangMasuk $barangMasuk */
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            return $this->sendError('Barang Masuk not found');
        }

        return $this->sendResponse(new BarangMasukResource($barangMasuk), 'Barang Masuk retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/barang-masuks/{id}",
     *      summary="updateBarangMasuk",
     *      tags={"BarangMasuk"},
     *      description="Update BarangMasuk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangMasuk",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/BarangMasuk")
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
     *                  ref="#/components/schemas/BarangMasuk"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBarangMasukAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var BarangMasuk $barangMasuk */
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            return $this->sendError('Barang Masuk not found');
        }

        $barangMasuk = $this->barangMasukRepository->update($input, $id);

        return $this->sendResponse(new BarangMasukResource($barangMasuk), 'BarangMasuk updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/barang-masuks/{id}",
     *      summary="deleteBarangMasuk",
     *      tags={"BarangMasuk"},
     *      description="Delete BarangMasuk",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangMasuk",
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
        /** @var BarangMasuk $barangMasuk */
        $barangMasuk = $this->barangMasukRepository->find($id);

        if (empty($barangMasuk)) {
            return $this->sendError('Barang Masuk not found');
        }

        $barangMasuk->delete();

        return $this->sendSuccess('Barang Masuk deleted successfully');
    }
}

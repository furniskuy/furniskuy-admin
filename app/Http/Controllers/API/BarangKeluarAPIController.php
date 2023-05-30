<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangKeluarAPIRequest;
use App\Http\Requests\API\UpdateBarangKeluarAPIRequest;
use App\Models\BarangKeluar;
use App\Repositories\BarangKeluarRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BarangKeluarResource;

/**
 * Class BarangKeluarController
 */

class BarangKeluarAPIController extends AppBaseController
{
    /** @var  BarangKeluarRepository */
    private $barangKeluarRepository;

    public function __construct(BarangKeluarRepository $barangKeluarRepo)
    {
        $this->barangKeluarRepository = $barangKeluarRepo;
    }

    /**
     * @OA\Get(
     *      path="/barang-keluars",
     *      summary="getBarangKeluarList",
     *      tags={"BarangKeluar"},
     *      description="Get all BarangKeluars",
     *      @OA\Parameter(
     *          name="skip",
     *          in="query",
     *          description="skip",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int32"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="limit",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int32"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="search",
     *          in="query",
     *          description="search",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              format="int32"
     *          )
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
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/BarangKeluar")
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
        $barangKeluars = $this->barangKeluarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BarangKeluarResource::collection($barangKeluars), 'Barang Keluar retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/barang-keluars",
     *      summary="createBarangKeluar",
     *      tags={"BarangKeluar"},
     *      description="Create BarangKeluar",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/BarangKeluar")
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
     *                  ref="#/components/schemas/BarangKeluar"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBarangKeluarAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $barangKeluar = $this->barangKeluarRepository->create($input);

        return $this->sendResponse(new BarangKeluarResource($barangKeluar), 'Barang Keluar saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/barang-keluars/{id}",
     *      summary="getBarangKeluarItem",
     *      tags={"BarangKeluar"},
     *      description="Get BarangKeluar",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangKeluar",
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
     *                  ref="#/components/schemas/BarangKeluar"
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
        /** @var BarangKeluar $barangKeluar */
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            return $this->sendError('Barang Keluar not found');
        }

        return $this->sendResponse(new BarangKeluarResource($barangKeluar), 'Barang Keluar retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/barang-keluars/{id}",
     *      summary="updateBarangKeluar",
     *      tags={"BarangKeluar"},
     *      description="Update BarangKeluar",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangKeluar",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/BarangKeluar")
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
     *                  ref="#/components/schemas/BarangKeluar"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBarangKeluarAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var BarangKeluar $barangKeluar */
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            return $this->sendError('Barang Keluar not found');
        }

        $barangKeluar = $this->barangKeluarRepository->update($input, $id);

        return $this->sendResponse(new BarangKeluarResource($barangKeluar), 'BarangKeluar updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/barang-keluars/{id}",
     *      summary="deleteBarangKeluar",
     *      tags={"BarangKeluar"},
     *      description="Delete BarangKeluar",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of BarangKeluar",
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
        /** @var BarangKeluar $barangKeluar */
        $barangKeluar = $this->barangKeluarRepository->find($id);

        if (empty($barangKeluar)) {
            return $this->sendError('Barang Keluar not found');
        }

        $barangKeluar->delete();

        return $this->sendSuccess('Barang Keluar deleted successfully');
    }
}

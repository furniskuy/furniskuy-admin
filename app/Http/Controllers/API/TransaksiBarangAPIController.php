<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiBarangAPIRequest;
use App\Http\Requests\API\UpdateTransaksiBarangAPIRequest;
use App\Models\TransaksiBarang;
use App\Repositories\TransaksiBarangRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TransaksiBarangResource;

/**
 * Class TransaksiBarangController
 */

class TransaksiBarangAPIController extends AppBaseController
{
    /** @var  TransaksiBarangRepository */
    private $transaksiBarangRepository;

    public function __construct(TransaksiBarangRepository $transaksiBarangRepo)
    {
        $this->transaksiBarangRepository = $transaksiBarangRepo;
    }

    /**
     * @OA\Get(
     *      path="/transaksi-barangs",
     *      summary="getTransaksiBarangList",
     *      tags={"TransaksiBarang"},
     *      description="Get all TransaksiBarangs",
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
     *                  @OA\Items(ref="#/components/schemas/TransaksiBarang")
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
        $transaksiBarangs = $this->transaksiBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TransaksiBarangResource::collection($transaksiBarangs), 'Transaksi Barangs retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/transaksi-barangs",
     *      summary="createTransaksiBarang",
     *      tags={"TransaksiBarang"},
     *      description="Create TransaksiBarang",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/TransaksiBarang")
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
     *                  ref="#/components/schemas/TransaksiBarang"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTransaksiBarangAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $transaksiBarang = $this->transaksiBarangRepository->create($input);

        return $this->sendResponse(new TransaksiBarangResource($transaksiBarang), 'Transaksi Barang saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/transaksi-barangs/{id}",
     *      summary="getTransaksiBarangItem",
     *      tags={"TransaksiBarang"},
     *      description="Get TransaksiBarang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TransaksiBarang",
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
     *                  ref="#/components/schemas/TransaksiBarang"
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
        /** @var TransaksiBarang $transaksiBarang */
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            return $this->sendError('Transaksi Barang not found');
        }

        return $this->sendResponse(new TransaksiBarangResource($transaksiBarang), 'Transaksi Barang retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/transaksi-barangs/{id}",
     *      summary="updateTransaksiBarang",
     *      tags={"TransaksiBarang"},
     *      description="Update TransaksiBarang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TransaksiBarang",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/TransaksiBarang")
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
     *                  ref="#/components/schemas/TransaksiBarang"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTransaksiBarangAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TransaksiBarang $transaksiBarang */
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            return $this->sendError('Transaksi Barang not found');
        }

        $transaksiBarang = $this->transaksiBarangRepository->update($input, $id);

        return $this->sendResponse(new TransaksiBarangResource($transaksiBarang), 'TransaksiBarang updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/transaksi-barangs/{id}",
     *      summary="deleteTransaksiBarang",
     *      tags={"TransaksiBarang"},
     *      description="Delete TransaksiBarang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TransaksiBarang",
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
        /** @var TransaksiBarang $transaksiBarang */
        $transaksiBarang = $this->transaksiBarangRepository->find($id);

        if (empty($transaksiBarang)) {
            return $this->sendError('Transaksi Barang not found');
        }

        $transaksiBarang->delete();

        return $this->sendSuccess('Transaksi Barang deleted successfully');
    }
}

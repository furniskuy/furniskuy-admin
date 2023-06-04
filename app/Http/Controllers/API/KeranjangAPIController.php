<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeranjangAPIRequest;
use App\Http\Requests\API\UpdateKeranjangAPIRequest;
use App\Models\Keranjang;
use App\Repositories\KeranjangRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\KeranjangResource;

/**
 * Class KeranjangController
 */

class KeranjangAPIController extends AppBaseController
{
    /** @var  KeranjangRepository */
    private $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepo)
    {
        $this->keranjangRepository = $keranjangRepo;
    }

    /**
     * @OA\Get(
     *      path="/keranjangs",
     *      summary="getKeranjangList",
     *      tags={"Keranjang"},
     *      description="Get all Keranjangs",
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
     *                  @OA\Items(ref="#/components/schemas/Keranjang")
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
        $keranjangs = $this->keranjangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(KeranjangResource::collection($keranjangs), 'Keranjangs retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/keranjangs",
     *      summary="createKeranjang",
     *      tags={"Keranjang"},
     *      description="Create Keranjang",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Keranjang")
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
     *                  ref="#/components/schemas/Keranjang"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKeranjangAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['id_pembeli'] = $request->user()->id;

        $keranjang = $this->keranjangRepository->createOrAdd($input);

        return $this->sendResponse(new KeranjangResource($keranjang), 'Keranjang saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/keranjangs/{id}",
     *      summary="getKeranjangItem",
     *      tags={"Keranjang"},
     *      description="Get Keranjang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Keranjang",
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
     *                  ref="#/components/schemas/Keranjang"
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
        /** @var Keranjang $keranjang */
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            return $this->sendError('Keranjang not found');
        }

        return $this->sendResponse(new KeranjangResource($keranjang), 'Keranjang retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/keranjangs/{id}",
     *      summary="updateKeranjang",
     *      tags={"Keranjang"},
     *      description="Update Keranjang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Keranjang",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Keranjang")
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
     *                  ref="#/components/schemas/Keranjang"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKeranjangAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Keranjang $keranjang */
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            return $this->sendError('Keranjang not found');
        }

        $keranjang = $this->keranjangRepository->update($input, $id);

        return $this->sendResponse(new KeranjangResource($keranjang), 'Keranjang updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/keranjangs/{id}",
     *      summary="deleteKeranjang",
     *      tags={"Keranjang"},
     *      description="Delete Keranjang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Keranjang",
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
        /** @var Keranjang $keranjang */
        $keranjang = $this->keranjangRepository->find($id);

        if (empty($keranjang)) {
            return $this->sendError('Keranjang not found');
        }

        $keranjang->delete();

        return $this->sendResponse($keranjang, 'Keranjang deleted successfully');
    }


    /**
     * @OA\Get(
     *      path="/keranjangs/user",
     *      summary="kerangjangUser",
     *      tags={"Keranjang"},
     *      description="Keranjang User",
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
     *                  @OA\Items(ref="#/components/schemas/Keranjang")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function keranjangUser(Request $request): JsonResponse
    {
        $keranjang = $this->keranjangRepository->keranjangUser($request->user()->id);

        return $this->sendResponse($keranjang, 'Keranjang retrieved successfully');
    }

    /**
     * @OA\Get(
     *      path="/keranjangs/checkout",
     *      summary="checkoutKeranjang",
     *      tags={"Keranjang"},
     *      description="Checkout Keranjang",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Keranjang",
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
     *                  ref="#/components/schemas/Keranjang"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function checkout(Request $request)
    {
        $keranjang = $this->keranjangRepository->checkout($request->user()->id, $request['metode_pembayaran']);

        return $this->sendResponse($keranjang, 'Checkout successfully');
    }
}

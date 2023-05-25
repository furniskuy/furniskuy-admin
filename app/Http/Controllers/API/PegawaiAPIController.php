<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePegawaiAPIRequest;
use App\Http\Requests\API\UpdatePegawaiAPIRequest;
use App\Models\Pegawai;
use App\Repositories\PegawaiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PegawaiResource;

/**
 * Class PegawaiController
 */

class PegawaiAPIController extends AppBaseController
{
    /** @var  PegawaiRepository */
    private $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepo)
    {
        $this->pegawaiRepository = $pegawaiRepo;
    }

    /**
     * @OA\Get(
     *      path="/pegawais",
     *      summary="getPegawaiList",
     *      tags={"Pegawai"},
     *      description="Get all Pegawai",
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
     *                  @OA\Items(ref="#/components/schemas/Pegawai")
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
        $pegawais = $this->pegawaiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PegawaiResource::collection($pegawais), 'Pegawai retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/pegawais",
     *      summary="createPegawai",
     *      tags={"Pegawai"},
     *      description="Create Pegawai",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pegawai")
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
     *                  ref="#/components/schemas/Pegawai"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePegawaiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pegawai = $this->pegawaiRepository->create($input);

        return $this->sendResponse(new PegawaiResource($pegawai), 'Pegawai saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/pegawais/{id}",
     *      summary="getPegawaiItem",
     *      tags={"Pegawai"},
     *      description="Get Pegawai",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pegawai",
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
     *                  ref="#/components/schemas/Pegawai"
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
        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        return $this->sendResponse(new PegawaiResource($pegawai), 'Pegawai retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/pegawais/{id}",
     *      summary="updatePegawai",
     *      tags={"Pegawai"},
     *      description="Update Pegawai",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pegawai",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Pegawai")
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
     *                  ref="#/components/schemas/Pegawai"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePegawaiAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        $pegawai = $this->pegawaiRepository->update($input, $id);

        return $this->sendResponse(new PegawaiResource($pegawai), 'Pegawai updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/pegawais/{id}",
     *      summary="deletePegawai",
     *      tags={"Pegawai"},
     *      description="Delete Pegawai",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Pegawai",
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
        /** @var Pegawai $pegawai */
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            return $this->sendError('Pegawai not found');
        }

        $pegawai->delete();

        return $this->sendSuccess('Pegawai deleted successfully');
    }
}

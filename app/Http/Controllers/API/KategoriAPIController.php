<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKategoriAPIRequest;
use App\Http\Requests\API\UpdateKategoriAPIRequest;
use App\Models\Kategori;
use App\Repositories\KategoriRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\KategoriResource;

/**
 * Class KategoriController
 */

class KategoriAPIController extends AppBaseController
{
    /** @var  KategoriRepository */
    private $kategoriRepository;

    public function __construct(KategoriRepository $kategoriRepo)
    {
        $this->kategoriRepository = $kategoriRepo;
    }

    /**
     * @OA\Get(
     *      path="/kategoris",
     *      summary="getKategoriList",
     *      tags={"Kategori"},
     *      description="Get all Kategoris",
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
     *                  @OA\Items(ref="#/components/schemas/Kategori")
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
        $kategoris = $this->kategoriRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(KategoriResource::collection($kategoris), 'Kategoris retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/kategoris",
     *      summary="createKategori",
     *      tags={"Kategori"},
     *      description="Create Kategori",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Kategori")
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
     *                  ref="#/components/schemas/Kategori"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKategoriAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $kategori = $this->kategoriRepository->create($input);

        return $this->sendResponse(new KategoriResource($kategori), 'Kategori saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/kategoris/{id}",
     *      summary="getKategoriItem",
     *      tags={"Kategori"},
     *      description="Get Kategori",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kategori",
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
     *                  ref="#/components/schemas/Kategori"
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
        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        return $this->sendResponse(new KategoriResource($kategori), 'Kategori retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/kategoris/{id}",
     *      summary="updateKategori",
     *      tags={"Kategori"},
     *      description="Update Kategori",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kategori",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Kategori")
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
     *                  ref="#/components/schemas/Kategori"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKategoriAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        $kategori = $this->kategoriRepository->update($input, $id);

        return $this->sendResponse(new KategoriResource($kategori), 'Kategori updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/kategoris/{id}",
     *      summary="deleteKategori",
     *      tags={"Kategori"},
     *      description="Delete Kategori",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Kategori",
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
        /** @var Kategori $kategori */
        $kategori = $this->kategoriRepository->find($id);

        if (empty($kategori)) {
            return $this->sendError('Kategori not found');
        }

        $kategori->delete();

        return $this->sendSuccess('Kategori deleted successfully');
    }
}

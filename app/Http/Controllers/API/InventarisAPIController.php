<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInventarisAPIRequest;
use App\Http\Requests\API\UpdateInventarisAPIRequest;
use App\Models\Inventaris;
use App\Repositories\InventarisRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\InventarisResource;
use Illuminate\Support\Facades\Http;

/**
 * Class InventarisController
 */

class InventarisAPIController extends AppBaseController
{
    /** @var  InventarisRepository */
    private $inventarisRepository;

    public function __construct(InventarisRepository $inventarisRepo)
    {
        $this->inventarisRepository = $inventarisRepo;
    }

    /**
     * @OA\Get(
     *      path="/inventaris",
     *      summary="getInventarisList",
     *      tags={"Inventaris"},
     *      description="Get all Inventaris",
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
     *                  @OA\Items(ref="#/components/schemas/Inventaris")
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
        $inventaris = $this->inventarisRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(InventarisResource::collection($inventaris), 'Inventaris retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/inventaris",
     *      summary="createInventaris",
     *      tags={"Inventaris"},
     *      description="Create Inventaris",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Inventaris")
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
     *                  ref="#/components/schemas/Inventaris"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInventarisAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $fileContent = file_get_contents($image->getRealPath());

            $response = Http::withHeaders([
                'Content-Type' => 'application/octet-stream',
                'Authorization' => 'Bearer ' . env("SUPABASE_KEY"),
            ])->attach(
                'file',
                $fileContent,
                $fileName
            )->post(env("SUPABASE_URL")."/storage/v1/object/{furniskuy}/public/uploads/{$fileName}");

            // Check if the upload was successful
            if ($response->failed()) {
                // Handle error
                return redirect()->back()->with('error', 'Failed to upload image.');
            }

            // Get the URL of the uploaded image
            $imageUrl = $response->json('publicURL');

            $this->inventarisRepository->model->image=$imageUrl;
        }

        $inventaris = $this->inventarisRepository->create($input);

        return $this->sendResponse(new InventarisResource($inventaris), 'Inventaris saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/inventaris/{id}",
     *      summary="getInventarisItem",
     *      tags={"Inventaris"},
     *      description="Get Inventaris",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inventaris",
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
     *                  ref="#/components/schemas/Inventaris"
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
        /** @var Inventaris $inventaris */
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            return $this->sendError('Inventaris not found');
        }

        return $this->sendResponse(new InventarisResource($inventaris), 'Inventaris retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/inventaris/{id}",
     *      summary="updateInventaris",
     *      tags={"Inventaris"},
     *      description="Update Inventaris",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inventaris",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Inventaris")
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
     *                  ref="#/components/schemas/Inventaris"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInventarisAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Inventaris $inventaris */
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            return $this->sendError('Inventaris not found');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $fileContent = file_get_contents($image->getRealPath());

            $deleteResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . env("SUPABASE_KEY"),
            ])->attach(
                'file',
                $fileContent,
                $fileName
            )->delete(env("SUPABASE_URL")."/storage/v1/object/{furniskuy}/public/uploads/{$fileName}");

            // Check if the upload was successful
            if ($deleteResponse->failed()) {
                // Handle error
                return redirect()->back()->with('error', 'Failed to update image.');
            }

            $updateResponse = Http::withHeaders([
                'Content-Type' => 'application/octet-stream',
                'Authorization' => 'Bearer ' . env("SUPABASE_KEY"),
            ])->post(env("SUPABASE_URL")."/storage/v1/object/{furniskuy}/public/uploads/{$fileName}");

            // Check if the upload was successful
            if ($updateResponse->failed()) {
                // Handle error
                return redirect()->back()->with('error', 'Failed to update image.');
            }


            // Get the URL of the uploaded image
            $imageUrl = $updateResponse->json('publicURL');

            $this->inventarisRepository->model->image=$imageUrl;
        }

        $inventaris = $this->inventarisRepository->update($input, $id);

        return $this->sendResponse(new InventarisResource($inventaris), 'Inventaris updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/inventaris/{id}",
     *      summary="deleteInventaris",
     *      tags={"Inventaris"},
     *      description="Delete Inventaris",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Inventaris",
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
        /** @var Inventaris $inventaris */
        $inventaris = $this->inventarisRepository->find($id);

        if (empty($inventaris)) {
            return $this->sendError('Inventaris not found');
        }

        $inventaris->delete();

        return $this->sendSuccess('Inventaris deleted successfully');
    }
}

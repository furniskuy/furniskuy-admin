<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

trait UploadImageTrait
{

    /**
     * Upload image to Supabase Storage
     * @param string $method
     * @param UploadedFile|UploadedFile[]|array|null $image
     */
    public function uploadImage($method, $image)
    {
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        $fileContent = file_get_contents($image->getRealPath());

        $response = Http::withHeaders([
            'Content-Type' => $image->getMimeType(),
            'Authorization' => 'Bearer ' . env("SUPABASE_KEY"),
        ])->withBody(
            $fileContent,
            $image->getMimeType()
        )->$method(env("SUPABASE_URL") . "/storage/v1/object/furniskuy/public/uploads/{$fileName}");

        return $response;
    }

    public function deleteImage($fileName)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env("SUPABASE_KEY"),
        ])->delete(env("SUPABASE_URL") . "/storage/v1/object/furniskuy/public/uploads/{$fileName}");

        return $response;
    }
}

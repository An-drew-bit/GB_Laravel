<?php

namespace App\Traits;

use App\Serveces\Contract\Upload;
use Illuminate\Foundation\Http\FormRequest;

trait Validated
{
    public function validated(FormRequest $request, Upload $upload, string $key, string $directory): mixed
    {
        $validated = $request->validated();

        if ($request->hasFile($key)) {
            $validated[$key] = $upload->uploadImage($request->file($key), $directory);
        }

        return $validated;
    }
}

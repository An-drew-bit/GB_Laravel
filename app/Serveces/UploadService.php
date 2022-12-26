<?php

declare(strict_types = 1);

namespace App\Serveces;

use App\Serveces\Contract\Upload;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $file, string $directory): string
    {
        $path = $file->storeAs($directory, $file->hashName(), 'upload');

        if (!$path) {
            throw new UploadException("File wasn't upload");
        }

        return $path;
    }
}

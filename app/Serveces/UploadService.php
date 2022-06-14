<?php

declare(strict_types = 1);

namespace App\Serveces;

use App\Serveces\Contract\Upload;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('news', $file->hashName(), 'upload');

        if (!$path) {
            throw new UploadException("File wasn't upload");
        }

        return $path;
    }
}

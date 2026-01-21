<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper
{
    /**
     * Upload an image to a specific folder
     */
    public static function upload(UploadedFile $file, string $folder): string
    {
        $dir = public_path($folder);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = uniqid() . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $filename);

        return $filename;
    }

    /**
     * Delete an image from a folder
     */
    public static function delete(?string $filename, string $folder): bool
    {
        if (!$filename) {
            return false;
        }

        $path = public_path($folder . '/' . $filename);

        if (file_exists($path)) {
            return unlink($path);
        }

        return false;
    }

    /**
     * Get full image URL
     */
    public static function url(?string $filename, string $folder): ?string
    {
        return $filename ? $folder . '/' . $filename : null;
    }
}


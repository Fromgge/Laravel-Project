<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileStorageService implements Contracts\FileStorageServiceContract
{

    public static function upload(string|UploadedFile $file, string $additionPath = ''): string
    {
        if (is_string($file)) {
            return str_replace('public/storage', '', $file);
        }

        $additionPath = !empty($additionPath) ? $additionPath . '/' : $additionPath;

        $filePath = "public/{$additionPath}" . static::randName() . '.' . $file->getClientOriginalExtension();
        Storage::put($filePath, File::get($file));
        Storage::setVisibility($filePath, 'public');

        return $filePath;
    }

    public static function remove(string $file)
    {
        Storage::delete($file);
    }

    protected static function randName(): string
    {
        return Str::random() . '_' . time();
    }
}

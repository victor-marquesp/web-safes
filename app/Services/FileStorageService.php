<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileStorageService {

    public function store(UploadedFile $file, string $folder, string $disk) {

        return $file->store($folder, $disk);

    }

    public function update(string $path, string $disk, UploadedFile $file, string $folder) {

        Storage::disk($disk)->delete($path);

        return $file->store($folder, $disk);
    }

    public function delete(string $path, string $disk) {

        Storage::disk($disk)->delete($path);

    }

}
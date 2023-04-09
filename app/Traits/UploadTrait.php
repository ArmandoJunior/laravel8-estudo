<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    public function upload(UploadedFile $file, $folder): bool|string
    {
        return $file->store($folder, 'public');
    }

    public function multipleUploads(array $files, string $folder, string $column)
    {
        $uploadedFiles = [];

        foreach ($files as $file) {
            $uploadedFiles[] = [$column => $this->upload($file, $folder)];
        }

        return $uploadedFiles;
    }
}

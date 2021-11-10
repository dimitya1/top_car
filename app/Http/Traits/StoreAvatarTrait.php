<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait StoreAvatarTrait
{
    public function storeAvatar(UploadedFile $file, string $name): string
    {
        $date   = now()->format('Y-m-d_H-i-s');
        $ext    = $file->getClientOriginalExtension();

        $fileName = 'avatar'
            . '_' . Str::slug($name)
            . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '_' . $date
            . '.' . $ext;
        $fullPath = "uploads/avatars/$fileName";

        Storage::putFileAs("public/uploads/avatars", $file, $fileName);

        return $fullPath;
    }
}

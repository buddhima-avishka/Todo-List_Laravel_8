<?php

namespace domain\Services;

use App\Models\Image;

class ImageService
{
    protected $images;

    public function __construct()
    {
        $this->images = new Image();
    }

    public function storeToStorage($file)
    {
        $name = time() . '_' . $file->getClientOriginalName();
        $file->store('public/uploads');
        return $this->images->create([
            'name' => $name,
        ]);
    }

}

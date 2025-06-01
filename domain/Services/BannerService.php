<?php

namespace domain\Services;

use App\Models\Banner;
use domain\Facades\ImageFacade;

class BannerService
{
    protected $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }

    public function all()
    {
        return $this->banner->all();
    }

    public function allActive()
    {
        return $this->banner->allActive();
    }


    public function store($data)
    {
        if(isset($data['images'])){
            $image = ImageFacade::storeToStorage($data['images']);
            $data['image_id'] = $image->id;
        }
        $this->banner->create($data);
    }

    public function delete($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->delete();
    }

    public function done($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->done = 1;
        $banner->update();
    }
}

<?php

namespace Galleryzr\Galleries;

class GalleriesController
{
    /**
     * @var \Galleryzr\Galleries\Service\IGalleriesService
     */
    protected $galleriesService;

    /**
     * @param Service\IGalleriesService $galleriesService
     */
    public function __construct(\Galleryzr\Galleries\Service\IGalleriesService $galleriesService)
    {
        $this->galleriesService = $galleriesService;
    }

    /**
     * @param Request\Model\ICreateGalleryModel $model
     * @return array
     */
    public function create(\Galleryzr\Galleries\Request\Model\ICreateGalleryModel $model)
    {
        $gallery = $model->createGallery($this->galleriesService);
        return $gallery->toArray();
    }


}
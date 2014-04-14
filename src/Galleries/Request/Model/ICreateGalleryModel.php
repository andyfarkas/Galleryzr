<?php

namespace Galleryzr\Galleries\Request\Model;

interface ICreateGalleryModel extends \Afa\Framework\Request\IModel
{
    /**
     * @param \Galleryzr\Galleries\Service\IGalleriesService $galleriesService
     * @return \Galleryzr\Galleries\Entity\IGallery
     */
    public function createGallery(\Galleryzr\Galleries\Service\IGalleriesService $galleriesService);
}
<?php

namespace Galleryzr\Galleries\Request\Model;

class CreateGalleryModel extends \Afa\Framework\Request\Model\AbstractModel implements ICreateGalleryModel
{

    /**
     * @throws \Afa\Framework\Exception\BadRequestException
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }

    /**
     * @param \Galleryzr\Galleries\Service\IGalleriesService $galleriesService
     * @return \Galleryzr\Galleries\Entity\IGallery
     */
    public function createGallery(\Galleryzr\Galleries\Service\IGalleriesService $galleriesService)
    {
        return $galleriesService->createGallery(
            $this->request->get('name'),
            $this->request->get('userId')
        );
    }
}
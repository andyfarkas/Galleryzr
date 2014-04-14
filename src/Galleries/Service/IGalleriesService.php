<?php

namespace Galleryzr\Galleries\Service;

interface IGalleriesService
{
    /**
     * @param string $name
     * @param int $userOwnerId
     * @internal param $userId
     * @return \Galleryzr\Galleries\Entity\IGallery
     */
    public function createGallery($name, $userOwnerId);
}
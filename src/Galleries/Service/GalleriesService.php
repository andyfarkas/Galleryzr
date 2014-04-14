<?php

namespace Galleryzr\Galleries\Service;

class GalleriesService implements IGalleriesService
{

    /**
     * @var \Afa\Database\IRepository
     */
    protected $repository;

    /**
     * @param \Afa\Database\IRepository $repository
     */
    public function __construct(\Afa\Database\IRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @param int $userOwnerId
     * @internal param $userId
     * @return \Galleryzr\Galleries\Entity\IGallery
     */
    public function createGallery($name, $userOwnerId)
    {
        $result = $command = new \Afa\Database\Command\Insert('galleries', array(
            'name' => $name,
            'userId' => $userOwnerId,
        ));

        return new \Galleryzr\Galleries\Entity\Gallery(array(
            'name' => $name,
            'userId' => $userOwnerId,
            'id' => reset($result->current()),
        ));
    }
}

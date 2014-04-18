<?php

namespace Galleryzr\Images\Service;

class ImagesUploadService
{

    /**
     * @var \Afa\Database\IRepository
     */
    protected $repository;

    /**
     * @var ImagesStorage
     */
    protected $storage;

    /**
     * @param \Afa\Database\IRepository $repository
     * @param ImagesStorage $storage
     */
    public function __construct(\Afa\Database\IRepository $repository,
                                ImagesStorage $storage)
    {
        $this->repository = $repository;
        $this->storage = $storage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $uploadedFile
     * @return \Afa\Database\IEntity
     */
    public function handleImageUpload(\Symfony\Component\HttpFoundation\File\UploadedFile $uploadedFile)
    {
        $image = \Intervention\Image\Image::make($uploadedFile->getRealPath());
        $command = new \Galleryzr\Images\Command\NewImageCommand(array(
            'mime' => $uploadedFile->getClientMimeType(),
            'size' => $uploadedFile->getSize(),
            'filename' => $uploadedFile->getClientOriginalName(),
            'extension' => $uploadedFile->getClientOriginalExtension(),
            'width' => $image->width,
            'height' => $image->height,
        ));
        $result = $this->repository->execute($command);
        $newFileName = $result->current() . '.' . $uploadedFile->getClientOriginalExtension();
        $this->storage->saveUploadedFileAs($uploadedFile, $newFileName);
        $criteria = new \Galleryzr\Images\Criteria\ImageById($result->current());
        return $this->repository->findOne($criteria);
    }
}
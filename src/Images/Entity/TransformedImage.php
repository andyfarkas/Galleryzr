<?php

namespace Galleryzr\Images\Entity;

class TransformedImage
{
    /**
     * @var \Intervention\Image\Image
     */
    protected $imageObject;

    /**
     * @var \Symfony\Component\HttpFoundation\File\File
     */
    protected $imageFile;

    /**
     * @var Image
     */
    protected $imageEntity;

    public function __construct(\Intervention\Image\Image $imageObject,
                               \Symfony\Component\HttpFoundation\File\File $imageFile,
                                Image $imageEntity)
    {
        $this->imageObject = $imageObject;
        $this->imageFile = $imageFile;
        $this->imageEntity = $imageEntity;
    }

    public function prepareResponse(\Symfony\Component\HttpFoundation\Response $response)
    {
        $response->setContent($this->imageObject->encode($this->imageFile->getExtension()));
        $data = $this->imageEntity->toArray();
        $response->headers->set('Content-type', $data['mime']);
        return $response;
    }

}
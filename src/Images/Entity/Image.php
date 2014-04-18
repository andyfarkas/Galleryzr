<?php

namespace Galleryzr\Images\Entity;

class Image implements IImage
{

    /**
     * @var array
     */
    protected $data = array();

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param \Galleryzr\Images\Service\ImagesStorage $storage
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function findOriginalFile(\Galleryzr\Images\Service\ImagesStorage $storage)
    {
        return $storage->findFileByName($this->data['id'] . '.' . $this->data['extension']);
    }

    public function toArray()
    {
        return $this->data;
    }
}
<?php

namespace Galleryzr\Images\Service;

class ImagesStorage
{
    /**
     * @var string
     */
    protected $directory;

    /**
     * @param $directory
     */
    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $uploadedFile
     * @param string $filename
     * @return \Symfony\Component\HttpFoundation\File\File
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function saveUploadedFileAs(\Symfony\Component\HttpFoundation\File\UploadedFile $uploadedFile, $filename)
    {
        return $uploadedFile->move($this->directory, $filename);
    }

    /**
     * @param string $filename
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function findFileByName($filename)
    {
        return new \Symfony\Component\HttpFoundation\File\File($this->directory . '/' . $filename);
    }

    public function saveTransformedImage(\Intervention\Image\Image $image, $filename)
    {
        $filename = $this->directory . '/transformed/' . $filename;
        $image->save($filename);
        return new \Symfony\Component\HttpFoundation\File\File($filename);
    }

    /**
     * @param $filename
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function findTransformedImageByName($filename)
    {
        $filename = $this->directory . '/transformed/' . $filename;
        return new \Symfony\Component\HttpFoundation\File\File($filename);
    }

}
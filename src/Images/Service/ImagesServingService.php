<?php

namespace Galleryzr\Images\Service;

class ImagesServingService
{
    /**
     * @var \Afa\Database\IRepository
     */
    protected $repository;

    /**
     * @var \Galleryzr\Images\Transformation\TransformationParser
     */
    protected $transformationParser;

    /**
     * @var ImagesStorage
     */
    protected $imagesStorage;

    public function __construct(\Afa\Database\IRepository $repository,
                                \Galleryzr\Images\Transformation\TransformationParser $parser,
                                ImagesStorage $storage)
    {
        $this->repository = $repository;
        $this->transformationParser = $parser;
        $this->imagesStorage = $storage;
    }

    public function serveImage($id, $parameters)
    {
        $transformations = $this->transformationParser->fromString($parameters);
        $transformationStrings = implode('|', array_map(function(\Galleryzr\Images\Transformation\GrabTransformation $transformation){
            return $transformation->toString();
        }, $transformations));
        $criteria = new \Galleryzr\Images\Criteria\ImageById($id);
        $image = $this->repository->findOne($criteria); /** @var \Galleryzr\Images\Entity\Image $image */
        $imageData = $image->toArray();
        $trasformedFilename = sha1($id . $transformationStrings) . '.' . $imageData['extension'];

        try
        {
            $transformedImageFile = $this->imagesStorage->findTransformedImageByName($trasformedFilename);
            $transformedImage = \Intervention\Image\Image::make($transformedImageFile->getRealPath());
            return new \Galleryzr\Images\Entity\TransformedImage($transformedImage, $transformedImageFile, $image);
        }
        catch (\Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException $e)
        {

        }

        $imageFile = $image->findOriginalFile($this->imagesStorage);
        $imageObject = \Intervention\Image\Image::make($imageFile->getRealPath());
        foreach ($transformations as $transformation) /** @var \Galleryzr\Images\Transformation\GrabTransformation $transformation */
        {
            $transformation->applyTo($imageObject);
        }

        $this->imagesStorage->saveTransformedImage($imageObject, $trasformedFilename);
        return new \Galleryzr\Images\Entity\TransformedImage($imageObject, $imageFile, $image);
    }
}
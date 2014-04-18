<?php

namespace Galleryzr\Images;

class ImagesController
{

    /**
     * @var \Galleryzr\Images\Service\ImagesUploadService
     */
    protected $uploadService;

    /**
     * @var \Galleryzr\Images\Service\ImagesServingService
     */
    protected $imagesServingService;

    public function __construct(\Galleryzr\Images\Service\ImagesUploadService $service,
                                \Galleryzr\Images\Service\ImagesServingService $servingService)
    {
        $this->uploadService = $service;
        $this->imagesServingService = $servingService;
    }

    public function uploadImages(\Symfony\Component\HttpFoundation\Request $request)
    {
        $imagesDir = dirname(dirname(__DIR__)) . '/data';
        $imageData = array();
        foreach ($request->files as $file) /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
        {
            $image = $this->uploadService->handleImageUpload($file);
            $imageData[] = $image->toArray();
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse($imageData);
    }

    public function showImage($id, $params, $name)
    {
        $image = $this->imagesServingService->serveImage($id, $params);
        $response = new \Symfony\Component\HttpFoundation\Response(null, 200);
        $image->prepareResponse($response);
        $response->headers->set('Content-Disposition', 'inline; filename="'.$name.'"');
        return $response;
    }

}
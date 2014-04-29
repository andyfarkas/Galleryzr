<?php

namespace ImageServr;

class ImagesController
{

    public function showImage($id, $params, $name)
    {
        $path = dirname(__DIR__) . '/data/' . $id;

        if (!is_file($path))
        {
            throw new \Afa\Framework\Exception\NotFoundException('Requested image was not found');
        }

        $width = 100;
        $height = 100;

        $grabParams = array();
        if (preg_match('#g:([0-9]+)_([0-9]+)#', $params, $grabParams))
        {
            $width = $grabParams[1];
            $height = $grabParams[2];
        }

        $image = \Intervention\Image\Image::make($path);
        $image->grab($width,$height);

        if (strpos($params, 'w:') > 0)
        {
            $font = new \Intervention\Image\Font('Uploaded to: awesome.dev');
            $font->file(dirname(__DIR__) . '/data/PiratesBay.ttf' );
            $font->color('#000000');
            $font->size(20);
            $pointSize = $font->getPointSize();
            $fontSize = $font->getBoxSize();

            $image->textCallback('Uploaded to: awesome.dev', $image->width - $fontSize['width'], $image->height - 5, function(\Intervention\Image\Font $font)
            {
                $font->file(dirname(__DIR__) . '/data/PiratesBay.ttf' );
                $font->color('#000000');
                $font->size(20);
            });
        }

        $response = new \Symfony\Component\HttpFoundation\Response(null, 200);
        $response->headers->set('Content-type', $image->mime);
        $response->headers->set('Content-Disposition', 'inline; filename="'.$name.'"');
        $response->setContent($image->encode());
        return $response;
    }

}
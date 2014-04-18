<?php

namespace Galleryzr\Images\Transformation;

class GrabTransformation
{
    protected $width;

    protected $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function toString()
    {
        return sprintf('g:%d_%d', $this->width, $this->height);
    }

    public function applyTo(\Intervention\Image\Image $image)
    {
        $image->grab($this->width, $this->height);
    }

}

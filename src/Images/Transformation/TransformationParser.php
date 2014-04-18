<?php

namespace Galleryzr\Images\Transformation;

class TransformationParser
{
    public function fromString($string)
    {
        $matches = array();
        $transformations = array();
        if (preg_match('#g:([0-9]+)_([0-9]+)#', $string, $matches))
        {
            $transformations[] = new GrabTransformation($matches[1], $matches[2]);
        }

        return $transformations;
    }
}
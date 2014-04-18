<?php

namespace Galleryzr\Images\Entity;

interface IImage extends \Afa\Database\IEntity
{
    public function toArray();
}
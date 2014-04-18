<?php

namespace Galleryzr\Images\Command;

class NewImageCommand extends \Afa\Database\Command\Insert
{
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct('images', $data);
    }
}
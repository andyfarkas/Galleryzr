<?php

namespace Galleryzr;

class BaseEntity implements IEntity
{
    /**
     * @var array
     */
    protected  $data = array();

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

}

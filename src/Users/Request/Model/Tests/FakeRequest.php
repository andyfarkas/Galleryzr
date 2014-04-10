<?php

namespace Galleryzr\Users\Request\Model\Tests;

class FakeRequest implements \Afa\Framework\IRequest
{

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->data[$key];
    }
}
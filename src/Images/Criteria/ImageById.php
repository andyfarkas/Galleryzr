<?php

namespace Galleryzr\Images\Criteria;

class ImageById implements \Afa\Database\ICriteria
{

    /**
     * @var int
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param array $data
     * @return \Afa\Database\IEntity
     */
    public function createEntity(array $data)
    {
        return new \Galleryzr\Images\Entity\Image($data);
    }

    /**
     * @param \Afa\Database\IConnection $connection
     * @return \Afa\Database\IResult
     */
    public function execute(\Afa\Database\IConnection $connection)
    {
        $query = 'SELECT * FROM images WHERE id = :id';
        return $connection->query($query, array(
            'id' => $this->id,
        ));
    }
}
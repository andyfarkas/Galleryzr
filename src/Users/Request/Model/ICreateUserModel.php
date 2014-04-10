<?php

namespace Galleryzr\Users\Request\Model;

interface ICreateUserModel
{
    /**
     * @return \Galleryzr\Users\Entity\IUser
     */
    public function createUser();
}
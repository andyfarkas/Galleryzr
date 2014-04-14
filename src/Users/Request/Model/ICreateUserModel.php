<?php

namespace Galleryzr\Users\Request\Model;

interface ICreateUserModel extends \Afa\Framework\Request\IModel
{
    /**
     * @param \Galleryzr\Users\Service\IUsersService $usersService
     * @return \Galleryzr\Users\Entity\IUser
     */
    public function createUser(\Galleryzr\Users\Service\IUsersService $usersService);
}
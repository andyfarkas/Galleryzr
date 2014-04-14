<?php

namespace Galleryzr\Users;

class UsersController
{

    /**
     * @var \Galleryzr\Users\Service\IUsersService
     */
    protected $usersService;

    /**
     * @param Service\IUsersService $usersService
     */
    public function __construct(\Galleryzr\Users\Service\IUsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * @param Request\Model\ICreateUserModel $model
     * @return array
     */
    public function createUser(\Galleryzr\Users\Request\Model\ICreateUserModel $model)
    {
        $createdUser = $model->createUser($this->usersService);
        return $createdUser->toArray();
    }

}

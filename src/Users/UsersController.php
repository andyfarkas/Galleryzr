<?php

namespace Galleryzr\Users;

class UsersController
{

    public function createUser(\Galleryzr\Users\Request\Model\ICreateUserModel $model)
    {
        $createdUser = $model->createUser();
        return $createdUser->toArray();
    }

}

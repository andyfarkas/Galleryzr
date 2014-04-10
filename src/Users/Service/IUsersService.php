<?php

namespace Galleryzr\Users\Service;

interface IUsersService
{
    /**
     * @param $email
     * @param $password
     * @param $nickname
     * @return \Galleryzr\Users\Entity\IUser
     */
    public function createUser($email, $password, $nickname);
}
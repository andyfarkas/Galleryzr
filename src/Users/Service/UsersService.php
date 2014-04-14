<?php

namespace Galleryzr\Users\Service;

class UsersService implements IUsersService
{

    /**
     * @var \Afa\Database\IRepository
     */
    protected $repository;

    public function __construct(\Afa\Database\IRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $email
     * @param $password
     * @param $nickname
     * @return \Galleryzr\Users\Entity\IUser
     */
    public function createUser($email, $password, $nickname)
    {
        $command = new \Afa\Database\Command\Insert('users', array(
            'email' => $email,
            'nickname' => $nickname,
            'password' => $password,
        ));

        $result = $this->repository->execute($command);

        return new \Galleryzr\Users\Entity\User(array(
            'email' => $email,
            'nickname' => $nickname,
            'id' => reset($result->current()),
        ));
    }
}
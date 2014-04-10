<?php

namespace Galleryzr\Users\Request\Model;

class CreateUserModel extends \Afa\Framework\Request\Model\AbstractModel implements ICreateUserModel
{

    /**
     * @param \Galleryzr\Users\Service\IUsersService $usersService
     * @return \Galleryzr\Users\Entity\IUser
     */
    public function createUser(\Galleryzr\Users\Service\IUsersService $usersService)
    {
        return $usersService->createUser(
            $this->request->get('email'),
            $this->request->get('password'),
            $this->request->get('nickname')
        );
    }

    /**
     * @throws \Afa\Framework\Exception\BadRequestException
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}
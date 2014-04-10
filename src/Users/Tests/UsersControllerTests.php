<?php

namespace Galleryzr\Users\Tests;

class UsersControllerTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createUser_ValidRequest_ReturnsCreatedUser()
    {
        $expectedUserData = array(
            'id' => 1,
            'nickname' => 'My nickname',
            'email' => 'my@email.com',
        );

        $userEntity = new \Galleryzr\Users\Entity\User($expectedUserData);
        $usersServiceFake = $this->getMock('Galleryzr\Users\Service\IUsersService');

        $createUserModelFake = $this->getMock('Galleryzr\Users\Request\Model\ICreateUserModel');
        $createUserModelFake->expects($this->any())
                            ->method('createUser')
                            ->will($this->returnValue($userEntity));

        $controller = new \Galleryzr\Users\UsersController($usersServiceFake);
        $userData = $controller->createUser($createUserModelFake);
        $this->assertEquals($expectedUserData, $userData);
    }
}
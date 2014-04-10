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

        $userEntityFake = $this->getMock('Galleryzr\Users\Entity\IUser');
        $userEntityFake->expects($this->any())
                        ->method('toArray')
                        ->will($this->returnValue($expectedUserData));

        $createUserModelFake = $this->getMock('Galleryzr\Users\Request\Model\ICreateUserModel');
        $createUserModelFake->expects($this->any())
                            ->method('createUser')
                            ->will($this->returnValue($userEntityFake));

        $controller = new \Galleryzr\Users\UsersController();
        $userData = $controller->createUser($createUserModelFake);
        $this->assertEquals($expectedUserData, $userData);
    }
}
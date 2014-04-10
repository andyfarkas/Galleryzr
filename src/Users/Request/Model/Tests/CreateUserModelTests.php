<?php

namespace Galleryzr\Users\Request\Model\Tests;

class CreateUserModelTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createUser_whenCalled_ReturnsCreatedUser()
    {
        $email = 'my@email.com';
        $nickname = 'John Doe';
        $password = 'MyPassword';
        $id = 1;

        $expectedUser = new \Galleryzr\Users\Entity\User(array(
            'id' => $id,
            'email' => $email,
            'nickname' => $nickname,
            'password' => $password,
        ));

        $requestFake = new FakeRequest(array(
            'email' => $email,
            'nickname' => $nickname,
            'password' => $password,
        ));

        $serviceFake = $this->getMock('Galleryzr\Users\Service\IUsersService');
        $serviceFake->expects($this->any())
                    ->method('createUser')
                    ->with($email, $password, $nickname)
                    ->will($this->returnValue($expectedUser));

        $model = new \Galleryzr\Users\Request\Model\CreateUserModel($requestFake);
        $createdUser = $model->createUser($serviceFake);

        $this->assertEquals($expectedUser, $createdUser);
    }
}
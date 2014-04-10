<?php

namespace Galleryzr\Users\Entity\Tests;

class UserTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function toArray_WhenCalled_ReturnsUserDataArray()
    {
        $userData = array(
            'id' => 1,
            'nickname' => 'My nickname',
            'email' => 'my@email.com',
        );

        $user = new \Galleryzr\Users\Entity\User($userData);
        $this->assertEquals($userData, $user->toArray());
    }
}
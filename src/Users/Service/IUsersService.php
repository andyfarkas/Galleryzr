<?php

namespace Sandbox\Users\Service;

interface IUsersService
{
    /**
     * @param string $name
     */
    public function createUser($name);
}
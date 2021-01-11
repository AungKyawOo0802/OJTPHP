<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get User List
     * @param Object
     * @return $userList
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    /**
     * Insert User
     * @param Request
     */
    public function userInsert($request)
    {
        return $this->userDao->userInsert($request);
    }

    /**
     * Delete User
     * @param User Id
     */
    public function userDelete($id)
    {
        return $this->userDao->userDelete($id);
    }

    /**
     * Password Change
     * @param Password
     */
    public function passwordChange($password)
    {
        return $this->userDao->passwordChange($password);
    }

    /**
     * Update User
     * @param Request
     */
    public function updateUser($request)
    {
        return $this->userDao->updateUser($request);
    }

    /**
     * Search User
     * @param Request
     */
    public function userSearch($request)
    {
        return $this->userDao->userSearch($request);
    }
}

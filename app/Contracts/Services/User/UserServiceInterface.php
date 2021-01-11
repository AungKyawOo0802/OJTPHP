<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
  //get user list
  public function getUserList();

  //user insert
  public function userInsert($request);

  //update user
  public function updateUser($request);

  //user delete
  public function userDelete($id);

  //password change
  public function  passwordChange($password);

  //user search
  public function userSearch($request);
}

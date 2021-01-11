<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  //get user list
  public function getUserList();

  //insert user
  public function userInsert($request);

  //update user
  public function updateUser($request);

  //delete user
  public function userDelete($id);

  //password change
  public function passwordChange($password);

  //user search
  public function userSearch($request);
}

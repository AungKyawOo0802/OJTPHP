<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
  private $authDao;

  /**
   * Class Constructor
   * @param AuthDaoInterface
   * @return
   */
  public function __construct(AuthDaoInterface $authDao)
  {
    $this->authDao = $authDao;
  }
}

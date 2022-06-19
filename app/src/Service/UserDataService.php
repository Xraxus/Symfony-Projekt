<?php
/**
 * User data Service
 */

namespace App\Service;

use App\Entity\Category;
use App\Entity\User;
use App\Repository\UserRepository;

class UserDataService
{
    private UserRepository $UserRepository;





    /**
     * Constructor.
     *
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->UserRepository=$this->$userRepository;
    }


    /**
     * Save entity.
     */
    public function save(User $user): void
    {
        $this->UserRepository->save($user);
    }
}

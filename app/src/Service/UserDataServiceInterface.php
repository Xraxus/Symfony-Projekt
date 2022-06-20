<?php

/**
 * User data Service Interface.
 */

namespace App\Service;

use App\Entity\User;

/**
 * Interface UserDataServiceInterface.
 */
interface UserDataServiceInterface
{
    /**
     * Save user.
     * @param User        $user
     * @param string|null $newPlainPassword
     */
    public function save(User $user, ?string $newPlainPassword = null);
}

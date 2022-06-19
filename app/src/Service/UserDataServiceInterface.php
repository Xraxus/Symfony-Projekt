<?php

namespace App\Service;

use App\Entity\User;

interface UserDataServiceInterface
{
    public function save(User $user, ?string $newPlainPassword = null);
}

<?php
/**
 * User data Service Interface.
 */

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Class UserService
 */
class UserDataService implements UserDataServiceInterface
{
    private UserRepository $userRepository;

    private UserPasswordHasherInterface $passwordEncoder;


    /**
     * Constructor.
     *
     * @param UserRepository              $userRepository
     * @param UserPasswordHasherInterface $passwordEncoder
     */
    public function __construct(UserRepository $userRepository, UserPasswordHasherInterface $passwordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Save user.
     * @param User        $user
     * @param string|null $newPlainPassword
     */
    public function save(User $user, ?string $newPlainPassword = null)
    {
        if ($newPlainPassword) {
            $encodedPassword = $this->passwordEncoder->hashPassword(
                $user,
                $newPlainPassword
            );

            $user->setPassword($encodedPassword);
        }

        $this->userRepository->save($user);
    }
}

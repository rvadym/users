<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Model;

use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserId;
use Rvadym\Users\Domain\ValueObject\UserPassword;
use Rvadym\Users\Domain\ValueObject\UserRole;

class NotRegisteredUser
{
    /** @var UserId */
    private $id;

    /** @var UserEmail */
    private $email;

    /** @var UserRole */
    private $role;

    /** @var UserPassword */
    private $password;

    /** @var UserPassword */
    private $passwordConfirmation;

    public function __construct(
        UserId $id,
        UserEmail $email,
        UserRole $role,
        UserPassword $password,
        UserPassword $passwordConfirmation
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->passwordConfirmation = $passwordConfirmation;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getRole(): UserRole
    {
        return $this->role;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function getPasswordConfirmation(): UserPassword
    {
        return $this->passwordConfirmation;
    }
}

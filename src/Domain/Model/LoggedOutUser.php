<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Model;

use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserPassword;
use Rvadym\Users\Domain\ValueObject\UserRole;

class LoggedOutUser
{
    /** @var UserEmail */
    private $email;

    /** @var UserRole */
    private $role;

    /** @var UserPassword */
    private $password;

    public function __construct(
        UserEmail $email,
        UserRole $role,
        UserPassword $password
    ) {
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
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
}

<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Model;

use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserId;
use Rvadym\Users\Domain\ValueObject\UserRole;

class BaseUser
{
    /** @var UserId */
    private $id;

    /** @var UserEmail */
    private $email;

    /** @var UserRole */
    private $role;

    public function __construct(
        UserId $id,
        UserEmail $email,
        UserRole $role
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->role = $role;
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
}

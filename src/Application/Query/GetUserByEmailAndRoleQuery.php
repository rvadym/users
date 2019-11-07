<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Query;

use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserRole;

class GetUserByEmailAndRoleQuery
{
    /** @var UserEmail */
    private $userEmail;

    /** @var UserRole */
    private $userRole;

    public function __construct(
        UserEmail $userEmail, UserRole $userRole
    ) {
        $this->userEmail = $userEmail;
        $this->userRole = $userRole;
    }

    public function getUserEmail(): UserEmail
    {
        return $this->userEmail;
    }

    public function getUserRole(): UserRole
    {
        return $this->userRole;
    }
}

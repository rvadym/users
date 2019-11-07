<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Query;

use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserId;
use Rvadym\Users\Domain\ValueObject\UserRole;

class IsEmailUsedQuery
{
    /** @var UserEmail */
    private $userEmail;

    /** @var UserRole */
    private $userRole;

    /** @var UserId[]|array */
    private $ignoreUserIds;

    public function __construct(
        UserEmail $userEmail,
        UserRole $userRole,
        array $ignoreUserIds = []
    ) {
        $this->userEmail = $userEmail;
        $this->userRole = $userRole;
        $this->ignoreUserIds = $ignoreUserIds;
    }

    public function getUserEmail(): UserEmail
    {
        return $this->userEmail;
    }

    public function getUserRole(): UserRole
    {
        return $this->userRole;
    }

    public function getIgnoreUserIds(): array
    {
        return $this->ignoreUserIds;
    }
}

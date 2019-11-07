<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Command;

use Rvadym\Users\Domain\Model\UpdateUser;
use Rvadym\Users\Domain\ValueObject\UserId;

class UpdateUserCommand
{
    /** @var UserId */
    private $userId;

    /** @var UpdateUser */
    private $user;

    public function __construct(
        UserId $userId,
        UpdateUser $user
    ) {
        $this->userId = $userId;
        $this->user = $user;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getUser(): UpdateUser
    {
        return $this->user;
    }
}

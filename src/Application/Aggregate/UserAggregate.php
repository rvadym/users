<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Aggregate;

use Rvadym\Users\Domain\Model\BaseUser;

class UserAggregate
{
    /** @var BaseUser */
    private $user;

    public function __construct(
        BaseUser $user
    ) {
        $this->user = $user;
    }

    public function getUser(): BaseUser
    {
        return $this->user;
    }
}

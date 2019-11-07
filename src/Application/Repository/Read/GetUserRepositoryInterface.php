<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Repository\Read;

use Rvadym\Users\Domain\Model\BaseUser;
use Rvadym\Users\Domain\ValueObject\UserId;

interface GetUserRepositoryInterface
{
    public function getById(UserId $id): ?BaseUser;
}

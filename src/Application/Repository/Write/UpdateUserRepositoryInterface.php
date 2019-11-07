<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Repository\Write;

use Rvadym\Users\Domain\Model\BaseUser;
use Rvadym\Users\Domain\Model\UpdateUser;
use Rvadym\Users\Domain\ValueObject\UserId;

interface UpdateUserRepositoryInterface
{
    public function update(UserId $userId, UpdateUser $baseUser): BaseUser;
}

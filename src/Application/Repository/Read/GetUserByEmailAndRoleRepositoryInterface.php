<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Repository\Read;

use Rvadym\Users\Domain\Model\BaseUser;
use Rvadym\Users\Domain\ValueObject\UserEmail;
use Rvadym\Users\Domain\ValueObject\UserRole;

interface GetUserByEmailAndRoleRepositoryInterface
{
    public function getOneByEmailAndRole(UserEmail $email, UserRole $role): ?BaseUser;
}

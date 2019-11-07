<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Repository\Write;

use Rvadym\Users\Domain\Model\BaseUser;
use Rvadym\Users\Domain\Model\NotRegisteredUser;

interface CreateUserRepositoryInterface
{
    public function create(NotRegisteredUser $notRegisteredUser): BaseUser;
}

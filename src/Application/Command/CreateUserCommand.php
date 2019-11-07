<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Command;

use Rvadym\Users\Domain\Model\NotRegisteredUser;

class CreateUserCommand
{
    /** @var NotRegisteredUser */
    private $notRegisteredUser;

    public function __construct(
        NotRegisteredUser $notRegisteredUser
    ) {
        $this->notRegisteredUser = $notRegisteredUser;
    }

    public function getNotRegisteredUser(): NotRegisteredUser
    {
        return $this->notRegisteredUser;
    }
}

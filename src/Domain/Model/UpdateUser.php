<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Model;

use Rvadym\Users\Domain\ValueObject\UserEmail;

class UpdateUser
{
    /** @var UserEmail|null */
    private $email;

    public function __construct(
        ?UserEmail $email
    ) {
        $this->email = $email;
    }

    public function getEmail(): ?UserEmail
    {
        return $this->email;
    }
}

<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Collection;

use Rvadym\Types\Collection\AbstractCollection;
use Rvadym\Users\Domain\Model\BaseUser;

class UserCollection extends AbstractCollection
{
    /** @var BaseUser */
    private $users;

    public function __construct(
        BaseUser ...$users
    ) {
        $this->users = $users;
    }

    protected function getItems(): array
    {
        return $this->users;
    }
}

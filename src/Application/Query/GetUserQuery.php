<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Query;

use Rvadym\Users\Domain\ValueObject\UserId;

class GetUserQuery
{
    /** @var UserId */
    private $id;

    public function __construct(
        UserId $id
    ) {
        $this->id = $id;
    }

    public function getId(): UserId
    {
        return $this->id;
    }
}

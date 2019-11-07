<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Aggregate;

class IsEmailUsedAggregate
{
    /** @var bool */
    private $isEmailUsed;

    public function __construct(
        bool $isEmailUsed
    ) {
        $this->isEmailUsed = $isEmailUsed;
    }

    public function isEmailUsed(): bool
    {
        return $this->isEmailUsed;
    }
}

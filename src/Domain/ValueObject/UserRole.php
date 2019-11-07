<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\ValueObject;

use Rvadym\Types\ValueObject\ValueObjectInterface;
use Rvadym\Users\Domain\Enum\UserRoleEnumInterface;

class UserRole implements ValueObjectInterface
{
    /** @var UserRoleEnumInterface */
    private $value;

    public function __construct(
        UserRoleEnumInterface $value
    ) {
        $this->value = $value;
    }

    public function getValue(): UserRoleEnumInterface
    {
        return $this->value;
    }

    public static function getDefaultValue()
    {
        return '';
    }

    public function __toString(): string
    {
        return $this->getValue()->getValue();
    }
}

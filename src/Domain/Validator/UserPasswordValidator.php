<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Validator;

use Rvadym\Types\Validator\AbstractValidator;
use Rvadym\Users\Domain\ValueObject\UserPassword;

class UserPasswordValidator extends AbstractValidator
{
    public function __construct(
        string $key,
        UserPassword $valueObject
    ) {
        parent::__construct($key, $valueObject);
    }

    public function validate(): void
    {
        if ($this->isTooLong()) {
            $this->addError('Must be at most 64 characters long.');
        }

        if ($this->isTooShort()) {
            $this->addError('Must be at least 8 characters long.');
        }
    }

    protected function isTooLong(): bool
    {
        return strlen($this->getValueObject()->getValue()) > 64;
    }

    protected function isTooShort(): bool
    {
        return strlen($this->getValueObject()->getValue()) < 8;
    }
}

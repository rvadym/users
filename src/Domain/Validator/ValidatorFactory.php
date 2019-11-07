<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Validator;

use Rvadym\Types\Validator\ValidatorFactory as ValidatorFactoryBase;
use Rvadym\Types\Exception\NoValidatorForTypeException;
use Rvadym\Types\Validator\ValidatorInterface;
use Rvadym\Types\ValueObject\ValueObjectInterface;
use Rvadym\Users\Domain\ValueObject\UserPassword;

class ValidatorFactory extends ValidatorFactoryBase
{
    /**
     * @throws NoValidatorForTypeException
     */
    public function getValidator(string $key, ValueObjectInterface $valueObject): ValidatorInterface
    {
        if (is_a($valueObject, UserPassword::class)) {
            return new UserPasswordValidator($key, $valueObject);
        }

        return ValidatorFactoryBase::getValidator($key, $valueObject);
    }
}

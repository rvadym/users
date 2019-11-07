<?php declare(strict_types=1);

namespace Rvadym\Users\Domain\Enum;

use JsonSerializable;

/**
 * @See \MyCLabs\Enum\Enum from myclabs/php-enum
 */
interface EnumInterface extends JsonSerializable
{
    public function getValue();
    public function getKey();
    public function __toString();
    public function equals($variable = null): bool;
    public static function keys();
    public static function values();
    public static function toArray();
    public static function isValid($value);
    public static function isValidKey($key);
    public static function search($value);
}

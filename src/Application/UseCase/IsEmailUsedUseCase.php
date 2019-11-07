<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\IsEmailUsedAggregate;
use Rvadym\Users\Application\Aggregate\UserAggregate;
use Rvadym\Users\Application\Exception\UserNotFoundException;
use Rvadym\Users\Application\Query\GetUserByEmailAndRoleQuery;
use Rvadym\Users\Application\Query\IsEmailUsedQuery;
use Rvadym\Users\Domain\ValueObject\UserId;

class IsEmailUsedUseCase
{
    /** @var GetUserByEmailAndRoleUseCase */
    private $getUserByEmailAndRole;

    public function __construct(
        GetUserByEmailAndRoleUseCase $getUserByEmailAndRole
    ) {
        $this->getUserByEmailAndRole = $getUserByEmailAndRole;
    }

    public function execute(IsEmailUsedQuery $query): IsEmailUsedAggregate
    {
        $isEmailUsed = true;

        try {
            $getUserQuery = new GetUserByEmailAndRoleQuery(
                $query->getUserEmail(),
                $query->getUserRole()
            );

            /** @var UserAggregate $aggregate */
            $aggregate = $this->getUserByEmailAndRole->execute($getUserQuery);
            $mustBeIgnored = $this->mustBeIgnored(
                $aggregate->getUser()->getId(),
                $query->getIgnoreUserIds()
            );

            if ($mustBeIgnored) {
                $isEmailUsed = false;
            }
        } catch (UserNotFoundException $e) {
            $isEmailUsed = false;
        }

        return new IsEmailUsedAggregate($isEmailUsed);
    }

    private function mustBeIgnored(UserId $userId, array $ignoredUserIds): bool
    {
        /** @var UserId $ignoreId */
        foreach ($ignoredUserIds as $ignoredUserId) {
            if ($userId->getValue() === $ignoredUserId->getValue()) {
                return true;
            }
        }

        return false;
    }
}

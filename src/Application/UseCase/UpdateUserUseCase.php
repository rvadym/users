<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\UserAggregate;
use Rvadym\Users\Application\Command\UpdateUserCommand;
use Rvadym\Users\Application\Exception\EmailAlreadyUsedException;
use Rvadym\Users\Application\Query\GetUserQuery;
use Rvadym\Users\Application\Query\IsEmailUsedQuery;
use Rvadym\Users\Application\Repository\Write\UpdateUserRepositoryInterface;
use Rvadym\Users\Application\Exception\UserNotFoundException;
use Rvadym\Users\Domain\Model\BaseUser;
use Rvadym\Users\Domain\Model\UpdateUser;
use Rvadym\Users\Domain\ValueObject\UserId;

class UpdateUserUseCase
{
    /** @var GetUserUseCase */
    private $getUser;

    /** @var IsEmailUsedUseCase */
    private $isEmailUsed;

    /** @var UpdateUserRepositoryInterface */
    private $updateUserRepository;

    public function __construct(
        GetUserUseCase $getUser,
        IsEmailUsedUseCase $isEmailUsed,
        UpdateUserRepositoryInterface $updateUserRepository
    ) {
        $this->getUser = $getUser;
        $this->isEmailUsed = $isEmailUsed;
        $this->updateUserRepository = $updateUserRepository;
    }

    /**
     * @throws EmailAlreadyUsedException
     * @throws UserNotFoundException
     */
    public function execute(UpdateUserCommand $command): UserAggregate
    {
        $existingUser = $this->getUser(
            $command->getUserId()
        );

        $this->isEmailUsed(
            $existingUser,
            $command->getUser()
        );

        $user = $this->updateUserRepository->update(
            $command->getUserId(),
            $command->getUser()
        );

        return new UserAggregate($user);
    }

    /**
     * @throws UserNotFoundException
     */
    private function getUser(UserId $userId): BaseUser
    {
        $aggregate = $this->getUser->execute(
            new GetUserQuery($userId)
        );

        return $aggregate->getUser();
    }

    /**
     * @throws EmailAlreadyUsedException
     */
    private function isEmailUsed(BaseUser $existingUser, UpdateUser $updateUser): void
    {
        $isEmailUsedQuery = new IsEmailUsedQuery(
            $updateUser->getEmail(),
            $existingUser->getRole(),
            [
                $existingUser->getId()
            ]
        );

        if ($this->isEmailUsed->execute($isEmailUsedQuery)->isEmailUsed()) {
            throw new EmailAlreadyUsedException(json_encode([
                'message' => 'Email "%email%" is already taken for role "%role%".',
                'values' => [
                    '%email%' => $updateUser->getEmail()->getValue(),
                    '%role%' => $existingUser->getRole()->getValue(),
                ]
            ]));
        }
    }
}

<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\UserAggregate;
use Rvadym\Users\Application\Command\CreateUserCommand;
use Rvadym\Users\Application\Exception\EmailAlreadyUsedException;
use Rvadym\Users\Application\Query\IsEmailUsedQuery;
use Rvadym\Users\Application\Repository\Write\CreateUserRepositoryInterface;

class CreateUserUseCase
{
    /** @var IsEmailUsedUseCase */
    private $isEmailUsed;

    /** @var CreateUserRepositoryInterface */
    private $createUserRepository;

    public function __construct(
        IsEmailUsedUseCase $isEmailUsed,
        CreateUserRepositoryInterface $createUserRepository
    ) {
        $this->isEmailUsed = $isEmailUsed;
        $this->createUserRepository = $createUserRepository;
    }

    /**
     * @throws EmailAlreadyUsedException
     */
    public function execute(CreateUserCommand $command): UserAggregate
    {
        $isEmailUsedQuery = new IsEmailUsedQuery(
            $command->getNotRegisteredUser()->getEmail(),
            $command->getNotRegisteredUser()->getRole()
        );

        if ($this->isEmailUsed->execute($isEmailUsedQuery)->isEmailUsed()) {
            throw new EmailAlreadyUsedException(json_encode([
                'message' => 'Email "%email%" is already taken for role "%role%".',
                'values' => [
                    '%email%' => $command->getNotRegisteredUser()->getEmail()->getValue(),
                    '%role%' => $command->getNotRegisteredUser()->getRole()->getValue(),
                ]
            ]));
        }

        $user = $this->createUserRepository->create($command->getNotRegisteredUser());

        return new UserAggregate($user);
    }
}

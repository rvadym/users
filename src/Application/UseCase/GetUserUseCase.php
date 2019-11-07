<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\UserAggregate;
use Rvadym\Users\Application\Exception\UserNotFoundException;
use Rvadym\Users\Application\Query\GetUserQuery;
use Rvadym\Users\Application\Repository\Read\GetUserRepositoryInterface;

class GetUserUseCase
{
    /** @var GetUserRepositoryInterface */
    private $getUserRepository;

    public function __construct(
        GetUserRepositoryInterface $getUserRepository
    ) {
        $this->getUserRepository = $getUserRepository;
    }

    /**
     * @throws UserNotFoundException
     */
    public function execute(GetUserQuery $query): UserAggregate
    {
        $user = $this->getUserRepository->getById($query->getId());

        if (is_null($user)) {
            throw new UserNotFoundException(json_encode([
                'message' => 'User with ID "%id%" not found.',
                'values' => [
                    '%id%' => $query->getId()->getValue(),
                ]
            ]));
        }

        return new UserAggregate($user);
    }
}

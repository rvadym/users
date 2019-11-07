<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\UserAggregate;
use Rvadym\Users\Application\Exception\UserNotFoundException;
use Rvadym\Users\Application\Query\GetUserByEmailAndRoleQuery;
use Rvadym\Users\Application\Repository\Read\GetUserByEmailAndRoleRepositoryInterface;

class GetUserByEmailAndRoleUseCase
{
    /** @var GetUserByEmailAndRoleRepositoryInterface */
    private $getUserByEmailAndRoleRepository;

    public function __construct(
        GetUserByEmailAndRoleRepositoryInterface $getUserByEmailAndRoleRepository
    ) {
        $this->getUserByEmailAndRoleRepository = $getUserByEmailAndRoleRepository;
    }

    /**
     * @throws UserNotFoundException
     */
    public function execute(GetUserByEmailAndRoleQuery $query): UserAggregate
    {
        $user = $this->getUserByEmailAndRoleRepository->getOneByEmailAndRole(
            $query->getUserEmail(),
            $query->getUserRole()
        );

        if (is_null($user)) {
            throw new UserNotFoundException();
        }

        return new UserAggregate($user);
    }
}

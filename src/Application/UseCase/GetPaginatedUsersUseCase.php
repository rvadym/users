<?php declare(strict_types=1);

namespace Rvadym\Users\Application\UseCase;

use Rvadym\Users\Application\Aggregate\PaginatedUsersAggregate;
use Rvadym\Users\Application\Query\GetPaginatedUsersQuery;
use Rvadym\Users\Application\Repository\Read\GetPaginatedUsersRepositoryInterface;

class GetPaginatedUsersUseCase
{
    /** @var GetPaginatedUsersRepositoryInterface */
    private $getPaginatedUsersRepository;

    public function __construct(
        GetPaginatedUsersRepositoryInterface $getPaginatedUsersRepository
    ) {
        $this->getPaginatedUsersRepository = $getPaginatedUsersRepository;
    }

    public function execute(GetPaginatedUsersQuery $query): PaginatedUsersAggregate
    {
        $users = $this->getPaginatedUsersRepository->getPaginated(
            $query->getPageQuery()
        );

        return new PaginatedUsersAggregate(
            $users,
            $query->getPageQuery()
        );
    }
}

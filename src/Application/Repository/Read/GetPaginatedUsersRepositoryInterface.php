<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Repository\Read;

use Rvadym\Paginator\Model\PageQuery;
use Rvadym\Users\Application\Collection\UserCollection;

interface GetPaginatedUsersRepositoryInterface
{
    public function getPaginated(PageQuery $page): UserCollection;
}

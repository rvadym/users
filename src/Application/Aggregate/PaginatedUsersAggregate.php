<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Aggregate;

use Rvadym\Paginator\Model\PageQuery;
use Rvadym\Users\Application\Collection\UserCollection;

class PaginatedUsersAggregate
{
    /** @var UserCollection */
    private $userCollection;

    /** @var PageQuery */
    private $pageQuery;

    public function __construct(
        UserCollection $userCollection,
        PageQuery $pageQuery
    ) {
        $this->userCollection = $userCollection;
        $this->pageQuery = $pageQuery;
    }

    public function getUserCollection(): UserCollection
    {
        return $this->userCollection;
    }

    public function getPageQuery(): PageQuery
    {
        return $this->pageQuery;
    }
}

<?php declare(strict_types=1);

namespace Rvadym\Users\Application\Query;

use Rvadym\Paginator\Model\PageQuery;

class GetPaginatedUsersQuery
{
    /** @var PageQuery */
    private $pageQuery;

    public function __construct(PageQuery $pageQuery)
    {
        $this->pageQuery = $pageQuery;
    }

    public function getPageQuery(): PageQuery
    {
        return $this->pageQuery;
    }
}

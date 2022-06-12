<?php
/**
 * Status service interface.
 */

namespace App\Service;

use App\Entity\Status;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface StatusServiceInterface.
 */
interface StatusServiceInterface
{
    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface;

}

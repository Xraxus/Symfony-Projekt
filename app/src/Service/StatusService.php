<?php
/**
 * Status service.
 */

namespace App\Service;

use App\Repository\StatusRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class StatusService.
 */
class StatusService implements StatusServiceInterface
{
    /**
     * Status repository.
     */
    private StatusRepository $statusRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;


    /**
     * Constructor.
     *
     * @param StatusRepository   $statusRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(StatusRepository $statusRepository, PaginatorInterface $paginator)
    {
        $this->statusRepository = $statusRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->statusRepository->queryAll(),
            $page,
            StatusRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }
}

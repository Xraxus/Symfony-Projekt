<?php
/**
 * Category Service
 */

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * Category Repository.
     *
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * Paginator.
     *
     * @var PaginatorInterface
     */
    private PaginatorInterface $paginator;

    /**
     * Constructor.
     *
     * @param CategoryRepository $categoryRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(CategoryRepository $categoryRepository, PaginatorInterface $paginator)
    {
        $this->categoryRepository=$categoryRepository;
        $this->paginator=$paginator;
    }

    /**
     * Get paginated list
     *
     * @param int $page
     * @return PaginationInterface
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->categoryRepository->queryAll(),
            $page,
            CategoryRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param Category $category Category entity
     */
    public function save(Category $category): void
    {
        $this->categoryRepository->save($category);
    }
}

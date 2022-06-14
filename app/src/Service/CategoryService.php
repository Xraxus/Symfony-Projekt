<?php
/**
 * Category Service
 */

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\NoteRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
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

    private NoteRepository $noteRepository;


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
     * @param NoteRepository $noteRepository
     */
    public function __construct(CategoryRepository $categoryRepository, PaginatorInterface $paginator, NoteRepository $noteRepository)
    {
        $this->categoryRepository=$categoryRepository;
        $this->noteRepository = $noteRepository;
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

    /**
     * Can Category be deleted?
     *
     * @param Category $category Category entity
     *
     * @return bool Result
     */
    public function canBeDeleted(Category $category): bool
    {
        try {
            $result = $this->noteRepository->countByCategory($category);

            return !($result > 0);
        } catch (NoResultException|NonUniqueResultException) {
            return false;
        }
    }

    /**
     * Delete entity.
     *
     * @param Category $category Category entity
     */
    public function delete(Category $category): void
    {
        $this->categoryRepository->delete($category);
    }


}

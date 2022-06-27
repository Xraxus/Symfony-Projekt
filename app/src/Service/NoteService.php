<?php
/**
 * Note service.
 */

namespace App\Service;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class NoteService.
 */
class NoteService implements NoteServiceInterface
{
    /**
     * Note repository.
     */
    private NoteRepository $noteRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Category service.
     */
    private CategoryServiceInterface $categoryService;

    /**
     * Constructor.
     *
     * @param NoteRepository           $noteRepository
     * @param PaginatorInterface       $paginator
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(NoteRepository $noteRepository, PaginatorInterface $paginator, CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->noteRepository = $noteRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list.
     *
     * @param int                $page    Page number
     * @param array<string, int> $filters Filters array
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page, array $filters = []): PaginationInterface
    {
        $filters = $this->prepareFilters($filters);

        return $this->paginator->paginate(
            $this->noteRepository->queryAll($filters),
            $page,
            NoteRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param Note $note Note entity
     */
    public function save(Note $note): void
    {
        if (null === $note->getId()) {
            $note->setCreateTime(new \DateTimeImmutable());
        }

        $this->noteRepository->save($note);
    }

    /**
     * Delete entity.
     *
     * @param Note $note Note entity
     */
    public function delete(Note $note): void
    {
        $this->noteRepository->delete($note);
    }

    /**
     * Prepare filters for the notes list.
     *
     * @param array<string, int> $filters Raw filters from request
     *
     * @return array<string, object> Result array of filters
     */
    public function prepareFilters(array $filters): array
    {
        $resultFilters = [];
        if (!empty($filters['category_id'])) {
            $category = $this->categoryService->findOneById($filters['category_id']);
            if (null !== $category) {
                $resultFilters['category'] = $category;
            }
        }

        return $resultFilters;
    }
}

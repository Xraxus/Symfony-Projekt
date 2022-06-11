<?php
/**
 * Status controller.
 */

namespace App\Controller;

use App\Entity\Status;
use App\Repository\StatusRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StatusController.
 */
#[Route('/status')]
class StatusController extends AbstractController
{
    /**
     * Index action.
     *
     * @param Request            $request        HTTP Request
     * @param StatusRepository     $statusRepository Status repository
     * @param PaginatorInterface $paginator      Paginator
     *
     * @return Response HTTP response
     */
    #[Route(name: 'status_index', methods: 'GET')]
    public function index(Request $request, StatusRepository $statusRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $statusRepository->queryAll(),
            $request->query->getInt('page', 1),
            StatusRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render('status/index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Show action.
     *
     * @param Status $status Status entity
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'status_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET',
    )]
    public function show(Status $status): Response
    {
        return $this->render(
            'status/show.html.twig',
            ['status' => $status]
        );
    }
}

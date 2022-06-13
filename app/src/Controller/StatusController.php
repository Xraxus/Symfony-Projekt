<?php
/**
 * Status controller.
 */

namespace App\Controller;

use App\Entity\Status;
use App\Service\StatusServiceInterface;
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
     * Status service.
     *
     * @var StatusServiceInterface
     */
    private StatusServiceInterface $statusService;

    /**
     * Constructor.
     *
     * @param StatusServiceInterface $statusService
     */
    public function __construct(StatusServiceInterface $statusService)
    {
        $this->statusService=$statusService;
    }

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     * @return Response HTTP response
     */
    #[Route(name: 'status_index', methods: 'GET')]
    public function index(Request $request): Response
    {
        $pagination = $this->statusService->getPaginatedList(
            $request->query->getInt('page', 1),
        );

        return $this->render('status/index.html.twig', ['pagination' => $pagination]);
    }
    
/*    #[Route(
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
    }*/
}

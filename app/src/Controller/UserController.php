<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/**
 * User controller.
 */

namespace App\Controller;

use App\Form\Type\UserEmailType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class UserController extends AbstractController
{
    /**
     * Translator.
     */
    private TranslatorInterface $translator;


    #[Route('/panel', name: 'panel_password', methods: 'GET|PUT')]
    public function changePassword(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, TranslatorInterface $translator): Response
    {
        $this->translator = $translator;

        $user = $this->getUser();
        $form = $this->createForm(UserEmailType::class, $user, [
            'method' => 'PUT',
            'action' => $this->generateUrl('panel_password'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var PasswordAuthenticatedUserInterface $user
             */
            $user->setPassword($userPasswordHasher->hashPassword($user, $form->get('changePassword')->getData()));
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                'success',
                $this->translator->trans('message.changed_successfully')
            );

            return $this->redirectToRoute('panel_password');
        }

        return $this->render('user/panel_password.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

}

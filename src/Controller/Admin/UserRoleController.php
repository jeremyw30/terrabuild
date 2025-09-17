<?php
namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/roles')]
#[IsGranted('ROLE_ADMIN')]
class UserRoleController extends AbstractController
{
    #[Route('/', name: 'admin_roles_index')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('admin/roles/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_roles_edit')]
    public function edit(int $id, Request $request, EntityManagerInterface $em, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        if ($request->isMethod('POST')) {
            $roles = $request->request->get('roles', []);
            $user->setRoles($roles);
            $em->flush();
            $this->addFlash('success', 'Rôles mis à jour !');
            return $this->redirectToRoute('admin_roles_index');
        }

        return $this->render('admin/roles/edit.html.twig', [
            'user' => $user,
        ]);
    }
}

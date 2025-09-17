<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminMenuController extends AbstractController
{
    #[Route('/', name: 'admin_menu')]
    public function index(): Response
    {
        return $this->render('admin/menu.html.twig');
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\FormuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Contrôleur de l'inscription utilisateur.
 * Rôle : générer et afficher le formulaire d'inscription.
 */
final class RegisterController extends AbstractController
{
    /**
     * Route: GET|POST /inscription
     * Nom de route: app_register
     * Vue: templates/register/index.html.twig
     */
    #[Route('/inscription', name: 'app_register')]
    public function index(): Response
    {
        // Création du formulaire d'inscription
    $registerForm = $this->createForm(FormuType::class);

        // Rendu de la vue avec le formulaire disponible sous la variable "registerForm"
        return $this->render('register/index.html.twig', [
            'registerForm' => $registerForm->createView(),
        ]);
    }
}

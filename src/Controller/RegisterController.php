<?php
declare(strict_types=1);


// Namespace du contrôleur dédié à l'inscription utilisateur
namespace App\Controller;

use App\Form\FormuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Contrôleur de l'inscription utilisateur.
 * Rôle : générer et afficher le formulaire d'inscription.
 */

/**
 * Contrôleur dédié à l'inscription utilisateur.
 * Affiche le formulaire d'inscription et transmet la vue à Twig.
 */
final class RegisterController extends AbstractController
{
    /**
     * Route d'inscription : /inscription (nommée app_register)
     * Affiche le formulaire d'inscription.
     *
     * @return Response La réponse HTTP (affichage du formulaire)
     */
    #[Route('/inscription', name: 'app_register')]
    public function index(): Response
    {
        // Création du formulaire d'inscription (FormuType)
        $registerForm = $this->createForm(FormuType::class);

        // Affiche la vue d'inscription avec le formulaire
        return $this->render('register/index.html.twig', [
            // Passe la vue du formulaire à Twig
            'registerForm' => $registerForm->createView(),
        ]);
    }
}

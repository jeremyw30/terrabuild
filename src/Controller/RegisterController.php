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
    public function index(\Symfony\Component\HttpFoundation\Request $request, \Doctrine\ORM\EntityManagerInterface $entityManager, \Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new \App\Entity\User();
        $registerForm = $this->createForm(\App\Form\FormuType::class, $user);
        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            // Hash du mot de passe
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            // Optionnel : définir le rôle par défaut
            $user->setRoles(['ROLE_USER']);

            // Sauvegarde en base
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirection après succès
            return $this->redirectToRoute('app_login');
        }

        return $this->render('register/index.html.twig', [
            'registerForm' => $registerForm->createView(),
        ]);
    }
}

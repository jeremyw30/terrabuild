<?php


// Namespace du contrôleur principal de la page d'accueil
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


/**
 * Contrôleur de la page d'accueil du site.
 * Gère l'affichage du formulaire d'inscription et la création d'un nouvel utilisateur.
 */
class HomeController extends AbstractController
{
    /**
     * Route principale du site : / (nommée app_home)
     * Affiche le formulaire d'inscription et traite la soumission.
     *
     * @param Request $request Représente la requête HTTP reçue
     * @param EntityManagerInterface $entityManager Permet d'interagir avec la base de données
     * @param UserPasswordHasherInterface $passwordHasher Pour hasher le mot de passe utilisateur
     * @return Response La réponse HTTP (affichage ou redirection)
     */
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Création d'une nouvelle instance d'utilisateur (entité User)
        $user = new \App\Entity\User();

        // Création du formulaire d'inscription, lié à l'entité User
        $registerForm = $this->createForm(\App\Form\FormuType::class, $user);

        // Traite la requête (remplit l'objet User avec les données du formulaire si soumis)
        $registerForm->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            // Hashage sécurisé du mot de passe avant stockage
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            // Persiste l'utilisateur en base de données
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirige vers la page d'accueil (pour éviter la double soumission du formulaire)
            return $this->redirectToRoute('app_home');
        }

        // Affiche la page d'accueil avec le formulaire d'inscription
        return $this->render('home/index.html.twig', [
            // Passe la vue du formulaire à Twig
            'registerForm' => $registerForm->createView(),
        ]);
    }
}

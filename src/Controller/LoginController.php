<?php

// Namespace du contrôleur de la page de connexion utilisateur
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Contrôleur de la page de connexion utilisateur.
 * Affiche le formulaire de connexion et gère l'affichage des erreurs.
 */
class LoginController extends AbstractController
{
    /**
     * Route de connexion : /login (nommée app_login)
     * Affiche le formulaire de connexion et les éventuelles erreurs.
     *
     * @param Request $request Représente la requête HTTP reçue
     * @return Response La réponse HTTP (affichage du formulaire)
     */
    #[Route('/login', name: 'app_login')]
    public function index(Request $request): Response
    {
        // Récupère l'erreur d'authentification (si présente)
        $error = $request->attributes->get('authentication_error') ?? null;

        // Récupère le dernier identifiant saisi pour préremplir le champ email
        $lastUsername = $request->getSession()->get('_security.last_username');

        // Affiche la vue de connexion avec les variables nécessaires
        return $this->render('login/index.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
}

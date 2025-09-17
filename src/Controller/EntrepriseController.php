<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Contrôleur de la page Mon entreprise.
 */
class EntrepriseController extends AbstractController
{
    /**
     * Page Mon entreprise
     * @return Response
     */
    #[Route('/entreprise', name: 'app_entreprise')]
    public function index(): Response
    {
    $this->addFlash('success', 'Connexion réussie. Bienvenue sur votre espace entreprise TerraBuild !');
    return $this->render('entreprise/index.html.twig');
    }
}
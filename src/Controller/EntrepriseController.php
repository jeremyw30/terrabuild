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

    #[Route('/entreprise/infos', name: 'app_entreprise_infos')]
    public function infos(): Response
    {
        return $this->render('entreprise/infos.html.twig');
    }

    #[Route('/entreprise/materiels', name: 'app_entreprise_materiels')]
    public function materiels(): Response
    {
        return $this->render('entreprise/materiels.html.twig');
    }

    #[Route('/entreprise/batiments', name: 'app_entreprise_batiments')]
    public function batiments(): Response
    {
        return $this->render('entreprise/batiments.html.twig');
    }

    #[Route('/entreprise/employes', name: 'app_entreprise_employes')]
    public function employes(): Response
    {
        return $this->render('entreprise/employes.html.twig');
    }

    #[Route('/entreprise/contrats', name: 'app_entreprise_contrats')]
    public function contrats(): Response
    {
        return $this->render('entreprise/contrats.html.twig');
    }
}
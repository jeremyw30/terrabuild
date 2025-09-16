<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new \App\Entity\User();
        $registerForm = $this->createForm(\App\Form\FormuType::class, $user);
        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            // Hash du mot de passe
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            // Sauvegarde en base
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirection ou message de succès
            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'registerForm' => $registerForm->createView(),
        ]);
    }
}

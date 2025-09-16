<?php

// Namespace du contrôleur de la fonctionnalité "mot de passe oublié"
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


/**
 * Contrôleur de la fonctionnalité "mot de passe oublié".
 * Affiche le formulaire et gère l'envoi d'un email de réinitialisation.
 */
class ForgotPasswordController extends AbstractController
{
    /**
     * Route : /forgot-password (nommée app_forgot_password)
     * Affiche le formulaire et traite la soumission.
     *
     * @param Request $request Représente la requête HTTP reçue
     * @param MailerInterface $mailer Service d'envoi d'emails Symfony
     * @return Response La réponse HTTP (affichage ou confirmation)
     */
    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $success = false;

        // Si le formulaire est soumis (méthode POST)
        if ($request->isMethod('POST')) {
            // Récupère l'email saisi par l'utilisateur
            $emailValue = $request->request->get('email');
            if ($emailValue) {
                // Prépare l'email de réinitialisation
                $email = (new Email())
                    ->from('no-reply@terrabuild.local')
                    ->to($emailValue)
                    ->subject('Réinitialisation de votre mot de passe')
                    ->text('Voici le lien pour réinitialiser votre mot de passe : ...');
                // Envoie l'email via le service mailer
                $mailer->send($email);
                $success = true;
            }
        }

        // Affiche la vue avec le message de confirmation si succès
        return $this->render('forgot_password/index.html.twig', [
            'success' => $success,
        ]);
    }
}

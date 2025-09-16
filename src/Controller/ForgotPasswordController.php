<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ForgotPasswordController extends AbstractController
{
    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $success = false;
        if ($request->isMethod('POST')) {
            $emailValue = $request->request->get('email');
            if ($emailValue) {
                $email = (new Email())
                    ->from('no-reply@terrabuild.local')
                    ->to($emailValue)
                    ->subject('Réinitialisation de votre mot de passe')
                    ->text('Voici le lien pour réinitialiser votre mot de passe : ...');
                $mailer->send($email);
                $success = true;
            }
        }
        return $this->render('forgot_password/index.html.twig', [
            'success' => $success,
        ]);
    }
}

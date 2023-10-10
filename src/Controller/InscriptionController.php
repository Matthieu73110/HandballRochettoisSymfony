<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/{_locale}/inscription', name: 'app_inscription', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig');
    }
}

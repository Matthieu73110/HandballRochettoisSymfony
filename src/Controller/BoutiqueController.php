<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{
    #[Route('/{_locale}/boutique', name: 'app_boutique', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(): Response
    {
        return $this->render('boutique/index.html.twig');
    }
}

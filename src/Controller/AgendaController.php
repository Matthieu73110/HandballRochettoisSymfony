<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendaController extends AbstractController
{
    #[Route('/{_locale}/agenda', name: 'app_agenda', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(): Response
    {
        return $this->render('agenda/index.html.twig');
    }
}

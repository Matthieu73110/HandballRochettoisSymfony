<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresseController extends AbstractController
{
    #[Route('/{_locale}/presse', name: 'app_presse', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $presses = $doctrine->getRepository('App\Entity\Presse')->findBy([], ['date' => 'DESC']);
        return $this->render('presse/index.html.twig', [
            'presses' => $presses,
        ]);
    }
}

<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartenairesController extends AbstractController
{
    #[Route('/{_locale}/partenaires', name: 'app_partenaires', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $partenaires_institutionnel = $doctrine->getRepository('App\Entity\Partenaires')->findBy(["type" => "institutionnel"], ['nom' => 'ASC']);
        $partenaires_locaux = $doctrine->getRepository('App\Entity\Partenaires')->findBy(["type" => "locaux"], ['nom' => 'ASC']);
        return $this->render('partenaires/index.html.twig', [
            'partenaires_institutionnel' => $partenaires_institutionnel,
            'partenaires_locaux' => $partenaires_locaux
        ]);
    }
}

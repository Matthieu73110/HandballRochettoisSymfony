<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/{_locale}', name: 'app_default', requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $posts = $doctrine->getRepository('App\Entity\PostAcceuil')->findAll();
        $equipes = $doctrine->getRepository('App\Entity\PhotoEquipe')->findAll();
        return $this->render('default/index.html.twig',[
            'posts' => $posts,
            'equipes' => $equipes
        ]);
    }

    public function error404(): Response
    {
        return $this->render('404.html.twig', [], new Response('', 404));
    }
}

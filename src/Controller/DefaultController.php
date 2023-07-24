<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $posts = $doctrine->getRepository('App\Entity\PostAcceuil')->findAll();
        $equipes = $doctrine->getRepository('App\Entity\PhotoEquipe')->findAll();
        return $this->render('default/index.html.twig',[
            'posts' => $posts,
            'equipes' => $equipes
        ]);
    }
}

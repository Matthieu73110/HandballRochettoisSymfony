<?php

namespace App\Controller;

use App\Entity\Eventclub;
use App\Entity\Informationequipe;
use App\Entity\Membrebureau;
use App\Entity\Salarie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events_club = $doctrine->getRepository(Eventclub::class)->findALl();
        $membres = $doctrine->getRepository(Membrebureau::class)->findAll();
        $informations_feminines = $doctrine->getRepository(Informationequipe::class)->findBy(["type" => "feminine"], ['niveau' => 'DESC']);
        $informations_masculines = $doctrine->getRepository(Informationequipe::class)->findBy(["type" => "masculine"], ['niveau' => 'DESC']);
        $informations_mixte = $doctrine->getRepository(Informationequipe::class)->findBy(["type" => "mixte"], ['niveau' => 'DESC']);
        $salaries = $doctrine->getRepository(Salarie::class)->findAll();
        return $this->render('club/index.html.twig', [
            'events_club' => $events_club,
            'membres' => $membres,
            'informations_feminines' => $informations_feminines,
            'informations_masculines' => $informations_masculines,
            'informations_mixte' => $informations_mixte,
            'salaries' => $salaries
        ]);
    }
}

<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipesController extends AbstractController
{
    #[Route('/equipes', name: 'app_equipes')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $equipes = $doctrine->getRepository('App\Entity\PhotoEquipe')->findAll();
        for ($i=0; $i < count($equipes); $i++) {
            if ($equipes[$i]->getLienCalendrier() == null) {
                $equipes[$i]->setNbLiens(0);
            } else {
                $liens = $equipes[$i]->getLienCalendrierFormat();
                $equipes[$i]->setLienCalendrierFormat($liens);
                $equipes[$i]->setNbLiens(count($liens));
            }
        }
        return $this->render('equipes/index.html.twig', [
            'equipes' => $equipes

        ]);
    }

    #[Route('/equipes/{idEquipe}', name: 'app_equipes_detail')]
    public function equipe(ManagerRegistry $doctrine, int $idEquipe = 0): Response
    {
        $equipe = $doctrine->getManager()->getRepository('App\Entity\PhotoEquipe')->findBy(['id'=>$idEquipe]);
        return $this->render('equipes/index.html.twig', [
            'equipe' => $equipe

        ]);
    }
}

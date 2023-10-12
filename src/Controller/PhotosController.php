<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotosController extends AbstractController
{
    #[Route('/{_locale}/photos', name: 'app_photos' , requirements:['locale' => '%app.supported_locales%'], defaults: ['_locale' => 'fr'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repphotos_prioritaire = $doctrine->getRepository('App\Entity\Repphotos')->findBy(["prioritaire" => "1"], ['daterep' => 'DESC']);
        for ($i = 0; $i < count($repphotos_prioritaire); $i++) {
            $id_rep = $repphotos_prioritaire[$i]->getId(); 
            $photos = $doctrine->getRepository('App\Entity\Photo')->findBy(["id_repphoto" => $id_rep]);
            if (!empty($photos)){
                $repphotos_prioritaire[$i]->addPhoto($photos[0]);
            }
        }
        $repphotos_non_prioritaire = $doctrine->getRepository('App\Entity\Repphotos')->findBy(["prioritaire" => "0"], ['daterep' => 'DESC']);
        for ($i = 0; $i < count($repphotos_non_prioritaire); $i++) {
            $id_rep = $repphotos_non_prioritaire[$i]->getId(); 
            $photos = $doctrine->getRepository('App\Entity\Photo')->findBy(["id_repphoto" => $id_rep]);
            if(!empty($photos)){
                $repphotos_non_prioritaire[$i]->addPhoto($photos[0]);
            }
        }
        return $this->render('photos/index.html.twig', [
            'repphotos_prioritaire' => $repphotos_prioritaire,
            'repphotos_non_prioritaire' => $repphotos_non_prioritaire,
        ]);
    }

    #[Route('/{_locale}/photos/{idRepPhotos}', name: 'app_photos_affiche' , requirements:['locale' => '%app.supported_locales%','idRepPhotos' => '\d+'], defaults: ['_locale' => 'fr'])]
    public function photos(ManagerRegistry $doctrine, int $idRepPhotos): Response
    {
        $nom_repertoire = $doctrine->getRepository('App\Entity\Repphotos')->findBy(["id" => $idRepPhotos]);
        $photos = $doctrine->getRepository('App\Entity\Photo')->findBy(["id_repphoto" => $idRepPhotos]);
        return $this->render('photos/affiche_photo.html.twig', [
            'photos' => $photos,
            'nom_repertoire' => $nom_repertoire,
        ]);
    }
}
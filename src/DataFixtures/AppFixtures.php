<?php

namespace App\DataFixtures;

use App\Entity\PhotoEquipe;
use App\Entity\PostAcceuil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        $posts_acceuil = json_decode(self::POST_ACCEUIL);
        $equipes = json_decode(self::EQUIPES);
        foreach ($posts_acceuil as $post) {
            $post_acceuil = new PostAcceuil();
            $post_acceuil->setTitre($post->titre);
            $post_acceuil->setImage($post->image);
            $post_acceuil->setParagraphe($post->paragraphe);
            $post_acceuil->setDate(new \DateTime($post->date));
            $manager->persist($post_acceuil);
        }
        foreach ($equipes as $equipe) {
            $photo_equipe = new PhotoEquipe();
            $photo_equipe->setNom($equipe->nom);
            $photo_equipe->setImage($equipe->image);
            $photo_equipe->setLienCalendrier($equipe->lien_calendrier);
            $photo_equipe->setEntraineurs($equipe->entraineurs);
            $photo_equipe->setDescription($equipe->description);
            $manager->persist($photo_equipe);
        }

        $manager->flush();
    }
    const POST_ACCEUIL = <<<JSON
        [
            {
                "id" : 1,
                "titre" : "CHAMPIONS !!!",
                "image" : "images/acceuil/img-20230506-wa0017.jpg",
                "paragraphe" : "Grâce à leur victoire samedi, nos Séniors Masculin 1 sont champions de 1ère division territoriale et valident leur ticket pour le niveau supérieur l'année prochaine, l'Honneur Régional. Un grand merci à tous nos supporters pour cette saison mémorable !!!",
                "date" : "2023-07-23"
            },
            {
                "id" : 2,
                "titre" : "Saison 2023/2024",
                "image" : "images/acceuil/poule-sg1.jpg",
                "paragraphe" : "Les adversaires de nos Séniors Masculins 1 pour la saison prochaine sont désormais connus. Rendez-vous en septembre pour les encourager!!!",
                "date" : "2023-07-23"
            },
            {
                "id" : 3,
                "titre" : "Aujourd'hui, plus que jamais, le HBR remercie ses partenaires pour leur soutien",
                "image" : "images/acceuil/07-2023.jpg",
                "paragraphe" : null,
                "date" : "2023-07-23"
            }
        ]
    JSON;

    const EQUIPES = <<<JSON
        [
            {
                "id" : 1,
                "nom" : "Baby - Hand",
                "image" : "images/photos-equipes/baby-hand.jpg",
                "lien_calendrier" : null,
                "entraineurs" : "Brigitte / Cassy / Antony / Réal",
                "description" : "Entrainement le samedi de 9h30 à 10h30 au Gymnase La Seytaz"
            },
            {
                "id" : 2,
                "nom" : "Mini -Hand",
                "image" : "images/photos-equipes/mini-hand.jpg",
                "lien_calendrier" : null,
                "entraineurs" : "Cassy / Antoine / Corentin",
                "description" : "Entrainement le samedi 10h30 / 12h00 au Gymnase La Seytaz"
            },
            {
                "id" : 3,
                "nom" : "M9 Mixte",
                "image" : "images/photos-equipes/m9.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/departemental/moins-de-9-ans-mixte-1ere-phase-20479/#poule-112650",
                "entraineurs" : "Corentin / Maxence",
                "description" : "Entrainement le mercredi 15h15 / 16h45 au gymnase de La Seytaz"
            },
            {
                "id" : 4,
                "nom" : "M11 Masculin",
                "image" : "images/photos-equipes/m11-masculin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/departemental/mons-de-11-ans-mixte-1ere-phase-20478/#poule-112472, https://www.ffhandball.fr/competitions/saison-2022-2023-18/departemental/mons-de-11-ans-mixte-1ere-phase-20478/#poule-112470",
                "entraineurs" : "Corentin / Cédric / Hugo / Samuel",
                "description" : "Entrainement le mercredi 16h45 /18h15 au Gymnase La Seytaz"
            },
            {
                "id" : 5,
                "nom" : "M11 Féminin",
                "image" : "images/photos-equipes/m11-feminin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/departemental/mons-de-11-ans-mixte-1ere-phase-20478/#poule-112641",
                "entraineurs" : "Cassy / Mic",
                "description" : "Entrainement le mercredi 15h15 /16h45 au Gymnase La Seytaz"
            },
            {
                "id" : 6,
                "nom" : "M13 Masculin",
                "image" : "images/photos-equipes/m13-masculin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/m13-ans-masculin-excellence-aura-19743/#poule-108558,https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/division-aura-m13-ans-masculin-19755/#poule-113147",
                "entraineurs" : "Mic / Esteban / Franck / Matthieu",
                "description" : "Entrainement le vendredi 17h30/19h00 au Gymnase La Seytaz"
            },
            {
                "id" : 7,
                "nom" : "M13 Féminin",
                "image" : "images/photos-equipes/m13-feminin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/division-aura-m13-ans-feminin-19758/#poule-https://www.ffhandball.fr/fr/competition/19817#poule-113097",
                "entraineurs" : "Mic / Cassy / Romain",
                "description" : "Entrainement le jeudi 17h30/19h00 au Gymnase La Seytaz"
            },
            {
                "id" : 8,
                "nom" : "M15 Féminin",
                "image" : "images/photos-equipes/m15-feminin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/division-aura-m15-ans-feminin-19757/#poule-113172",
                "entraineurs" : "Emeric / Corentin",
                "description" : "Entrainement le mardi 20h00/21h30 au Gymnase La Seytaz"
            },
            {
                "id" : 9,
                "nom" : "M15 Masculin",
                "image" : "images/photos-equipes/m15-masculin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/division-aura-m15-ans-masculin-19754/#poule-113083",
                "entraineurs" : "Stéphane / Corentin",
                "description" : "Entrainement le mardi 20h00/21h30 (à confirmer) et le jeudi 19h00/20h30 au Gymnase La Seytaz"
            },
            {
                "id" : 10,
                "nom" : "M18 Masculin",
                "image" : "images/photos-equipes/m18-masculin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/m18-ans-masculin-excellence-aura-19740/#poule-108532, https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/division-aura-m18-ans-masculin-19753/#poule-113067",
                "entraineurs" : "Vincent / Baptiste / Corentin / Matthieu",
                "description" : "Entrainements le mardi de 20h30/22h00 au Gymnase du Centenaire et le vendredi de 20h30/22h00 au Gymnase La Seytaz"
            },
            {
                "id" : 11,
                "nom" : "Séniors Féminin",
                "image" : "images/photos-equipes/seniors-feminin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/1ere-division-feminine-p16-aura-19738/#poule-112367",
                "entraineurs" : "Mic / Justin",
                "description" : "Entrainements le vendredi de 19h00/20h30 au Gymnase La Seytaz"
            },
            {
                "id" : 12,
                "nom" : "Séniors Masculin",
                "image" : "images/photos-equipes/seniors-masculin.jpg",
                "lien_calendrier" : "https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/1ere-division-masculine-p16-aura-19737/#poule-108301,https://www.ffhandball.fr/competitions/saison-2022-2023-18/regional/2eme-division-masculine-p16-aura-19739/#poule-112358",
                "entraineurs" : "Franck / Gaël",
                "description" : "Entrainements le lundi de 20h00/22h00 et le mercredi de 20h45 à 22h15 au Gymnase La Seytaz"
            },
            {
                "id" : 13,
                "nom" : "Loisirs Masculin",
                "image" : "images/photos-equipes/ufolep.jpg",
                "lien_calendrier" : null,
                "entraineurs" : "Vincent",
                "description" : "Entrainement le jeudi de 20h30 à 22h30 au Gymnase La Seytaz"
            }
        ]
    JSON;
}


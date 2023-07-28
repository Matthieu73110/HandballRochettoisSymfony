<?php

namespace App\DataFixtures;

use App\Entity\Partenaires;
use App\Entity\PhotoEquipe;
use App\Entity\PostAcceuil;
use App\Entity\Presse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $posts_acceuil = json_decode(self::POST_ACCEUIL);
        $equipes = json_decode(self::EQUIPES);
        $partenaires = json_decode(self::PARTENAIRES);
        $presses = json_decode(self::PRESSES);
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
        foreach ($partenaires as $partenaire) {
            $part = new Partenaires();
            $part->setNom($partenaire->nom);
            $part->setImage($partenaire->image);
            $part->setLienWeb($partenaire->lien_web);
            $part->setType($partenaire->type);
            $manager->persist($part);
        }
        foreach ($presses as $presse) {
            $press = new Presse();
            $press->setTitre($presse->titre);
            $press->setImage($presse->image);
            $press->setDate(new \DateTime($presse->date));
            $manager->persist($press);
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

    const PARTENAIRES = <<<JSON
        [
            {
                "id": 1,
                "nom": "Aprécial",
                "image": "images/partenaires/aprecial.jpg",
                "lien_web": "https://www.aprecial.fr/salon-de-coiffure-aprecial/salon-coiffure-recherche/listing/aprecial-la-rochette/",
                "type": "locaux"
            },
            {
                "id": 2,
                "nom": "Avicap",
                "image": "images/partenaires/avicap.png",
                "lien_web": "https://www.avicap.fr/courtier-credit-chambery.html",
                "type": "locaux"
            },
            {
                "id": 3,
                "nom": "Commune de Valgelon La Rochette",
                "image": "images/partenaires/logo-valgelon-la-rochette.png",
                "lien_web": "https://www.valgelon-la-rochette.com/",
                "type": "institutionnel"
            },
            {
                "id": 4,
                "nom": "Ligue Auvergne Rhône-Alpes de Handball",
                "image": "images/partenaires/ligue-aura.jpg",
                "lien_web": "https://aura-handball.fr/",
                "type": "institutionnel"
            },
            {
                "id": 5,
                "nom": "Ligue National de Handball",
                "image": "images/partenaires/lnh.jpg",
                "lien_web": "https://www.lnh.fr/",
                "type": "institutionnel"
            },
            {
                "id": 6,
                "nom": "Ligue Féminine de Handball",
                "image": "images/partenaires/lfh.jpg",
                "lien_web": "http://www.handlfh.org/",
                "type": "institutionnel"
            },
            {
                "id": 7,
                "nom": "Comité de Savoie de Handball",
                "image": "images/partenaires/csh.jpg",
                "lien_web": "https://www.savoie-handball.fr/accueil.html",
                "type": "institutionnel"
            },
            {
                "id": 8,
                "nom": "Département de Savoie",
                "image": "images/partenaires/departement.jpg",
                "lien_web": "https://www.savoie.fr/",
                "type": "institutionnel"
            },
            {
                "id": 9,
                "nom": "Région Auvergne Rhône-Alpes",
                "image": "images/partenaires/region-aura.jpg",
                "lien_web": "https://www.auvergnerhonealpes.fr/",
                "type": "institutionnel"
            },
            {
                "id": 10,
                "nom": "Au Resto Gourmand",
                "image": "images/partenaires/resto-gourmand.jpg",
                "lien_web": "https://www.aurestogourmand.com/",
                "type": "locaux"
            },
            {
                "id": 11,
                "nom": "Belledonne",
                "image": "images/partenaires/belledonne-corporate.png",
                "lien_web": "https://belledonne.bio/",
                "type": "locaux"
            },
            {
                "id": 12,
                "nom": "Boulangerie Laurent",
                "image": "images/partenaires/boulangerie-laurent.jpg",
                "lien_web": "https://www.banette.fr/",
                "type": "locaux"
            },
            {
                "id": 13,
                "nom": "Carrefour Market",
                "image": "images/partenaires/carrefour-market-la-rochette.jpg",
                "lien_web": "https://www.carrefour.fr/",
                "type": "locaux"
            },
            {
                "id": 14,
                "nom": "Cave Cellier Bayard",
                "image": "images/partenaires/cave-a-vins.jpg",
                "lien_web": "https://cellierbayard.com/",
                "type": "locaux"
            },
            {
                "id": 15,
                "nom": "Combe Savoie Emballage",
                "image": "images/partenaires/combe-savoie-emballage.jpg",
                "lien_web": "https://www.cse73.fr/",
                "type": "locaux"
            },
            {
                "id": 16,
                "nom": "Delko",
                "image": "images/partenaires/delko.jpg",
                "lien_web": "https://www.delko.fr/garage/delko/d%C3%89trier/101",
                "type": "locaux"
            },
            {
                "id": 17,
                "nom": "Garage Blanchin",
                "image": "images/partenaires/blanchin.jpg",
                "lien_web": "http://www.garage-blanchin.com/",
                "type": "locaux"
            },
            {
                "id": 18,
                "nom": "Garage Ghezzi",
                "image": "images/partenaires/ghezzi.jpg",
                "lien_web": "https://www.ad.fr/garage/carrosserie-ad-garage-christian-ghezzi",
                "type": "locaux"
            },
            {
                "id": 19,
                "nom": "Garage Mosca",
                "image": "images/partenaires/garage-mosca.jpg",
                "lien_web": "https://www.mosca-renault.com/",
                "type": "locaux"
            },
            {
                "id": 20,
                "nom": "Groupama",
                "image": "images/partenaires/groupama.png",
                "lien_web": "https://agences.groupama.fr/assurance/rhone-alpes-auvergne/agence-de-la-rochette-idGRA30622",
                "type": "locaux"
            },
            {
                "id": 21,
                "nom": "HAPI Immobilier",
                "image": "images/partenaires/hapi-immobilier.jpg",
                "lien_web": "https://www.groupe-hapi.com/",
                "type": "locaux"
            },
            {
                "id": 22,
                "nom": "Henri Raffin",
                "image": "images/partenaires/logo-raffin.png",
                "lien_web": "https://www.raffin.com/",
                "type": "locaux"
            },
            {
                "id": 23,
                "nom": "Jacques Kuzay",
                "image": "images/partenaires/jacques-kuzay.jpg",
                "lien_web": "https://www.artisans-du-batiment.com/artisan/kuzay-jacques/",
                "type": "locaux"
            },
            {
                "id": 24,
                "nom": "La Cavagnotte",
                "image": "images/partenaires/la-cavagnotte.jpg",
                "lien_web": "https://www.facebook.com/BoulangerieDuBredaCavagnotte/",
                "type": "locaux"
            },
            {
                "id": 25,
                "nom": "Glass Mobile",
                "image": "images/partenaires/glassmobile.jpg",
                "lien_web": "https://www.la-glassmobile.fr/",
                "type": "locaux"
            },
            {
                "id": 26,
                "nom": "Le trio de Choc",
                "image": "images/partenaires/trio-de-choc.jpg",
                "lien_web": "https://www.facebook.com/LeTrioDeChocLaRochette/",
                "type": "locaux"
            },
            {
                "id": 27,
                "nom": "Ovale TP",
                "image": "images/partenaires/ovale-tp.jpg",
                "lien_web": "https://www.facebook.com/Ovale-TP-339358840053516/",
                "type": "locaux"
            },
            {
                "id": 28,
                "nom": "Pizza Hola by Gustami",
                "image": "images/partenaires/pizza-hola.png",
                "lien_web": "https://www.facebook.com/pizzaholabygustamilarochette/",
                "type": "locaux"
            },
            {
                "id": 29,
                "nom": "Serrao",
                "image": "images/partenaires/serrao-facade.jpg",
                "lien_web": "http://www.serraofacades.com/",
                "type": "locaux"
            },
            {
                "id": 30,
                "nom": "Sibue Fabien",
                "image": "images/partenaires/sibue-fabien.jpg",
                "lien_web": "https://www.facebook.com/fabio.sibue/",
                "type": "locaux"
            },
            {
                "id": 31,
                "nom": "Société Nouvelle Reb",
                "image": "images/partenaires/ste-nvelle-reb.jpg",
                "lien_web": "https://reb.fr/",
                "type": "locaux"
            },
            {
                "id": 32,
                "nom": "Soresina",
                "image": "images/partenaires/soresina.jpg",
                "lien_web": "https://www.facebook.com/soresina73",
                "type": "locaux"
            },
            {
                "id": 33,
                "nom": "Team Sport 2000",
                "image": "images/partenaires/sport-2000.jpg",
                "lien_web": "http://www.sport2000-chambery.com/",
                "type": "locaux"
            },
            {
                "id": 34,
                "nom": "Thouvard",
                "image": "images/partenaires/thouvard.jpg",
                "lien_web": "http://www.thouvard.com/Thouvard/",
                "type": "locaux"
            },
            {
                "id": 35,
                "nom": "Vision Unik",
                "image": "images/partenaires/vision-unik.jpg",
                "lien_web": "https://www.vision-unik.com/",
                "type": "locaux"
            },
            {
                "id": 36,
                "nom": "Fédération Française de Handball",
                "image": "images/partenaires/ffhb.jpg",
                "lien_web": "https://www.ffhandball.fr/",
                "type": "institutionnel"
            },
            {
                "id": 37,
                "nom": "Jouty TP",
                "image": "images/partenaires/jouty-tp.jpg",
                "lien_web": "https://www.artisans-du-batiment.com/artisan/jouty-tp/",
                "type": "locaux"
            },
            {
                "id": 38,
                "nom": "La P'tiote Boutique",
                "image": "images/partenaires/ptiote-boutique.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 39,
                "nom": "Le Cardinal",
                "image": "images/partenaires/le-cardinal.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 40,
                "nom": "Le Mackenzy",
                "image": "images/partenaires/mackenzy.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 41,
                "nom": "Les jardins de Détrier",
                "image": "images/partenaires/jardins-de-detrier.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 42,
                "nom": "MP Etanch'",
                "image": "images/partenaires/mp-etanch.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 43,
                "nom": "NKL Services",
                "image": "images/partenaires/nkl-services.png",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 44,
                "nom": "Station Service Eni",
                "image": "images/partenaires/sarl-bernelie.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 45,
                "nom": "Bar le Val Pelouse",
                "image": "images/partenaires/le-val-pelouse.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 46,
                "nom": "Bar des Alpes",
                "image": "images/partenaires/bar-des-alpes.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 47,
                "nom": "Aux mille et une pages",
                "image": "images/partenaires/1001-pages.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 48,
                "nom": "Patrick Bourgeon",
                "image": "images/partenaires/bourgeon.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 49,
                "nom": "Durand Robert & Fils",
                "image": "images/partenaires/durand.jpg",
                "lien_web": null,
                "type": "locaux"
            },
            {
                "id": 50,
                "nom": "Thierry Gontard (Charpente)",
                "image": "images/partenaires/base.png",
                "lien_web": null,
                "type": "locaux"
            }
        ]
    JSON;

    const PRESSES = <<<JSON
        [
            {
                "id" : 1,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2023.01.09.jpg",
                "date" : "2023-01-09"
            },
            {
                "id" : 2,
                "titre" : "Article DL",
                "image" : "images/photo-presse/article-dl-5-11-18002.jpg",
                "date" : "2018-11-05"
            },
            {
                "id" : 3,
                "titre" : "Article DL",
                "image" : "images/photo-presse/article-dl-avril-2019003.jpg",
                "date" : "2019-04-01"
            },
            {
                "id" : 4,
                "titre" : "Article DL",
                "image" : "images/photo-presse/article-dl-21-mai-2019.jpg",
                "date" : "2019-05-21"
            },
            {
                "id" : 5,
                "titre" : "Article DL",
                "image" : "images/photo-presse/2019.11.27-hand-foyer.jpg",
                "date" : "2019-12-03"
            },
            {
                "id" : 6,
                "titre" : "Article DL",
                "image" : "images/photo-presse/2020.06.19-article-dl.jpg",
                "date" : "2020-06-19"
            },
            {
                "id" : 7,
                "titre" : "Article DL",
                "image" : "images/photo-presse/2020.09.04-article-dl.jpg",
                "date" : "2020-09-04"
            },
            {
                "id" : 8,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2021.04.17.jpg",
                "date" : "2021-04-17"
            },
            {
                "id" : 9,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2021.06.09.jpg",
                "date" : "2021-06-09"
            },
            {
                "id" : 10,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2021.07.05.jpg",
                "date" : "2021-07-05"
            },
            {
                "id" : 11,
                "titre" : "Article BM",
                "image" : "images/photo-presse/extrait-bm-decembre.png",
                "date" : "2021-12-01"
            },
            {
                "id" : 12,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2021.02.07.jpg",
                "date" : "2022-02-07"
            },
            {
                "id" : 13,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl2022.05.01.jpg",
                "date" : "2022-04-20"
            },
            {
                "id" : 14,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2022.06.23.jpg",
                "date" : "2022-06-23"
            },
            {
                "id" : 15,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2023.01.09.jpg",
                "date" : "2023-01-09"
            },
            {
                "id" : 16,
                "titre" : "Article DL",
                "image" : "images/photo-presse/dl-2023.04.25.jpg",
                "date" : "2023-04-25"
            }
            
        ]
    JSON;
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class BackofficeController extends AbstractController
{
    #[Route('/backoffice', name: 'app_backoffice')]
    public function index(Connection $connection): Response
    {
        $tables = $this->getTables($connection);
        $tablesToRemove = ["doctrine_migration_versions", "messenger_messages"];

        // Parcourir le tableau et supprimer les éléments
        foreach ($tables as $key => $table) {
            if (in_array($table["Tables_in_handballrochettois"], $tablesToRemove)) {
                unset($tables[$key]);
            } else {
                $tables[$key]["name_table"] = $this->getNameTable($table["Tables_in_handballrochettois"]);
            }
        }

        // Réindexer le tableau pour obtenir des clés continues si nécessaire
        $tables = array_values($tables);
        // dd($tables);
        return $this->render('backoffice/index.html.twig', [
            'tables' => $tables
        ]);
    }

    // Injectez le service Doctrine\DBAL\Connection dans votre classe (vous pouvez le faire dans un contrôleur ou un service)
    public function getTables(Connection $connection)
    {
        // Obtenez le nom de la base de données configurée dans votre application Symfony
        $databaseName = $connection->getDatabase();

        // Exécutez une requête SQL pour récupérer la liste des tables
        $sql = "SHOW TABLES FROM $databaseName";
        $tables = $connection->fetchAllAssociative($sql);

        // $tables contiendra la liste des tables
        return $tables;
    }

    public function getNameTable(string $name_table){
        switch($name_table){
            case 'eventclub':
                $name_table_normalizate = "Événements du club";
                break;
            case 'informationequipe':
                $name_table_normalizate = "Informations sur les équipes";
                break;
            case 'membrebureau':
                $name_table_normalizate = "Membres du bureau";
                break;
            case 'partenaires':
                $name_table_normalizate = "Partenaires";
                break;
            case 'photo':
                $name_table_normalizate = "Photos";
                break;
            case 'photo_equipe':
                $name_table_normalizate = "Photos d'équipes";
                break;
            case 'post_acceuil':
                $name_table_normalizate = "Articles d'accueil";
                break;
            case 'presse':
                $name_table_normalizate = "Article de Presses";
                break;
            case 'salarie':
                $name_table_normalizate = "Salariés";
                break;
            case 'repphotos':
                $name_table_normalizate = "Nom des Dossiers pour les photos";
                break;
            case 'user':
                $name_table_normalizate = "Utilisateurs";
                break;
            default:
                $name_table_normalizate = "";
        }
        return $name_table_normalizate;
    }

    #[Route('/backoffice/show/{name_table}', name: 'app_backoffice_show', requirements: ['name_table' => '[a-zA-Z0-9_]+'])]
    public function show(Connection $connection, string $name_table): Response
    {
        $sql = "SELECT * FROM $name_table";
        $tableContent = $connection->fetchAllAssociative($sql);
    
        // Envoyez les données à votre template
        return $this->render('backoffice/show.html.twig', [
            'tableContent' => $tableContent,
            'name_table_normalizate' => $this->getNameTable($name_table),
        ]);
    }

    #[Route('/backoffice/edit/{name_table}', name: 'app_backoffice_edit', requirements: ['name_table' => '[a-zA-Z0-9_]+'])]
    public function edit(Connection $connection, string $name_table): Response
    {
        $sql = "SELECT * FROM $name_table";
        $tableContent = $connection->fetchAllAssociative($sql);
    
        // Envoyez les données à votre template
        return $this->render('backoffice/edit.html.twig', [
            'tableContent' => $tableContent,
        ]);
    }

    #[Route('/backoffice/delete/{name_table}/{id}', name: 'app_backoffice_edit', requirements: ['name_table' => '[a-zA-Z0-9_]+', 'id' => '\d+'])]
    public function delete(Connection $connection, string $name_table, int $id): Response
    {
        $sql = "SELECT * FROM $name_table";
        $tableContent = $connection->fetchAllAssociative($sql);
    
        // Envoyez les données à votre template
        return $this->render('backoffice/edit.html.twig', [
            'tableContent' => $tableContent,
        ]);
    }
}


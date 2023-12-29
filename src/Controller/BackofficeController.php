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
}


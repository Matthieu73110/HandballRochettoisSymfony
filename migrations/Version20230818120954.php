<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230818120954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_repphoto_id INT DEFAULT NULL, lien_image VARCHAR(255) NOT NULL, INDEX IDX_14B7841890A082D (id_repphoto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repphotos (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prioritaire TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841890A082D FOREIGN KEY (id_repphoto_id) REFERENCES repphotos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841890A082D');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE repphotos');
    }
}

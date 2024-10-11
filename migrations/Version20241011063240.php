<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241011063240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(60) NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(60) NOT NULL, mail VARCHAR(60) NOT NULL, telephone INT NOT NULL, adresse_depart VARCHAR(255) NOT NULL, ville_depart VARCHAR(60) NOT NULL, cp_depart INT NOT NULL, pays_depart VARCHAR(60) NOT NULL, adresse_destination VARCHAR(255) NOT NULL, ville_destination VARCHAR(60) NOT NULL, cp_destination INT NOT NULL, pays_destination VARCHAR(60) NOT NULL, longueur INT NOT NULL, largeur INT NOT NULL, hauteur INT NOT NULL, poid INT NOT NULL, type_marchandise VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande');
    }
}

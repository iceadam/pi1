<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307112435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campagne (id INT AUTO_INCREMENT NOT NULL, datedeb DATE NOT NULL, datefin DATE NOT NULL, image VARCHAR(255) NOT NULL, createur VARCHAR(255) NOT NULL, nomcampagne VARCHAR(255) NOT NULL, descri VARCHAR(255) NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dash (id INT AUTO_INCREMENT NOT NULL, campagne_id INT NOT NULL, nb_visites INT NOT NULL, nb_participations INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, campagne_id INT DEFAULT NULL, lieu VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, nbparticipant INT NOT NULL, objectif INT DEFAULT NULL, INDEX IDX_3BAE0AA716227374 (campagne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, user_id INT NOT NULL, event_id INT NOT NULL, camp_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA716227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id)');
        $this->addSql('DROP TABLE compagne');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compagne (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA716227374');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE dash');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE participation');
    }
}

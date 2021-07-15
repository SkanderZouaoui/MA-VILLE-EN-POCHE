<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715105059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, cafe_id INT DEFAULT NULL, sport_id INT DEFAULT NULL, sante_id INT DEFAULT NULL, bricolage_id INT DEFAULT NULL, viepratique_id INT DEFAULT NULL, vetement_id INT DEFAULT NULL, vacance_id INT DEFAULT NULL, culture_id INT DEFAULT NULL, restaurant_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_9474526C6710CC07 (cafe_id), INDEX IDX_9474526CAC78BCF8 (sport_id), INDEX IDX_9474526CC1683D7D (sante_id), INDEX IDX_9474526C6971B526 (bricolage_id), INDEX IDX_9474526CEF87E4BF (viepratique_id), INDEX IDX_9474526C969D8B67 (vetement_id), INDEX IDX_9474526C59F490E3 (vacance_id), INDEX IDX_9474526CB108249D (culture_id), INDEX IDX_9474526CB1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6710CC07 FOREIGN KEY (cafe_id) REFERENCES cafe (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6971B526 FOREIGN KEY (bricolage_id) REFERENCES bricolage (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEF87E4BF FOREIGN KEY (viepratique_id) REFERENCES vie_pratique (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C969D8B67 FOREIGN KEY (vetement_id) REFERENCES vetement (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C59F490E3 FOREIGN KEY (vacance_id) REFERENCES vacance (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comment');
    }
}

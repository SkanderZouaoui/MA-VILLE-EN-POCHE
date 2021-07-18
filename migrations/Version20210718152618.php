<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210718152618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, note VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE note');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6971B526 FOREIGN KEY (bricolage_id) REFERENCES bricolage (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEF87E4BF FOREIGN KEY (viepratique_id) REFERENCES vie_pratique (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C969D8B67 FOREIGN KEY (vetement_id) REFERENCES vetement (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C59F490E3 FOREIGN KEY (vacance_id) REFERENCES vacance (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_9474526CAC78BCF8 ON comment (sport_id)');
        $this->addSql('CREATE INDEX IDX_9474526CC1683D7D ON comment (sante_id)');
        $this->addSql('CREATE INDEX IDX_9474526C6971B526 ON comment (bricolage_id)');
        $this->addSql('CREATE INDEX IDX_9474526CEF87E4BF ON comment (viepratique_id)');
        $this->addSql('CREATE INDEX IDX_9474526C969D8B67 ON comment (vetement_id)');
        $this->addSql('CREATE INDEX IDX_9474526C59F490E3 ON comment (vacance_id)');
        $this->addSql('CREATE INDEX IDX_9474526CB108249D ON comment (culture_id)');
        $this->addSql('CREATE INDEX IDX_9474526CB1E7706E ON comment (restaurant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, cafe_id INT DEFAULT NULL, note DOUBLE PRECISION NOT NULL, INDEX IDX_CFBDFA146710CC07 (cafe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA146710CC07 FOREIGN KEY (cafe_id) REFERENCES cafe (id)');
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CAC78BCF8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CC1683D7D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6971B526');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CEF87E4BF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C969D8B67');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C59F490E3');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB108249D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB1E7706E');
        $this->addSql('DROP INDEX IDX_9474526CAC78BCF8 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CC1683D7D ON comment');
        $this->addSql('DROP INDEX IDX_9474526C6971B526 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CEF87E4BF ON comment');
        $this->addSql('DROP INDEX IDX_9474526C969D8B67 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C59F490E3 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CB108249D ON comment');
        $this->addSql('DROP INDEX IDX_9474526CB1E7706E ON comment');
    }
}

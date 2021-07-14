<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714140248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD sante_id INT DEFAULT NULL, ADD bricolage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6971B526 FOREIGN KEY (bricolage_id) REFERENCES bricolage (id)');
        $this->addSql('CREATE INDEX IDX_9474526CAC78BCF8 ON comment (sport_id)');
        $this->addSql('CREATE INDEX IDX_9474526CC1683D7D ON comment (sante_id)');
        $this->addSql('CREATE INDEX IDX_9474526C6971B526 ON comment (bricolage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CAC78BCF8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CC1683D7D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6971B526');
        $this->addSql('DROP INDEX IDX_9474526CAC78BCF8 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CC1683D7D ON comment');
        $this->addSql('DROP INDEX IDX_9474526C6971B526 ON comment');
        $this->addSql('ALTER TABLE comment DROP sante_id, DROP bricolage_id');
    }
}

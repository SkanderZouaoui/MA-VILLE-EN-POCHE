<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719142719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE images');
        $this->addSql('ALTER TABLE note ADD vacance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1459F490E3 FOREIGN KEY (vacance_id) REFERENCES vacance (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA1459F490E3 ON note (vacance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, cafe_id INT DEFAULT NULL, INDEX IDX_E01FBE6A6710CC07 (cafe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6710CC07 FOREIGN KEY (cafe_id) REFERENCES cafe (id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1459F490E3');
        $this->addSql('DROP INDEX IDX_CFBDFA1459F490E3 ON note');
        $this->addSql('ALTER TABLE note DROP vacance_id');
    }
}

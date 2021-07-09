<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709133438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE sante ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE sport ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE vacance ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE vetement ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE vie_pratique ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE sante DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE sport DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE vacance DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE vetement DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE vie_pratique DROP latitude, DROP longitude');
    }
}

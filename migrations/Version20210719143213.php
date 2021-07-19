<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719143213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE images');
        $this->addSql('ALTER TABLE note ADD culture_id INT DEFAULT NULL, ADD restaurant_id INT DEFAULT NULL, ADD sante_id INT DEFAULT NULL, ADD vetement_id INT DEFAULT NULL, ADD viepratique_id INT DEFAULT NULL, ADD bricolage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14C1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14969D8B67 FOREIGN KEY (vetement_id) REFERENCES vetement (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EF87E4BF FOREIGN KEY (viepratique_id) REFERENCES vie_pratique (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA146971B526 FOREIGN KEY (bricolage_id) REFERENCES bricolage (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14B108249D ON note (culture_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14B1E7706E ON note (restaurant_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14C1683D7D ON note (sante_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14969D8B67 ON note (vetement_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14EF87E4BF ON note (viepratique_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA146971B526 ON note (bricolage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, cafe_id INT DEFAULT NULL, INDEX IDX_E01FBE6A6710CC07 (cafe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6710CC07 FOREIGN KEY (cafe_id) REFERENCES cafe (id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B108249D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B1E7706E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14C1683D7D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14969D8B67');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EF87E4BF');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA146971B526');
        $this->addSql('DROP INDEX IDX_CFBDFA14B108249D ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14B1E7706E ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14C1683D7D ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14969D8B67 ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14EF87E4BF ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA146971B526 ON note');
        $this->addSql('ALTER TABLE note DROP culture_id, DROP restaurant_id, DROP sante_id, DROP vetement_id, DROP viepratique_id, DROP bricolage_id');
    }
}

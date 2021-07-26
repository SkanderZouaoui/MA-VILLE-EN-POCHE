<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719164723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE note ADD sport_id INT DEFAULT NULL, ADD vacance_id INT DEFAULT NULL, ADD culture_id INT DEFAULT NULL, ADD restaurant_id INT DEFAULT NULL, ADD sante_id INT DEFAULT NULL, ADD vetement_id INT DEFAULT NULL, ADD viepratique_id INT DEFAULT NULL, ADD bricolage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1459F490E3 FOREIGN KEY (vacance_id) REFERENCES vacance (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14C1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14969D8B67 FOREIGN KEY (vetement_id) REFERENCES vetement (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EF87E4BF FOREIGN KEY (viepratique_id) REFERENCES vie_pratique (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA146971B526 FOREIGN KEY (bricolage_id) REFERENCES bricolage (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14AC78BCF8 ON note (sport_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA1459F490E3 ON note (vacance_id)');
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
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14AC78BCF8');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1459F490E3');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B108249D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B1E7706E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14C1683D7D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14969D8B67');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EF87E4BF');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA146971B526');
        $this->addSql('DROP INDEX IDX_CFBDFA14AC78BCF8 ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA1459F490E3 ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14B108249D ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14B1E7706E ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14C1683D7D ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14969D8B67 ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14EF87E4BF ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA146971B526 ON note');
        $this->addSql('ALTER TABLE note DROP sport_id, DROP vacance_id, DROP culture_id, DROP restaurant_id, DROP sante_id, DROP vetement_id, DROP viepratique_id, DROP bricolage_id');
    }
}

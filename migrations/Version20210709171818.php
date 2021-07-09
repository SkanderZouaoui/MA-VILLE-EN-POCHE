<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709171818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A20713D3BB7C');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP INDEX IDX_2038A20713D3BB7C ON plat');
        $this->addSql('ALTER TABLE plat CHANGE idmenu_id idresto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A20783ADA0DC FOREIGN KEY (idresto_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_2038A20783ADA0DC ON plat (idresto_id)');
        $this->addSql('ALTER TABLE restaurant ADD nommenu VARCHAR(255) NOT NULL, ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, idrestaurant_id INT DEFAULT NULL, nommenu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_7D053A93C87D67B5 (idrestaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C87D67B5 FOREIGN KEY (idrestaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A20783ADA0DC');
        $this->addSql('DROP INDEX IDX_2038A20783ADA0DC ON plat');
        $this->addSql('ALTER TABLE plat CHANGE idresto_id idmenu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A20713D3BB7C FOREIGN KEY (idmenu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_2038A20713D3BB7C ON plat (idmenu_id)');
        $this->addSql('ALTER TABLE restaurant DROP nommenu, DROP latitude, DROP longitude');
    }
}

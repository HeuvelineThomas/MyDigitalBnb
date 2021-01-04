<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210104162947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD reservation_user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FD2CACBB FOREIGN KEY (reservation_user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C84955FD2CACBB ON reservation (reservation_user_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FD2CACBB');
        $this->addSql('DROP INDEX IDX_42C84955FD2CACBB ON reservation');
        $this->addSql('ALTER TABLE reservation DROP reservation_user_id_id');
    }
}

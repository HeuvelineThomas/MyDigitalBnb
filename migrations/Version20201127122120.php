<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127122120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing ADD housing_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C31E93B05D FOREIGN KEY (housing_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FB8142C31E93B05D ON housing (housing_user_id)');
        $this->addSql('ALTER TABLE reservation ADD reservation_user_id INT NOT NULL, ADD reservation_housing_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C0FB6810 FOREIGN KEY (reservation_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955CDF2BA57 FOREIGN KEY (reservation_housing_id) REFERENCES housing (id)');
        $this->addSql('CREATE INDEX IDX_42C84955C0FB6810 ON reservation (reservation_user_id)');
        $this->addSql('CREATE INDEX IDX_42C84955CDF2BA57 ON reservation (reservation_housing_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C31E93B05D');
        $this->addSql('DROP INDEX IDX_FB8142C31E93B05D ON housing');
        $this->addSql('ALTER TABLE housing DROP housing_user_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C0FB6810');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955CDF2BA57');
        $this->addSql('DROP INDEX IDX_42C84955C0FB6810 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955CDF2BA57 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP reservation_user_id, DROP reservation_housing_id');
    }
}

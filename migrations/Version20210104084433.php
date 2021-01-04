<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210104084433 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE housing (id INT AUTO_INCREMENT NOT NULL, title_housing VARCHAR(255) NOT NULL, description_housing LONGTEXT NOT NULL, disponibility_housing DATETIME NOT NULL, price_per_night_housing INT NOT NULL, type_housing VARCHAR(255) NOT NULL, street_housing VARCHAR(255) NOT NULL, post_code_housing VARCHAR(255) NOT NULL, city_housing VARCHAR(255) NOT NULL, img_housing VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, reservation_housing_id INT NOT NULL, arrival_date_reservation DATETIME NOT NULL, departude_date_reservation DATETIME NOT NULL, date_reservation DATETIME NOT NULL, INDEX IDX_42C84955CDF2BA57 (reservation_housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstnam_user VARCHAR(255) NOT NULL, name_user VARCHAR(255) NOT NULL, phone_number_user VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, street_user VARCHAR(255) DEFAULT NULL, post_code_user VARCHAR(50) DEFAULT NULL, city_user VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955CDF2BA57 FOREIGN KEY (reservation_housing_id) REFERENCES housing (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955CDF2BA57');
        $this->addSql('DROP TABLE housing');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE user');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415114503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE college (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, code_insee INT NOT NULL, commune VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, nom_court VARCHAR(255) DEFAULT NULL, coord_x VARCHAR(255) NOT NULL, coord_y VARCHAR(255) NOT NULL, y VARCHAR(255) NOT NULL, x VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop (id INT AUTO_INCREMENT NOT NULL, stop_id VARCHAR(255) NOT NULL, stop_code VARCHAR(255) DEFAULT NULL, stop_name VARCHAR(255) NOT NULL, stop_desc VARCHAR(255) DEFAULT NULL, stop_lat VARCHAR(255) NOT NULL, stop_lon VARCHAR(255) NOT NULL, zone_id VARCHAR(255) DEFAULT NULL, stop_url VARCHAR(255) DEFAULT NULL, location_type INT DEFAULT NULL, parent_station VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop_college (stop_id INT NOT NULL, college_id INT NOT NULL, INDEX IDX_D0591243902063D (stop_id), INDEX IDX_D059124770124B2 (college_id), PRIMARY KEY(stop_id, college_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop_time (id INT AUTO_INCREMENT NOT NULL, stops_id INT DEFAULT NULL, trip_id VARCHAR(255) NOT NULL, arrival_time TIME NOT NULL, departure_time TIME NOT NULL, stop_id VARCHAR(255) NOT NULL, stop_sequence VARCHAR(255) NOT NULL, pickup_type INT DEFAULT NULL, drop_off_type INT DEFAULT NULL, INDEX IDX_85725A5ABF20F332 (stops_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, route_id VARCHAR(255) NOT NULL, service_id VARCHAR(255) NOT NULL, trip_id VARCHAR(255) NOT NULL, trip_headsign VARCHAR(255) NOT NULL, direction_id INT NOT NULL, block_id VARCHAR(255) DEFAULT NULL, shape_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip_stop_time (trip_id INT NOT NULL, stop_time_id INT NOT NULL, INDEX IDX_986D1B0DA5BC2E0E (trip_id), INDEX IDX_986D1B0DF935CB1D (stop_time_id), PRIMARY KEY(trip_id, stop_time_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stop_college ADD CONSTRAINT FK_D0591243902063D FOREIGN KEY (stop_id) REFERENCES stop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stop_college ADD CONSTRAINT FK_D059124770124B2 FOREIGN KEY (college_id) REFERENCES college (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stop_time ADD CONSTRAINT FK_85725A5ABF20F332 FOREIGN KEY (stops_id) REFERENCES stop (id)');
        $this->addSql('ALTER TABLE trip_stop_time ADD CONSTRAINT FK_986D1B0DA5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trip_stop_time ADD CONSTRAINT FK_986D1B0DF935CB1D FOREIGN KEY (stop_time_id) REFERENCES stop_time (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stop_college DROP FOREIGN KEY FK_D059124770124B2');
        $this->addSql('ALTER TABLE stop_college DROP FOREIGN KEY FK_D0591243902063D');
        $this->addSql('ALTER TABLE stop_time DROP FOREIGN KEY FK_85725A5ABF20F332');
        $this->addSql('ALTER TABLE trip_stop_time DROP FOREIGN KEY FK_986D1B0DF935CB1D');
        $this->addSql('ALTER TABLE trip_stop_time DROP FOREIGN KEY FK_986D1B0DA5BC2E0E');
        $this->addSql('DROP TABLE college');
        $this->addSql('DROP TABLE stop');
        $this->addSql('DROP TABLE stop_college');
        $this->addSql('DROP TABLE stop_time');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE trip_stop_time');
    }
}

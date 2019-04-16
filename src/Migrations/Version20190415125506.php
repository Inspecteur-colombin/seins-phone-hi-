<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415125506 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE college ADD code INT NOT NULL, CHANGE coord_x coord_x DOUBLE PRECISION NOT NULL, CHANGE coord_y coord_y DOUBLE PRECISION NOT NULL, CHANGE y y DOUBLE PRECISION NOT NULL, CHANGE x x DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE stop CHANGE stop_lat stop_lat DOUBLE PRECISION NOT NULL, CHANGE stop_lon stop_lon DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE college DROP code, CHANGE coord_x coord_x VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE coord_y coord_y VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE y y VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE x x VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE stop CHANGE stop_lat stop_lat VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE stop_lon stop_lon VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}

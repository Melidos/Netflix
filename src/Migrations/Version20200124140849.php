<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124140849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE movie_genres (movie_id INT NOT NULL, genres_id INT NOT NULL, PRIMARY KEY(movie_id, genres_id))');
        $this->addSql('CREATE INDEX IDX_512C78638F93B6FC ON movie_genres (movie_id)');
        $this->addSql('CREATE INDEX IDX_512C78636A3B2603 ON movie_genres (genres_id)');
        $this->addSql('ALTER TABLE movie_genres ADD CONSTRAINT FK_512C78638F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movie_genres ADD CONSTRAINT FK_512C78636A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE movie_genres');
    }
}

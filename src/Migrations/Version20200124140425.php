<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200124140425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE user_movie (user_id INT NOT NULL, movie_id INT NOT NULL, PRIMARY KEY(user_id, movie_id))');
        $this->addSql('CREATE INDEX IDX_FF9C0937A76ED395 ON user_movie (user_id)');
        $this->addSql('CREATE INDEX IDX_FF9C09378F93B6FC ON user_movie (movie_id)');
        $this->addSql('ALTER TABLE user_movie ADD CONSTRAINT FK_FF9C0937A76ED395 FOREIGN KEY (user_id) REFERENCES userTable (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_movie ADD CONSTRAINT FK_FF9C09378F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE user_movie');
    }
}

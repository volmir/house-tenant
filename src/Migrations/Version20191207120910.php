<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191207120910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE suite_user (id INT AUTO_INCREMENT NOT NULL, suite_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_DDEE50794FFCB518 (suite_id), INDEX IDX_DDEE5079A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_8D93D6496BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE floor (id INT AUTO_INCREMENT NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, floor_id INT NOT NULL, suite_number VARCHAR(255) NOT NULL, INDEX IDX_153CE426854679E2 (floor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE suite_user ADD CONSTRAINT FK_DDEE50794FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE suite_user ADD CONSTRAINT FK_DDEE5079A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426854679E2 FOREIGN KEY (floor_id) REFERENCES floor (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE suite_user DROP FOREIGN KEY FK_DDEE5079A76ED395');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426854679E2');
        $this->addSql('ALTER TABLE suite_user DROP FOREIGN KEY FK_DDEE50794FFCB518');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496BF700BD');
        $this->addSql('DROP TABLE suite_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE floor');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP TABLE status');
    }
}

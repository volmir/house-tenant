<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191207135422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('
INSERT INTO `floor` (`id`, `level`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7),
	(8, 8),
	(9, 9),
	(10, 10),
	(11, 11),
	(12, 12),
	(13, 13),
	(14, 14);

INSERT INTO `suite` (`id`, `floor_id`, `suite_number`) VALUES
	(1, 1, \'101\'),
	(2, 1, \'102\'),
	(3, 1, \'103\'),
	(4, 2, \'201\'),
	(5, 2, \'202\'),
	(6, 7, \'701\'),
	(7, 7, \'702\'),
	(8, 13, \'PH01\'),
	(9, 13, \'PH02\'),
	(10, 14, \'LH01\'),
	(11, 14, \'LH02\');
        
INSERT INTO `status` (`id`, `name`) VALUES
	(1, \'active\'),
	(2, \'not active\'),
	(3, \'invited\');
            
INSERT INTO `user` (`id`, `status_id`, `firstname`, `lastname`) VALUES
	(1, 1, \'Ivan\', \'Ivanov\'),
	(2, 1, \'Petr\', \'Petrov\'),
	(3, 2, \'Sergey\', \'Sergeev\'),
	(4, 3, \'Alexey\', \'Alekseeev\'),
	(5, 3, \'Alexandr\', \'Alexandrov\');
            
INSERT INTO `suite_user` (`id`, `suite_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 1, 4),
	(3, 1, 1),
	(4, 1, 2),
	(5, 1, 3),
	(6, 2, 1),
	(7, 2, 2),
	(8, 2, 3);
');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DELETE FROM suite_user');
        $this->addSql('DELETE FROM user');
        $this->addSql('DELETE FROM status');        
        $this->addSql('DELETE FROM suite');
        $this->addSql('DELETE FROM floor');        
    }
}

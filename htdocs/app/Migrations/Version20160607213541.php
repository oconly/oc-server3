<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDBPlatform;
use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration to create field_note table and add foreign keys.
 */
final class Version20160607213541 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $platform = $this->connection->getDatabasePlatform();
        $this->abortIf(
                !($platform instanceof MySQLPlatform || $platform instanceof MariaDBPlatform),
                "Migration can only be executed safely on 'mysql' or 'mariadb'."
        );

        $this->addSql('CREATE TABLE field_note (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, geocache_id INT DEFAULT NULL, type SMALLINT NOT NULL, date DATETIME NOT NULL, text VARCHAR(255) DEFAULT NULL, INDEX IDX_DC7193AEA76ED395 (user_id), INDEX IDX_DC7193AE67030974 (geocache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = MyISAM');
        $this->addSql('ALTER TABLE field_note ADD CONSTRAINT FK_DC7193AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE field_note ADD CONSTRAINT FK_DC7193AE67030974 FOREIGN KEY (geocache_id) REFERENCES caches (cache_id) ON DELETE CASCADE');
    }
    
    public function down(Schema $schema): void
    {
        $platform = $this->connection->getDatabasePlatform();
        $this->abortIf(
                !($platform instanceof MySQLPlatform || $platform instanceof MariaDBPlatform),
                "Migration can only be executed safely on 'mysql' or 'mariadb'."
        );

        $this->addSql('DROP TABLE field_note');
    }
}

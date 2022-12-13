<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018065000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_groupe ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_groupe ADD CONSTRAINT FK_5106FB09727ACA70 FOREIGN KEY (parent_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_5106FB09727ACA70 ON photo_groupe (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_groupe DROP FOREIGN KEY FK_5106FB09727ACA70');
        $this->addSql('DROP INDEX IDX_5106FB09727ACA70 ON photo_groupe');
        $this->addSql('ALTER TABLE photo_groupe DROP parent_id');
    }
}

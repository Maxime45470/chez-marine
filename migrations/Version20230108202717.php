<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230108202717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info DROP FOREIGN KEY FK_CB8931575D8BC1F8');
        $this->addSql('DROP INDEX IDX_CB8931575D8BC1F8 ON info');
        $this->addSql('ALTER TABLE info CHANGE info_id email_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info ADD CONSTRAINT FK_CB893157A832C1C9 FOREIGN KEY (email_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_CB893157A832C1C9 ON info (email_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info DROP FOREIGN KEY FK_CB893157A832C1C9');
        $this->addSql('DROP INDEX IDX_CB893157A832C1C9 ON info');
        $this->addSql('ALTER TABLE info CHANGE email_id info_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info ADD CONSTRAINT FK_CB8931575D8BC1F8 FOREIGN KEY (info_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_CB8931575D8BC1F8 ON info (info_id)');
    }
}

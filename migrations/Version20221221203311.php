<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221203311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_groupe DROP FOREIGN KEY FK_5106FB09BCF5E72D');
        $this->addSql('DROP INDEX IDX_5106FB09BCF5E72D ON photo_groupe');
        $this->addSql('ALTER TABLE photo_groupe ADD categories_id INT DEFAULT NULL, DROP categorie_id, CHANGE parent_id parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_groupe ADD CONSTRAINT FK_5106FB09A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_5106FB09A21214B7 ON photo_groupe (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_groupe DROP FOREIGN KEY FK_5106FB09A21214B7');
        $this->addSql('DROP INDEX IDX_5106FB09A21214B7 ON photo_groupe');
        $this->addSql('ALTER TABLE photo_groupe ADD categorie_id INT NOT NULL, DROP categories_id, CHANGE parent_id parent_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo_groupe ADD CONSTRAINT FK_5106FB09BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_5106FB09BCF5E72D ON photo_groupe (categorie_id)');
    }
}

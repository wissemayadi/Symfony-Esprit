<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220219163026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture ADD voiture_relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FD92BC77 FOREIGN KEY (voiture_relation_id) REFERENCES chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810FD92BC77 ON voiture (voiture_relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FD92BC77');
        $this->addSql('DROP INDEX IDX_E9E2810FD92BC77 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP voiture_relation_id');
    }
}

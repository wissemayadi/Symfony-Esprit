<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212141348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien_immobilier (numimmo INT NOT NULL, numprop INT DEFAULT NULL, status VARCHAR(100) NOT NULL, prix INT NOT NULL, etat VARCHAR(100) NOT NULL, date VARCHAR(100) NOT NULL, INDEX IDX_D1BE34E1F282DDBE (numprop), PRIMARY KEY(numimmo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (numprop INT NOT NULL, nom VARCHAR(100) NOT NULL, numtel INT NOT NULL, PRIMARY KEY(numprop)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien_immobilier ADD CONSTRAINT FK_D1BE34E1F282DDBE FOREIGN KEY (numprop) REFERENCES proprietaire (numprop)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien_immobilier DROP FOREIGN KEY FK_D1BE34E1F282DDBE');
        $this->addSql('DROP TABLE bien_immobilier');
        $this->addSql('DROP TABLE proprietaire');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210926120123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voiture_options (voiture_id INT NOT NULL, options_id INT NOT NULL, INDEX IDX_2D74F737181A8BA (voiture_id), INDEX IDX_2D74F7373ADB05F1 (options_id), PRIMARY KEY(voiture_id, options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voiture_options ADD CONSTRAINT FK_2D74F737181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voiture_options ADD CONSTRAINT FK_2D74F7373ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE voiture_options');
    }
}

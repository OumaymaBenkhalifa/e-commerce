<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210819113553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE paiement_id paiement_id INT DEFAULT NULL, CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE users_id users_id INT DEFAULT NULL, CHANGE estimated_delivery_time estimated_delivery_time DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE paiement CHANGE users_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD username VARCHAR(255) NOT NULL, ADD is_active INT NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE paiement_id paiement_id INT DEFAULT NULL, CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE users_id users_id INT DEFAULT NULL, CHANGE estimated_delivery_time estimated_delivery_time DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paiement CHANGE users_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users DROP username, DROP is_active, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}

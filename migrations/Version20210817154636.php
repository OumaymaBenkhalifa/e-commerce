<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817154636 extends AbstractMigration
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
        $this->addSql('ALTER TABLE panier ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF267B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF267B3B43D ON panier (users_id)');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE paiement_id paiement_id INT DEFAULT NULL, CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE users_id users_id INT DEFAULT NULL, CHANGE estimated_delivery_time estimated_delivery_time DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paiement CHANGE users_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF267B3B43D');
        $this->addSql('DROP INDEX IDX_24CC0DF267B3B43D ON panier');
        $this->addSql('ALTER TABLE panier DROP users_id');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817131849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F081667B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C35F081667B3B43D ON adresse (users_id)');
        $this->addSql('ALTER TABLE commande ADD users_id INT DEFAULT NULL, CHANGE paiement_id paiement_id INT DEFAULT NULL, CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE estimated_delivery_time estimated_delivery_time DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D67B3B43D ON commande (users_id)');
        $this->addSql('ALTER TABLE paiement ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E67B3B43D ON paiement (users_id)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F081667B3B43D');
        $this->addSql('DROP INDEX IDX_C35F081667B3B43D ON adresse');
        $this->addSql('ALTER TABLE adresse DROP users_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D67B3B43D');
        $this->addSql('DROP INDEX IDX_6EEAA67D67B3B43D ON commande');
        $this->addSql('ALTER TABLE commande DROP users_id, CHANGE paiement_id paiement_id INT DEFAULT NULL, CHANGE panier_id panier_id INT DEFAULT NULL, CHANGE estimated_delivery_time estimated_delivery_time DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E67B3B43D');
        $this->addSql('DROP INDEX IDX_B1DC7A1E67B3B43D ON paiement');
        $this->addSql('ALTER TABLE paiement DROP users_id');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F77D927C');
        $this->addSql('DROP INDEX UNIQ_1483A5E9F77D927C ON users');
        $this->addSql('ALTER TABLE users DROP panier_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}

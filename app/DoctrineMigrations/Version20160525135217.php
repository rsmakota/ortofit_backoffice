<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160525135217 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE reasons_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE appointment_reasons_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reasons (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE appointment_reasons (id INT NOT NULL, appointment_id INT DEFAULT NULL, user_id INT DEFAULT NULL, reason_id INT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_83A00980E5B533F9 ON appointment_reasons (appointment_id)');
        $this->addSql('CREATE INDEX IDX_83A00980A76ED395 ON appointment_reasons (user_id)');
        $this->addSql('CREATE INDEX IDX_83A0098059BB1592 ON appointment_reasons (reason_id)');
        $this->addSql('ALTER TABLE appointment_reasons ADD CONSTRAINT FK_83A00980E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment_reasons ADD CONSTRAINT FK_83A00980A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointment_reasons ADD CONSTRAINT FK_83A0098059BB1592 FOREIGN KEY (reason_id) REFERENCES reasons (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('ALTER TABLE appointments ADD bold BOOLEAN DEFAULT FALSE');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appointment_reasons DROP CONSTRAINT FK_83A0098059BB1592');
        $this->addSql('DROP SEQUENCE reasons_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE appointment_reasons_id_seq CASCADE');
        $this->addSql('DROP TABLE reasons');
        $this->addSql('DROP TABLE appointment_reasons');
        $this->addSql('ALTER TABLE appointments DROP bold');
    }
}

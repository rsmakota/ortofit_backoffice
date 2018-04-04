<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170307121725 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE service_groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE service_groups (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE services ADD service_group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169722827A FOREIGN KEY (service_group_id) REFERENCES service_groups (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_7332E169722827A ON services (service_group_id)');
        $this->addSql('ALTER TABLE family_statuses ALTER position DROP DEFAULT');
        $this->addSql('ALTER TABLE family_statuses ALTER position SET NOT NULL');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE services DROP CONSTRAINT FK_7332E169722827A');
        $this->addSql('DROP SEQUENCE service_groups_id_seq CASCADE');
        $this->addSql('DROP TABLE service_groups');
        $this->addSql('ALTER TABLE family_statuses ALTER position SET DEFAULT 1');
        $this->addSql('ALTER TABLE family_statuses ALTER position DROP NOT NULL');
        $this->addSql('DROP INDEX IDX_7332E169722827A');
        $this->addSql('ALTER TABLE services DROP service_group_id');
    }
}

<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170206185055 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE person_services ALTER number DROP DEFAULT');
        $this->addSql('ALTER TABLE person_services ALTER number SET NOT NULL');

        $this->addSql('ALTER TABLE appointments ADD phone_confirm BOOLEAN DEFAULT FALSE ');
        $this->addSql('ALTER TABLE appointments ALTER flyer DROP DEFAULT');
        $this->addSql('ALTER TABLE appointments ALTER flyer SET NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appointments DROP phone_confirm');
        $this->addSql('ALTER TABLE appointments ALTER flyer SET DEFAULT \'false\'');
        $this->addSql('ALTER TABLE appointments ALTER flyer DROP NOT NULL');

        $this->addSql('ALTER TABLE person_services ALTER number SET DEFAULT 1');
        $this->addSql('ALTER TABLE person_services ALTER number DROP NOT NULL');
    }
}

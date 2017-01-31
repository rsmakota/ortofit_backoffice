<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170125113220 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE insoles ALTER person_id DROP NOT NULL');
        $this->addSql('ALTER TABLE insoles ALTER appointment_id DROP NOT NULL');
        $this->addSql('ALTER TABLE services ALTER alias SET NOT NULL');
        $this->addSql('ALTER TABLE person_services ADD number INT DEFAULT 1');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE services ALTER alias DROP NOT NULL');
        $this->addSql('ALTER TABLE insoles ALTER person_id SET NOT NULL');
        $this->addSql('ALTER TABLE insoles ALTER appointment_id SET NOT NULL');
        $this->addSql('ALTER TABLE person_services DROP number');
    }
}

<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170207144509 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE family_statuses ADD position INT DEFAULT 1');
        $this->addSql('ALTER TABLE appointments ALTER phone_confirm DROP DEFAULT');
        $this->addSql('ALTER TABLE appointments ALTER phone_confirm SET NOT NULL');
        $this->addSql('ALTER TABLE persons ALTER gender SET NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE family_statuses DROP position');
        $this->addSql('ALTER TABLE persons ALTER gender DROP NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER phone_confirm SET DEFAULT FALSE');
        $this->addSql('ALTER TABLE appointments ALTER phone_confirm DROP NOT NULL');
    }
}

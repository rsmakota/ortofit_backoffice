<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160921162209 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE insoles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE insole_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE insoles (id INT NOT NULL, person_id INT NOT NULL, appointment_id INT NOT NULL, insole_type_id INT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, size VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FCC04808217BBB47 ON insoles (person_id)');
        $this->addSql('CREATE INDEX IDX_FCC04808E5B533F9 ON insoles (appointment_id)');
        $this->addSql('CREATE INDEX IDX_FCC048089ED47C28 ON insoles (insole_type_id)');
        $this->addSql('CREATE TABLE insole_types (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE insoles ADD CONSTRAINT FK_FCC04808217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE insoles ADD CONSTRAINT FK_FCC04808E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE insoles ADD CONSTRAINT FK_FCC048089ED47C28 FOREIGN KEY (insole_type_id) REFERENCES insole_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE services ADD alias VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ALTER username TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE users ALTER username_canonical TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE users ALTER email TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE users ALTER email_canonical TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE orders ALTER processed DROP DEFAULT');
        $this->addSql('ALTER TABLE orders ALTER processed SET NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER bold DROP DEFAULT');
        $this->addSql('ALTER TABLE appointments ALTER bold SET NOT NULL');
        $this->addSql('ALTER TABLE client_directions ALTER order_num DROP DEFAULT');
        $this->addSql('ALTER TABLE client_directions ALTER order_num SET NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE insoles DROP CONSTRAINT FK_FCC048089ED47C28');
        $this->addSql('DROP SEQUENCE insoles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE insole_types_id_seq CASCADE');
        $this->addSql('DROP TABLE insoles');
        $this->addSql('DROP TABLE insole_types');
        $this->addSql('ALTER TABLE client_directions ALTER order_num SET DEFAULT 1');
        $this->addSql('ALTER TABLE client_directions ALTER order_num DROP NOT NULL');
        $this->addSql('ALTER TABLE services DROP alias');
        $this->addSql('ALTER TABLE users ALTER username TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER username_canonical TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER email TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE users ALTER email_canonical TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE appointments ALTER bold SET DEFAULT \'false\'');
        $this->addSql('ALTER TABLE appointments ALTER bold DROP NOT NULL');
        $this->addSql('ALTER TABLE orders ALTER processed SET DEFAULT \'false\'');
        $this->addSql('ALTER TABLE orders ALTER processed DROP NOT NULL');
    }
}

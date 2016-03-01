<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160301224946 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE user_timetables_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE person_services_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE app_reminders_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_timetables (id INT NOT NULL, user_id INT DEFAULT NULL, office_id INT DEFAULT NULL, dow INT NOT NULL, start_hour INT NOT NULL, start_minute INT NOT NULL, end_hour INT NOT NULL, end_minute INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EC6AC92DA76ED395 ON user_timetables (user_id)');
        $this->addSql('CREATE INDEX IDX_EC6AC92DFFA0C224 ON user_timetables (office_id)');
        $this->addSql('CREATE TABLE person_services (id INT NOT NULL, client_id INT DEFAULT NULL, person_id INT DEFAULT NULL, appointment_id INT DEFAULT NULL, service_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E774445E19EB6921 ON person_services (client_id)');
        $this->addSql('CREATE INDEX IDX_E774445E217BBB47 ON person_services (person_id)');
        $this->addSql('CREATE INDEX IDX_E774445EE5B533F9 ON person_services (appointment_id)');
        $this->addSql('CREATE INDEX IDX_E774445EED5CA9E6 ON person_services (service_id)');
        $this->addSql('CREATE TABLE app_reminders (id INT NOT NULL, appointment_id INT DEFAULT NULL, person_id INT DEFAULT NULL, date_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C5FDE6E1E5B533F9 ON app_reminders (appointment_id)');
        $this->addSql('CREATE INDEX IDX_C5FDE6E1217BBB47 ON app_reminders (person_id)');
        $this->addSql('ALTER TABLE user_timetables ADD CONSTRAINT FK_EC6AC92DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_timetables ADD CONSTRAINT FK_EC6AC92DFFA0C224 FOREIGN KEY (office_id) REFERENCES offices (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person_services ADD CONSTRAINT FK_E774445E19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person_services ADD CONSTRAINT FK_E774445E217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person_services ADD CONSTRAINT FK_E774445EE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person_services ADD CONSTRAINT FK_E774445EED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE app_reminders ADD CONSTRAINT FK_C5FDE6E1E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE app_reminders ADD CONSTRAINT FK_C5FDE6E1217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persons ADD is_client BOOLEAN DEFAULT \'false\' NOT NULL');
        $this->addSql('ALTER TABLE persons ADD gender VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE countries ALTER length DROP DEFAULT');
        $this->addSql('ALTER TABLE countries ALTER length SET NOT NULL');
        $this->addSql('ALTER TABLE appointments ADD forwarder VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments ALTER date_time DROP DEFAULT');
        $this->addSql('ALTER TABLE appointments ALTER date_time SET NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER state DROP DEFAULT');
        $this->addSql('ALTER TABLE appointments ALTER state SET NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER duration SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER name SET NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_timetables_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE person_services_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE app_reminders_id_seq CASCADE');
        $this->addSql('DROP TABLE user_timetables');
        $this->addSql('DROP TABLE person_services');
        $this->addSql('DROP TABLE app_reminders');
        $this->addSql('ALTER TABLE countries ALTER length SET DEFAULT 12');
        $this->addSql('ALTER TABLE countries ALTER length DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER name DROP NOT NULL');

        $this->addSql('ALTER TABLE appointments DROP forwarder');
        $this->addSql('ALTER TABLE appointments ALTER date_time SET DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE appointments ALTER date_time DROP NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER state SET DEFAULT 1');
        $this->addSql('ALTER TABLE appointments ALTER state DROP NOT NULL');
        $this->addSql('ALTER TABLE appointments ALTER duration DROP NOT NULL');
        $this->addSql('ALTER TABLE persons DROP is_client');
        $this->addSql('ALTER TABLE persons DROP gender');
    }
}

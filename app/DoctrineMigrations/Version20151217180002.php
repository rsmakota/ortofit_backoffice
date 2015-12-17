<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151217180002 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE results DROP CONSTRAINT fk_9fa3e414853cd175');
        $this->addSql('ALTER TABLE questions DROP CONSTRAINT fk_8adc54d5853cd175');
        $this->addSql('ALTER TABLE result_variants DROP CONSTRAINT fk_149d4c027a7b643');
        $this->addSql('ALTER TABLE variants DROP CONSTRAINT fk_b39853e11e27f6bf');
        $this->addSql('ALTER TABLE result_variants DROP CONSTRAINT fk_149d4c023b69a9af');
        $this->addSql('DROP SEQUENCE questions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quizzes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE results_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE variants_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE services_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE diagnoses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE family_statuses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE orders_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE appointments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE persons_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE offices_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE client_directions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE services (id INT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE diagnoses (id INT NOT NULL, person_id INT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D2644031217BBB47 ON diagnoses (person_id)');
        $this->addSql('CREATE TABLE applications (id INT NOT NULL, country_id INT DEFAULT NULL, client_direction_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, type VARCHAR(255) NOT NULL, flow_service_name VARCHAR(255) NOT NULL, config TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F7C966F0F92F3E70 ON applications (country_id)');
        $this->addSql('CREATE INDEX IDX_F7C966F01E797B96 ON applications (client_direction_id)');
        $this->addSql('COMMENT ON COLUMN applications.config IS \'(DC2Type:json_array)\'');
        $this->addSql('CREATE TABLE cities (id INT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D95DB16BF92F3E70 ON cities (country_id)');
        $this->addSql('CREATE TABLE family_statuses (id INT NOT NULL, name VARCHAR(255) NOT NULL, general BOOLEAN NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE orders (id INT NOT NULL, client_id INT DEFAULT NULL, application_id INT DEFAULT NULL, service_id INT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E52FFDEE19EB6921 ON orders (client_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE3E030ACD ON orders (application_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEED5CA9E6 ON orders (service_id)');
        $this->addSql('CREATE TABLE persons (id INT NOT NULL, family_status_id INT DEFAULT NULL, client_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, born TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A25CC7D3A2399AD0 ON persons (family_status_id)');
        $this->addSql('CREATE INDEX IDX_A25CC7D319EB6921 ON persons (client_id)');
        $this->addSql('CREATE TABLE offices (id INT NOT NULL, city_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F574FF4C8BAC62AF ON offices (city_id)');
        $this->addSql('CREATE TABLE client_directions (id INT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E992FC23A8 ON users (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9A0D96FBF ON users (email_canonical)');
        $this->addSql('COMMENT ON COLUMN users.roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE diagnoses ADD CONSTRAINT FK_D2644031217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE applications ADD CONSTRAINT FK_F7C966F0F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE applications ADD CONSTRAINT FK_F7C966F01E797B96 FOREIGN KEY (client_direction_id) REFERENCES client_directions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BF92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE3E030ACD FOREIGN KEY (application_id) REFERENCES applications (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_A25CC7D3A2399AD0 FOREIGN KEY (family_status_id) REFERENCES family_statuses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persons ADD CONSTRAINT FK_A25CC7D319EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offices ADD CONSTRAINT FK_F574FF4C8BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE quizzes');
        $this->addSql('DROP TABLE result_variants');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE variants');
        $this->addSql('ALTER TABLE clients ADD client_direction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD gender VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E741E797B96 FOREIGN KEY (client_direction_id) REFERENCES client_directions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C82E741E797B96 ON clients (client_direction_id)');
        $this->addSql('ALTER TABLE appointments ADD office_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments ADD date_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NOW()');
        $this->addSql('ALTER TABLE appointments ADD state INT DEFAULT 1');
        $this->addSql('ALTER TABLE appointments ADD duration INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments RENAME COLUMN type TO description');
        $this->addSql('ALTER TABLE appointments ADD CONSTRAINT FK_6A41727AFFA0C224 FOREIGN KEY (office_id) REFERENCES offices (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appointments ADD CONSTRAINT FK_6A41727AED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6A41727AFFA0C224 ON appointments (office_id)');
        $this->addSql('CREATE INDEX IDX_6A41727AED5CA9E6 ON appointments (service_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE orders DROP CONSTRAINT FK_E52FFDEEED5CA9E6');
        $this->addSql('ALTER TABLE appointments DROP CONSTRAINT FK_6A41727AED5CA9E6');
        $this->addSql('ALTER TABLE orders DROP CONSTRAINT FK_E52FFDEE3E030ACD');
        $this->addSql('ALTER TABLE offices DROP CONSTRAINT FK_F574FF4C8BAC62AF');
        $this->addSql('ALTER TABLE persons DROP CONSTRAINT FK_A25CC7D3A2399AD0');
        $this->addSql('ALTER TABLE diagnoses DROP CONSTRAINT FK_D2644031217BBB47');
        $this->addSql('ALTER TABLE appointments DROP CONSTRAINT FK_6A41727AFFA0C224');
        $this->addSql('ALTER TABLE applications DROP CONSTRAINT FK_F7C966F01E797B96');
        $this->addSql('ALTER TABLE clients DROP CONSTRAINT FK_C82E741E797B96');
        $this->addSql('DROP SEQUENCE services_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE diagnoses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE family_statuses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE orders_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE appointments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE persons_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE offices_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE client_directions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE questions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quizzes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE results_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE variants_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quizzes (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_template VARCHAR(255) NOT NULL, result_template VARCHAR(255) NOT NULL, result_manager_id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE result_variants (result_id INT NOT NULL, variant_id INT NOT NULL, PRIMARY KEY(result_id, variant_id))');
        $this->addSql('CREATE INDEX idx_149d4c023b69a9af ON result_variants (variant_id)');
        $this->addSql('CREATE INDEX idx_149d4c027a7b643 ON result_variants (result_id)');
        $this->addSql('CREATE TABLE results (id INT NOT NULL, quiz_id INT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_9fa3e414853cd175 ON results (quiz_id)');
        $this->addSql('CREATE TABLE questions (id INT NOT NULL, quiz_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, index INT NOT NULL, position VARCHAR(255) NOT NULL, template VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_8adc54d5853cd175 ON questions (quiz_id)');
        $this->addSql('CREATE TABLE variants (id INT NOT NULL, question_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, index INT NOT NULL, positive BOOLEAN NOT NULL, result VARCHAR(255) DEFAULT NULL, recommendation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b39853e11e27f6bf ON variants (question_id)');
        $this->addSql('ALTER TABLE result_variants ADD CONSTRAINT fk_149d4c023b69a9af FOREIGN KEY (variant_id) REFERENCES variants (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE result_variants ADD CONSTRAINT fk_149d4c027a7b643 FOREIGN KEY (result_id) REFERENCES results (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT fk_9fa3e414853cd175 FOREIGN KEY (quiz_id) REFERENCES quizzes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT fk_8adc54d5853cd175 FOREIGN KEY (quiz_id) REFERENCES quizzes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE variants ADD CONSTRAINT fk_b39853e11e27f6bf FOREIGN KEY (question_id) REFERENCES questions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE diagnoses');
        $this->addSql('DROP TABLE applications');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE family_statuses');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE persons');
        $this->addSql('DROP TABLE offices');
        $this->addSql('DROP TABLE client_directions');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX IDX_C82E741E797B96');
        $this->addSql('ALTER TABLE clients DROP client_direction_id');
        $this->addSql('ALTER TABLE clients DROP name');
        $this->addSql('ALTER TABLE clients DROP gender');
        $this->addSql('DROP INDEX IDX_6A41727AFFA0C224');
        $this->addSql('DROP INDEX IDX_6A41727AED5CA9E6');
        $this->addSql('ALTER TABLE appointments DROP office_id');
        $this->addSql('ALTER TABLE appointments DROP service_id');
        $this->addSql('ALTER TABLE appointments DROP date_time');
        $this->addSql('ALTER TABLE appointments DROP state');
        $this->addSql('ALTER TABLE appointments DROP duration');
        $this->addSql('ALTER TABLE appointments RENAME COLUMN description TO type');
    }
}

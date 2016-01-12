<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160112170723 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users_groups (user_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_FF8AB7E0A76ED395 ON users_groups (user_id)');
        $this->addSql('CREATE INDEX IDX_FF8AB7E0FE54D947 ON users_groups (group_id)');
        $this->addSql('CREATE TABLE groups (id INT NOT NULL, name VARCHAR(255) NOT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D39705E237E06 ON groups (name)');
        $this->addSql('COMMENT ON COLUMN groups.roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD short VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointments ADD CONSTRAINT FK_6A41727AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6A41727AA76ED395 ON appointments (user_id)');
        $this->addSql('ALTER INDEX idx_f7c966f019eb6921 RENAME TO IDX_6A41727A19EB6921');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users_groups DROP CONSTRAINT FK_FF8AB7E0FE54D947');
        $this->addSql('DROP SEQUENCE groups_id_seq CASCADE');
        $this->addSql('DROP TABLE users_groups');
        $this->addSql('DROP TABLE groups');
        $this->addSql('ALTER TABLE users DROP name');
        $this->addSql('ALTER TABLE services DROP short');
        $this->addSql('ALTER TABLE appointments DROP CONSTRAINT FK_6A41727AA76ED395');
        $this->addSql('DROP INDEX IDX_6A41727AA76ED395');
        $this->addSql('ALTER TABLE appointments DROP user_id');
        $this->addSql('ALTER INDEX idx_6a41727a19eb6921 RENAME TO idx_f7c966f019eb6921');
    }
}

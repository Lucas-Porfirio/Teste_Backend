<?php

declare(strict_types=1);

namespace Source\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501234348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contato_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE contato ALTER idpessoa DROP NOT NULL');
        $this->addSql('ALTER TABLE contato ALTER descricao DROP NOT NULL');
        $this->addSql('ALTER TABLE pessoa ALTER cpf TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contato_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoa_id_seq CASCADE');
        $this->addSql('ALTER TABLE contato ALTER descricao SET NOT NULL');
        $this->addSql('ALTER TABLE contato ALTER idPessoa SET NOT NULL');
        $this->addSql('ALTER TABLE pessoa ALTER cpf TYPE VARCHAR(11)');
    }
}

<?php

declare(strict_types=1);

namespace Source\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Types\Types;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423211009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Tabela de Contatos';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('contato');
        $table->addColumn('id', Types::INTEGER);
        $table->addColumn('idPessoa', Types::INTEGER);
        $table->addColumn('tipo', Types::BOOLEAN)->setNotnull(true);
        $table->addColumn('descricao', Types::STRING);
        $table->addForeignKeyConstraint('pessoa', ['idPessoa'], ['id']);
        $table->setPrimaryKey(['id']);

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
    }
}

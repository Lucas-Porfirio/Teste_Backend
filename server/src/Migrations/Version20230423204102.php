<?php

declare(strict_types=1);

namespace Source\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Types\Types;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423204102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Tabela de Pessoa';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('pessoa');
        $table->addColumn('id', Types::INTEGER);
        $table->addColumn('nome', Types::STRING, ['length' => 255])->setNotnull(true);
        $table->addColumn('cpf', Types::STRING, ['length' => 11])->setNotnull(true);
        $table->setPrimaryKey(['id']);

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
    }
}

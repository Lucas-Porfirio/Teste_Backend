<?php

require 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\JsonFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\DBAL\DriverManager;

$config  = new JsonFile('migrations.json');
$aPaths  = [__DIR__."/src/Model"];
$oConfig = ORMSetup::createAttributeMetadataConfiguration($aPaths, true, null, null, false);
$aParams = [
    'driver'   => 'pgsql',
    'user'     => 'admin',
    'password' => 'admin123',
    'dbname'   => 'postgresDB',
    'host'     => 'teste_backend_db',
    'port'     =>  5432,
];
$oConnection = DriverManager::getConnection($aParams, $oConfig);
$entityManager = new EntityManager($oConnection, $oConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
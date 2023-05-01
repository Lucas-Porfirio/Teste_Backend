<?php
namespace Source\Model;

use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

/**
 * @Doctrine\ORM\Mapping\MappedSuperclass
 */
abstract class ModelBase {

    private $EntityManager;

    public function getEntityManager(): \Doctrine\ORM\EntityManager
    {
        return $this->EntityManager ??= new EntityManager($this->getInstanceConnection(), $this->getInstanceConfiguration());
    }

    public function setEntityManager(\Doctrine\ORM\EntityManager $oEntityManager): void
    {
        $this->EntityManager = $oEntityManager;
    }

    public function getInstanceConnection(): \Doctrine\DBAL\Connection
    {
        $oConfig = $this->getInstanceConfiguration();
        $aParams = [
            'driver'   => 'pgsql',
            'user'     => 'admin',
            'password' => 'admin123',
            'dbname'   => 'postgresDB',
            'host'     => 'teste_backend_db',
            'port'     =>  5432,
        ];
        return DriverManager::getConnection($aParams, $oConfig);
    }

    public function getInstanceConfiguration(): \Doctrine\ORM\Configuration
    {
        $aPaths  = [__DIR__."/src/Model"];
        return ORMSetup::createAttributeMetadataConfiguration($aPaths, true, null, null, false);
    }

    public function getRepository() {
        return $this->getEntityManager()->getRepository(get_class($this));
    }

}


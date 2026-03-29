<?php

namespace Oc\GeoCache;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class Reports
{
    /**
     * @var Connection
     */
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string[] $wpCodes
     *
     * @return array
     * @throws Exception
     */
    public function getReportStatus(array $wpCodes): array
    {
        $query = $this->connection->createQueryBuilder()
            ->select('DISTINCT(wp_oc)')
            ->from('caches', 'c')
            ->innerJoin('c', 'cache_reports', 'cr', 'cr.cacheid = c.cache_id')
            ->where('wp_oc IN (:wpCodes)')
            ->andWhere('cr.status IN (:status)')
            ->setParameter('wpCodes', $wpCodes, ArrayParameterType::STRING)
            ->setParameter('status', [1, 2], ArrayParameterType::INTEGER);

        $statement = $query->executeQuery();

        return $statement->fetchAllAssociative();
    }
}

<?php

namespace App\Addresses\Repository;

use App\Addresses\Entity\Address;
use Doctrine\DBAL\Connection;

/**
 * Addresses repository.
 */
class AddressRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * Returns a collection of addresses.
     *
     * @param int $limit
     *   The number of users to return.
     * @param int $offset
     *   The number of users to skip.
     * @param array $orderBy
     *   Optionally, the order by info, in the $column => $direction format.
     *
     * @return array A collection of users, keyed by user id.
     */
    public function getAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('address', 'a');

        $statement = $queryBuilder->execute();
        $addressesData = $statement->fetchAll();
        foreach ($addressesData as $addressData) {
            $addressEntityList[$addressData['id']] = new Address($addressData['id'], $addressData['number'], $addressData['street'], $addressData['city'], $addressData['country']);
        }

        return $addressEntityList;
    }

    /**
     * Returns an User object.
     *
     * @param $id
     *   The id of the user to return.
     *
     * @return array A collection of users, keyed by user id.
     */
    public function getById($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('address', 'a')
            ->where('id = ?')
            ->setParameter(0, $id);
        $statement = $queryBuilder->execute();
        $addressData = $statement->fetchAll();

        return new Address($addressData[0]['id'], $addressData[0]['number'], $addressData[0]['street'], $addressData[0]['city'], $addressData[0]['country']);
    }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->delete('address')
            ->where('id = :id')
            ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->update('address')
            ->where('id = :id')
            ->setParameter(':id', $parameters['id']);

        if ($parameters['number']) {
            $queryBuilder
                ->set('number', ':number')
                ->setParameter(':number', $parameters['number']);
        }

        if ($parameters['street']) {
            $queryBuilder
                ->set('street', ':street')
                ->setParameter(':street', $parameters['street']);
        }

        if ($parameters['city']) {
            $queryBuilder
                ->set('city', ':city')
                ->setParameter(':city', $parameters['city']);
        }

        if ($parameters['country']) {
            $queryBuilder
                ->set('country', ':country')
                ->setParameter(':country', $parameters['country']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->insert('address')
            ->values(
                array(
                    'number' => ':number',
                    'street' => ':street',
                    'city' => ':city',
                    'country' => ':country',
                )
            )
            ->setParameter(':number', $parameters['number'])
            ->setParameter(':street', $parameters['street'])
            ->setParameter(':city', $parameters['city'])
            ->setParameter(':country', $parameters['country']);
        $statement = $queryBuilder->execute();
    }
}